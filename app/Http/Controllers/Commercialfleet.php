<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Commercialfleets;
use App\Models\CommercialVehicle;
use App\Models\User;

class Commercialfleet extends Controller
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
        $user->user_type = "fleet";
        $user->save();
    	$cf = new Commercialfleets();
    	if($request->has('image')) {
            if($request->image) {
                $getimageName1 = time().'1.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName1);
            $cf->image = 'storage/images/'.$getimageName1;
        } else {
            $cf->image = 'null';
        }
			
        } else {
            $cf->image = 'null';
        }
       
        $cf->c_name = $request->c_name; 
        $cf->c_phone = $request->c_phone; 
        $cf->locationField = $request->locationField; 
        $cf->locality = $request->locality; 
        $cf->administrative_area_level_1 = $request->administrative_area_level_1; 
        $cf->date = ''; 
        $cf->time = ''; 
        $cf->insure_status = $request->check; 
        $cf->user_id = $user->id;
        $cf->save();
        $array1 = explode(',', $request->v_counts);
        $array2 = explode(',', $request->v_types);
        for ($i=0; $i < count($array1); $i++) {
			$cv = new CommercialVehicle;
        	$cv->count = $array1[$i];
        	$cv->type = $array2[$i];
        	$cv->fleet_id = $cf->id;
        	$cv->save();
        }
        toastr()->success('Commercial Fleet Registered SuccessFully');
        return view('thanks')->with('message','Commercial Fleet Registered SuccessFully');
    }
    public function Userlogin(Request $request)
    {
        return view('Admin.home');
    }
}
