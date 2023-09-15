<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\appointments;


class HomeController extends Controller
{
    public function redirect()
    {


        if(Auth::id())
        {
                if(Auth::user()->usertype=='0')
                {
                    $doctor = doctor::all();
                    return view('user.home' , compact('doctor'));
           
                }
                elseif(Auth::user()->usertype=='1')
                {
                    return view('admin.home');
                }
        }else{
            return redirect()->back();
        }

    }
    public function index()
    {
           $doctor = doctor::all();
            return view('user.home' , compact('doctor'));
    }

    public function appointment(Request $request)
    {
        $data = new appointments;

        $data->name=$request->name;

        $data->email=$request->email;

        $data->date=$request->date;

        $data->phone=$request->phone;

        $data->message=$request->message;

        $data->doctor=$request->doctors;

        $data->status='In progress';

        if(Auth::id())
        {
             $data->user_id=Auth::user()->id;

        }

        $data -> save();

        return redirect()->back()->with('message',"Appointment is Added Seccessfully, we will answer you within a day! ");


    }


    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;

            $appoint=appointments::where('user_id',$userid)->get();

            return view('user.my_appointment' , compact('appoint'));
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data=appointments::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function add_appointment()
    {
        $doctor = doctor::all();
        return view('user.Home' , compact('doctor'));
    }
}
