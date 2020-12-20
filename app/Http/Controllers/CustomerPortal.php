<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomersPortal;
use App\Models\User;

class CustomerPortal extends Controller
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
        $user->user_type = "advertiser";
        $user->save();
    	$customer = new CustomersPortal;
        $customer->phone = $request->c_phone;
        $customer->user_id = $user->id;

        $customer->save();
        toastr()->success('Your Account needs an approval.');
        return view('thanks')->with('message','Advertiser Registered SuccessFully');

    	dd($designer);
    }
}
