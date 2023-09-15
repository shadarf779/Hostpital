<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }
    public function upload(Request $request)
    {
        $doctor = new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->
        getClientoriginalExtension();

        $request->file->move('doctorimage',$imagename);

        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speacilty=$request->Speacialty;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');



    }   

    public function Show_Appointments()
    {
        $data=Appointments::all();
        return view('admin.Show_Appointments',compact('data'));
    }

    public function Aprove($id)
    {
        $data=Appointments::find($id);
        $data->status="Aproved";
        $data->save();
        
        return redirect()->back();
    }

    public function cancel($id)
    {
        $data=Appointments::find($id);
        $data->status="Rejected";
        $data->save();
        return redirect()->back();
    }

    public function show_Doctors()
    {
        $data = doctor::all();
        return view('admin.Show_Doctors',compact('data'));
    }

    public function delete($id)
    {
        $data=doctor::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function edit($id)
    {
        $data=doctor::find($id);
        return view('admin.edit',compact('data'));
    }

    public function editDoctor(Request $request , $id)
    {
        $doctor=doctor::find($id);

            // Upload the new image
            $image=$request->file;
            $imagename=time().'.'.$image->getClientOriginalExtension();
    
            $request->file->move('doctorimage',$imagename);
            
            // Update the image field
            $doctor->image = $imagename;
            $doctor->name=$request->name;
            $doctor->phone=$request->phone;
            $doctor->room=$request->room;
            $doctor->speacilty=$request->speacilty;

            $doctor->save();
            return redirect()->back();



    }   

    public function send($id)
    {
        $data=Appointments::find($id);
        return view('admin.send',compact('data')); 
    }

    public function sendemail(Request $request , $id)
    {
        $data = Appointments::find($id);

        $details=[
            
            'greeting' => $request->greeting,

            'body' => $request->body,

            'actiontext' => $request->actiontext,

            'actionurl' => $request->actionurl,

            'end' => $request->end


        ];

        Notification::send($data,new 
        SendEmailNotification($details));

        return redirect()->back(); 
    }
}
