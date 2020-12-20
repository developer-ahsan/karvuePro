<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAccounts extends Controller
{
    public function register(Request $request)
	{
		dd($request);
	}
	public function Userlogin(Request $request)
    {
    	 $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

    	$user = User::where('email', $request->email)->first();
    	if(!$user) {
	        toastr()->error('Your Account is not Exist.');
	        return redirect()->back();
    	} else {
	    	if ($user->password == $request->password) {
	    		Auth::login($user);
		        return view('thanks')->with('message',$user->user_type.' Logged in Successfully.');
	    	} else {
		        toastr()->error('Your Password is not matched.');
		        return redirect()->back();

	    	}
    	}
    }
}
