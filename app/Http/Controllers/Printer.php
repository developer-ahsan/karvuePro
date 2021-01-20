<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printers;
use App\Models\User;
use App\Models\PrinterServiceHr;
use App\Mail\Confirmation;
use Illuminate\Support\Facades\Auth;

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
    	
        $printer->c_name = $request->c_name; 
        $printer->c_phone = $request->c_phone; 
        $printer->email = $request->email; 
        $printer->password = $request->password; 
        $printer->locationField = $request->locationField; 
        $printer->locality = $request->locality; 
        $printer->administrative_area_level_1 = $request->administrative_area_level_1; 
        $printer->date = '2020-12-12'; 
        $printer->time = '$request->time'; 
        $printer->user_id = $user->id;
        $printer->save();
        toastr()->success('Your Account needs an approval.');
        \Mail::to($request->email, $user->f_name.' '.$user->l_name)->send(new Confirmation($user));

        return redirect('/');

    }
    public function workingHours()
    {
        $fleetoperators = Printers::where('user_id', Auth::id())->first();
        $workingHour = PrinterServiceHr::where('printer_id', $fleetoperators->id)->get();
        return view('Admin.printer.workinghours')->with('workingHours',$workingHour);
    }
    public function addnewworkingHours(Request $request)
    {
        $holiday = 0;
        $fleetoperators = Printers::where('user_id', Auth::id())->first();
        if($request->has('holiday')) {
            $holiday = 1;
        }
        $workingHour = new PrinterServiceHr;
        $workingHour->week_day = $request->day;
        $workingHour->start_time = $request->start;
        $workingHour->end_time = $request->end;
        $workingHour->holiday = $holiday;
        $workingHour->printer_id = $fleetoperators->id;
        $workingHour->save();
        toastr()->success('WorkingHour Added SuccessFully');
        return redirect()->back();
    }
     public function workingHoursdel($id)
    {
        $workingHour = PrinterServiceHr::find($id);
        $workingHour->delete();
        toastr()->success('WorkingHour Deleted SuccessFully');
        return redirect()->back();
    }
}
