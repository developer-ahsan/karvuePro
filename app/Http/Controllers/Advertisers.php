<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomersPortal;
use App\Models\Designers;
use App\Models\Printers;
use App\Models\Commercialfleets;
use App\Models\WayPoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Advertisers extends Controller
{
    public function __construct()
    {
    }
 	public function fleetoperators()
    {
        $fleetoperators = Commercialfleets::all();
        return view('Admin.advertiser.fleetoperators')->with('fleetoperators',$fleetoperators);
    }
    public function fleetoperatorsBYID($id)
    {
        $fleetoperators = Commercialfleets::where('id', $id)->first();
        $waypoint = WayPoint::select('location')->where('fleet_id', $id)->get();        
        return view('Admin.advertiser.fleetoperatorsdetails',compact('waypoint'))->with('fleetoperators',$fleetoperators);
    }
}
