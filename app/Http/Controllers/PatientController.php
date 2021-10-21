<?php

namespace App\Http\Controllers;

class PatientController extends Controller 
{
    public function index() 
    {
        return view('patients.index');
    }

    public function create() 
    {
        return view('patients.index');
    }
}
