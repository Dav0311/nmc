<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;

class DoctorController extends Controller
{
    //fetch 
    public function index ()
    {
        $data = doctor::all();
        return view ('doctor.index', compact('data'));
    }

    public function create ()
    {
        return view ('doctor.create');
    }

    public function store(Request $request)
    {

         $validated = $request->validate([
             'firstname' => 'required|max:255',
             'lastname' => 'required|max:255',
             'phone_no' => 'required|max:20',
             'email' => 'required|max:255',
             'role' => 'required|max:255',
         ]);
     
         if ($validated && !empty($validated)) {
     
             $form = doctor::create($validated);
     
             return redirect()->route('doctors',)->with('success', 'Form created successfully.');
            
         } else {
     
             return back()->with('error', 'Failed to create the form.');
         }

    }


}
