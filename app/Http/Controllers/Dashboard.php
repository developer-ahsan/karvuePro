<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomersPortal;
use App\Models\CommercialVehicle;
use App\Models\Designers;
use App\Models\Printers;
use App\Models\FleetWorkingHr;
use App\Models\DesignerService;
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
            if(\Auth::user()->user_type == 'fleet') {
                $fleet = Commercialfleets::where('user_id',Auth::id())->with('vehicle')->first();
               $data['vehicles'] = $fleet->vehicle->sum('count');
                return view('Admin.fleethome')->with('data',$data);
            } elseif(\Auth::user()->user_type == 'designer') {
                $data['Designer'] = Designers::count();
                $data['CustomersPortal'] = CustomersPortal::count();
                $data['Printers'] = Printers::count();
                $data['Commercialfleets'] = Commercialfleets::count();
                return view('Admin.designerhome')->with('data',$data);
            } elseif(\Auth::user()->user_type == 'advertiser') {
                $data['Designer'] = Designers::count();
                $data['CustomersPortal'] = CustomersPortal::count();
                $data['Printers'] = Printers::count();
                $data['Commercialfleets'] = Commercialfleets::count();
                return view('Admin.advertiserhome')->with('data',$data);
            } elseif(\Auth::user()->user_type == 'printing') {
                $data['Designer'] = Designers::count();
                $data['Printers'] = Printers::count();
                $data['CustomersPortal'] = CustomersPortal::count();
                $data['Commercialfleets'] = Commercialfleets::count();
                return view('Admin.printinghome')->with('data',$data);
            } elseif(\Auth::user()->user_type == 'admin') {
                $data['Designer'] = Designers::count();
                $data['CustomersPortal'] = CustomersPortal::count();
                $data['Printers'] = Printers::count();
                $data['Commercialfleets'] = Commercialfleets::count();
                return view('Admin.home')->with('data',$data);
            }
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
            if($request->has('comp_logo')) {
                $getimageName1 = time().'1.'.$request->comp_logo->getClientOriginalExtension();
                $filepath = $request->comp_logo->move(storage_path('images'), $getimageName1);
                $fleet->image = 'storage/images/'.$getimageName1;
            }
            $fleet->save();
            $user = User::where('id', Auth::id())->with('fleet')->first();
        }
    	

        toastr()->success('Profile updated Successfully');
    	return view('Admin.profile')->with('user', $user);
    }
    public function activeAdvertiser()
    {
        $advertiser = CustomersPortal::with('users')->get();
        return view('Admin.common.alladvertiser')->with('advertisers',$advertiser);
    }
    public function activePrinters()
    {
        $printers = Printers::with('users')->get();
        return view('Admin.common.allprinters')->with('printers',$printers);
    }
    public function activeFleet()
    {
        $fleets = Commercialfleets::with('users')->get();
        return view('Admin.common.allfleets')->with('fleets',$fleets);
    }
    public function activeDesigner()
    {
        $designers = Designers::with('users')->get();
        return view('Admin.common.alldesigners')->with('designers',$designers);
    }

    public function fleetoperatorsdetail($id)
    {
        $fleetoperator =  Commercialfleets::where('id',$id)->with('users')->with('vehicle')->with('waypoint')->first();
        $fleetoperator->businessHrs = FleetWorkingHr::where('fleet_id',$id)->get();
        return view('Admin.common.fleetoperatordetail')->with('fleetoperator',$fleetoperator);
    }
     public function printersdetail($id)
     {
        $printers =  Printers::where('id',$id)->with('users')->with('businessHrs')->first();
        return view('Admin.common.printerdetail')->with('printers',$printers); 
     }
    public function advertiserdetail($id)
     {
        $printers =  Printers::where('id',$id)->with('users')->with('businessHrs')->first();
        return view('Admin.common.advertiserdetail')->with('printers',$printers); 
     }
     public function designerdetail($id)
     {
        $designer =  Designers::where('id',$id)->with('users')->with('sampledesigner')->with('servicePlans')->first();
        $designer->basic = DesignerService::where('type','Basic')->where('designer_id', $id)->first(); 
        $designer->standard = DesignerService::where('type','Standard')->where('designer_id', $id)->first();
        $designer->premium = DesignerService::where('type','Premium')->where('designer_id', $id)->first();
        return view('Admin.common.designerdetail')->with('designer',$designer); 
     }


     public function adminAdvertiser()
    {
        $advertiser = CustomersPortal::with('users')->get();
        return view('Admin.superadmin.alladvertiser')->with('advertisers',$advertiser);
    }
    public function adminPrinters()
    {
        $printers = Printers::with('users')->get();
        return view('Admin.superadmin.allprinters')->with('printers',$printers);
    }
    public function adminfleets()
    {
        $fleets = Commercialfleets::with('users')->get();
        return view('Admin.superadmin.allfleet')->with('fleets',$fleets);
    }
    public function adminDesigner()
    {
        $designers = Designers::with('users')->get();
        return view('Admin.superadmin.alldesigners')->with('designers',$designers);
    }

    public function adminfleetsdel($id)
    {
        $fleets = Commercialfleets::find($id);
        $user = User::find($fleets->user_id);
        $user->delete();
        $fleets->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
    public function adminAdvertiserdel($id)
    {
        $fleets = CustomersPortal::find($id);
        $user = User::find($fleets->user_id);
        $user->delete();
        $fleets->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
    public function adminPrintersdel($id)
    {
        $fleets = Printers::find($id);
        $user = User::find($fleets->user_id);
        $user->delete();
        $fleets->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
    public function adminDesignerdel($id)
    {
        $fleets = Designers::find($id);
        $user = User::find($fleets->user_id);
        $user->delete();
        $fleets->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
    public function logout()
    {
    	\Auth::logout();
    	return redirect('/');
    }
}
