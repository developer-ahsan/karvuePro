<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomersPortal;
use App\Models\Designers;
use App\Models\Printers;
use App\Models\Commercialfleets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class Dashboard extends Controller
{
	public function __construct()
    {
    }
 	public function dashboard()
    {
        if(\Auth::check()){ 
        return view('Admin.home');
        } else {
	        toastr()->error('Please Login First');
	        return redirect('/');
        }
    }
    public function updatePasswordView()
    {
    	return view('Admin.changepassword');
    }
    public function updatePassword(Request $request)
    {
    	if($request->password == $request->c_password) {
    		$user = User::find(Auth::id());
    		$user->password = $request->password;
    		$user->save();
    		\Auth::logout();
	        toastr()->success('Passwords updated Successfully');

	    	return redirect('/');
    	} else {
	        toastr()->error('Passwords are not same');
	        return redirect()->back();
    	}
    }
    public function updateProfileView()
    {
        $type = '';
        if (Auth::user()->user_type == 'advertiser') {
            $user = User::where('id', Auth::id())->with('advertiser')->first();
        } elseif (Auth::user()->user_type == 'designer') {
            $user = User::where('id', Auth::id())->with('designer.sampledesigner')->first();
        } elseif (Auth::user()->user_type == 'printing') {
            $user = User::where('id', Auth::id())->with('printer')->first();
        } elseif (Auth::user()->user_type == 'fleet') {
            $user = User::where('id', Auth::id())->with('fleet')->first();
        }
    	return view('Admin.profile')->with('user', $user);
    }
    public function updateProfile(Request $request)
    {
    	$user = User::find(Auth::id());
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->save();
        if(Auth::user()->user_type == 'advertiser') {
            $userphone = CustomersPortal::where('user_id', (Auth::id()))->first();
            $userphone->phone = $request->phone;
            $userphone->save();
            $user = User::where('id', Auth::id())->with('advertiser')->first();
        } elseif (Auth::user()->user_type == 'designer') {
            $designer = Designers::where('user_id', $user->id)->first();
            $designer->c_name = $request->c_name;
            $designer->c_phone = $request->phone;
            $designer->comp_url = $request->c_url;
            if ($request->has('comp_logo')) {
            if ($request->comp_logo) {
                    $getimageName1 = time().'1.'.$request->comp_logo->getClientOriginalExtension();
                    $filepath = $request->comp_logo->move(storage_path('images'), $getimageName1);
                    $designer->comp_logo = 'storage/images/'.$getimageName1;
                }
            }
            $designer->save();
            $user = User::where('id', Auth::id())->with('designer.sampledesigner')->first();
        } elseif (Auth::user()->user_type == 'printing') {
            $printer = Printers::where('user_id', $user->id)->first();
            $printer->c_phone = $request->phone; 
            $printer->c_name = $request->c_name;
            $printer->locationField = $request->locationField; 
            $printer->locality = $request->locality; 
            $printer->administrative_area_level_1 = $request->administrative_area_level_1; 
            $printer->save();
            $user = User::where('id', Auth::id())->with('printer')->first();
        } elseif (Auth::user()->user_type == 'fleet') {
            $fleet = Commercialfleets::where('user_id', $user->id)->first();
            $fleet->c_phone = $request->phone; 
            $fleet->c_name = $request->c_name;
            $fleet->locationField = $request->locationField; 
            $fleet->locality = $request->locality; 
            $fleet->administrative_area_level_1 = $request->administrative_area_level_1; 
            $fleet->save();
            $user = User::where('id', Auth::id())->with('fleet')->first();
        }
    	

        toastr()->success('Profile updated Successfully');
    	return view('Admin.profile')->with('user', $user);
    }
    public function logout()
    {
    	\Auth::logout();
    	return redirect('/');
    }
}
