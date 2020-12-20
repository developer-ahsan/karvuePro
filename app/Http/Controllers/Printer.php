<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printers;
use App\Models\User;

class Printer extends Controller
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
        $user->user_type = "printing";
        $user->save();

    	$printer = new Printers();
    	if($request->password != $request->c_password) {
	        // toastr()->error('Password is not same');
    	}
    	
        $printer->f_name = $request->f_name; 
        $printer->l_name = $request->l_name; 
        $printer->c_name = $request->c_name; 
        $printer->c_phone = $request->c_phone; 
        $printer->email = $request->email; 
        $printer->password = $request->password; 
        $printer->locationField = $request->locationField; 
        $printer->locality = $request->locality; 
        $printer->administrative_area_level_1 = $request->administrative_area_level_1; 
        $printer->date = $request->date; 
        $printer->time = $request->time; 
        $printer->user_id = $user->id;
        $printer->save();
        toastr()->success('Your Account needs an approval.');
        return view('thanks')->with('message','Printing Company Registered SuccessFully');
    }
}
