<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Commercialfleets;
use App\Models\CommercialVehicle;
use App\Models\FleetWorkingHr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\WayPoint;
use App\Mail\Confirmation;
use Illuminate\Support\Facades\Session;
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
        $cf->source = $request->locationField; 
        $cf->locality = $request->locality; 
        $cf->administrative_area_level_1 = $request->administrative_area_level_1; 
        $cf->date = '2020-12-12'; 
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
        \Mail::to($request->email, $user->f_name.' '.$user->l_name)->send(new Confirmation($user));
        return redirect('/');
        
    }
    public function servicearea()
    {
         $fleetoperators = Commercialfleets::where('user_id', Auth::id())->first();
         $waypoint = WayPoint::select('location')->where('fleet_id', $fleetoperators->id)->get();  
        return view('Admin.commercialfleet.servicearea',compact('waypoint'))->with('fleetoperators',$fleetoperators);
    }
    public function submitdestination(Request $request)
    {
         $fleetoperators = Commercialfleets::where('id', $request->id)->first();
         $fleetoperators->source = $request->locationField;
         $fleetoperators->destination = $request->destination;
         $fleetoperators->save();
         return redirect()->back();
    }
    public function submitwaypoints(Request $request)
    {

        if($request->waypoints) {
            $waypoint = new WayPoint;
            $waypoint->location = $request->waypoints;
            $waypoint->fleet_id = $request->id;
            $waypoint->save();
        } else {
            toastr()->warning('Please Add WayPoint');

        }
        
        return redirect()->back();
    }
    public function fleetvehicles()
    {
        $fleetoperators = Commercialfleets::where('user_id', Auth::id())->first();
        $vehicles = CommercialVehicle::where('fleet_id', $fleetoperators->id)->get();
        return view('Admin.commercialfleet.fleetvehicle')->with('vehicles',$vehicles);
    }
    public function fleetvehiclesdel($id)
    {
        $vehicle = CommercialVehicle::find($id);
        $vehicle->delete();
        toastr()->success('Vehicle Deleted SuccessFully');
        return redirect()->back();
    }
    public function addnewVehicle(Request $request)
    {
        $fleetoperators = Commercialfleets::where('user_id', Auth::id())->first();
        $vehicle = new CommercialVehicle;
        $vehicle->type = $request->type;
        $vehicle->count = $request->quan;
        $vehicle->fleet_id = $fleetoperators->id;
        $vehicle->save();
        toastr()->success('Vehicle Added SuccessFully');
        return redirect()->back();
    }
    public function workingHours()
    {
        $fleetoperators = Commercialfleets::where('user_id', Auth::id())->first();
        $workingHour = FleetWorkingHr::where('fleet_id', $fleetoperators->id)->get();
        return view('Admin.commercialfleet.workingHours')->with('workingHours',$workingHour);
    }
    public function addnewworkingHours(Request $request)
    {
        $holiday = 0;
        $fleetoperators = Commercialfleets::where('user_id', Auth::id())->first();
        if($request->has('holiday')) {
            $holiday = 1;
        }
        $workingHour = new FleetWorkingHr;
        $workingHour->week_day = $request->day;
        $workingHour->start_time = $request->start;
        $workingHour->end_time = $request->end;
        $workingHour->holiday = $holiday;
        $workingHour->fleet_id = $fleetoperators->id;
        $workingHour->save();
        toastr()->success('WorkingHour Added SuccessFully');
        return redirect()->back();
    }
     public function workingHoursdel($id)
    {
        $workingHour = FleetWorkingHr::find($id);
        $workingHour->delete();
        toastr()->success('WorkingHour Deleted SuccessFully');
        return redirect()->back();
    }
    public function getWayPoints()
    {
        $fleetoperators = Commercialfleets::where('user_id', Auth::id())->first();
         $waypoints = WayPoint::where('fleet_id', $fleetoperators->id)->get();  
        return view('Admin.commercialfleet.waypoints',compact('waypoints'))->with('fleetoperators',$fleetoperators);
    }
    public function wayPointsdel($id)
    {
        $waypoints = WayPoint::find($id);
        $waypoints->delete();
        toastr()->success('WayPoint Deleted SuccessFully');
        return redirect()->back();
    }
    
}
