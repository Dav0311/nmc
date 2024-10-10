<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Models\doctor;
use App\Mail\TestMail;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\DB;




class TemplateController extends Controller
{
    //
    public function index()
    {
        // $doctors = doctor::all();
        // dd($doctors);
        // return view ('layout.index', compact('doctors'));

        $doctors = DB::table('doctors')->get();

        return view ('layout.index2',['doctors'=> $doctors]);

    }

    public function PosDashboard()
    {
        return view ('layout.index');
    }

    public function honeypot()
    {
        return view('products.honeypot');
    }

    public function honeypotBlock(Request $request)
    {
       // Use Validator to validate the input data
       $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:8',
        // Add any other validation rules you need here
    ]);

    // Check if the honeypot field is filled (indicating a bot)
    $honeypotField = $request->input('my_name_UW169eXCn3pdb2Yh');

    if ($honeypotField) {
        return response('spam redirect', 302);
    }

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Proceed with the normal flow if no spam and validation passes
    // For example, you can access validated data like this:
    $validatedData = $validator->validated();
    $email = $validatedData['email'];
    $password = $validatedData['password'];

    // Now you can proceed with any further logic your application requires
    // For example, you might want to authenticate the user or perform other actions
    // Here, we're just returning a success response
    return response('Success', 200);
    }

    public function sendAppointment(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required|date',
            'department' => 'required',         
            'doctor' => 'required'
        ]);

        if ($validated)
        {
            Mail::to('dev.david1300@gmail.com')->send(new AppointmentMail($validated));

            $message = "Successfully created an appointment.";
            return redirect()->back()->with('success', $message);
        } else {
            $message = "Failed to create an appointment.";
            return redirect()->back()->with('error', $message);
        }
        
    }

   
}
