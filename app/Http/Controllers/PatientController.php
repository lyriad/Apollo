<?php

namespace App\Http\Controllers;

use App\Repositories\PatientRepository;

class PatientController extends Controller 
{
    public function index() 
    {
        return view('patients.index');
    }

    public function create() 
    {
        return view('patients.form', [
            'patient_hid' => ''
        ]);
    }

    public function update(string $hid) 
    {
        abort_if(!PatientRepository::existsByHid($hid), 404);

        return view('patients.form', [
            'patient_hid' => $hid
        ]);
    }
}
