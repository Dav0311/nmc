<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //fetch 
    public function index ()
    {
        return view ('doctor.index');
    }

    public function create ()
    {
        return view ('doctor.create');
    }

    public function store()
    {

    }


}
