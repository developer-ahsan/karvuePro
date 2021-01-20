<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\ResetPassword;

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
	    		return redirect('/dashboard');
	    	} else {
		        toastr()->error('Your Password is not matched.');
		        return redirect()->back();

	    	}
    	}
    }
    public function forgetpassword()
    {
    	return view('forgetpassword');
    }
    public function resetpassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            toastr()->error('This email is not registerd');
            return redirect()->back();
        } else {
            \Mail::to($request->email)->send(new ResetPassword($user));
            toastr()->success('Email Sent Successfully.');
            return redirect('/');
        }
    }
    public function resetpasswordEmail($email)
    {
        return view('ResetPassword')->with('email',$email);

    }
    public function resetpasswordEmails(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = $request->password;
        $user->save();
        toastr()->success('Password Changed Successfully...');
        return redirect('/');
    }
}
