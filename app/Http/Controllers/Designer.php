<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designers;
use App\Models\SampleDesigner;
use App\Models\User;
use App\Mail\Confirmation;

class Designer extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user) {
            return redirect()->back()->with('error','Email already exist.');
        }
        if($request->password != $request->c_password) {
            return redirect()->back()->with('error','Confirm Password not matched');
        }
        $user = new User();
        $user->f_name = $request->f_name; 
        $user->l_name = $request->l_name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->user_type = "designer";
        $user->save();

    	$designer = new Designers;
        $designer->c_name = $request->c_name; 
        $designer->c_phone = $request->c_phone;
        $designer->comp_url = $request->c_url;
    	if ($request->has('comp_logo')) {
    		if ($request->comp_logo) {
    			$getimageName1 = time().'1.'.$request->comp_logo->getClientOriginalExtension();
            $filepath = $request->comp_logo->move(storage_path('images'), $getimageName1);
            $designer->comp_logo = 'storage/images/'.$getimageName1;
        } else {
            $designer->comp_logo = 'null';
        }
			
        } else {
            $designer->comp_logo = 'null';
        }
        $designer->user_id = $user->id;

        $designer->save();
        $files = [];
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {	
            	$sample = new SampleDesigner;
                $name = time().rand(1,100).'.'.$file->extension();  
	            $filepath = $file->move(storage_path('images'), $name);
                $sample->image =  'storage/images/'.$name;  
                $sample->designer_id =  $designer->id;  
                $sample->save();
            }
         }
        toastr()->success('Your Account needs an approval.');
        \Mail::to($request->email, $user->f_name.' '.$user->l_name)->send(new Confirmation($user));
        return redirect('/');
    }
}
