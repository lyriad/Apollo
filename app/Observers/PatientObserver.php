<?php

namespace App\Observers;

use App\Models\Patient;

class PatientObserver
{
    public function created(Patient $patient)
    {
        $patient->hid = 'P' . now()->format('Y') . str_pad($patient->id, 7, '0', STR_PAD_LEFT);
        $patient->save();
    }
}
