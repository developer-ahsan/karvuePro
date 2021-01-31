<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designers;
use App\Models\SampleDesigner;
use App\Models\DesignerService;
use App\Models\User;
use App\Mail\Confirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $designer->c_phone = (string)$request->c_phone;
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
    public function designSamples()
    {
        $designer = Designers::where('user_id',Auth::id())->with('sampledesigner')->first();
        return view('Admin.designer.sampledesign')->with('samples',$designer);
    }
    public function addnewSample(Request $request)
    {
        $designer = Designers::where('user_id',Auth::id())->first();
        $newdes = new SampleDesigner;
        if($request->hasfile('image'))
         {
            $getimageName1 = time().'1.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName1);
            $newdes->image = 'storage/images/'.$getimageName1;
         }
         $newdes->designer_id = $designer->id;
         $newdes->save();
        toastr()->success('Design Added to Your Portfolio');
        return redirect()->back();
    }
    public function designSamplesdel($id)
    {
        $newdes = SampleDesigner::find($id);
        $newdes->delete();
        toastr()->success('Sample Deleted Successfully');
        return redirect()->back();
    }
    public function designerServicePlans()    
    {
        $designer = Designers::where('user_id',Auth::id())->first();
        $data['basic'] = DesignerService::where('type', 'Basic')->where('designer_id',$designer->id)->latest()->first();
        $data['standard'] = DesignerService::where('type', 'Standard')->where('designer_id',$designer->id)->latest()->first();
        $data['premium'] = DesignerService::where('type', 'Premium')->where('designer_id',$designer->id)->latest()->first();
        return view('Admin.designer.servicesplan')->with('data',$data);
    }
    public function addnewServicePlan(Request $request)
    {
        $designer = Designers::where('user_id',Auth::id())->first();
        $service = new DesignerService;
        $service->type = $request->plan;
        $service->detail = $request->detail;
        $service->price = $request->price;
        $service->revisions = $request->revisions;
        $service->number_of_designs = $request->designs;
        $service->designer_id = $designer->id;
        $service->save();
        toastr()->success('Service Added Successfully');
        return redirect()->back();
    }
    public function designerServicePlansdel($value)
    {
        $service = DesignerService::find($value);
        $service->delete();
        toastr()->success('Service Deleted Successfully');
        return redirect()->back();
    }
}
