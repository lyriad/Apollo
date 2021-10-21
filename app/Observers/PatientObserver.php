<?php

namespace App\Observers;

use App\Models\Patient;
use Vinkla\Hashids\Facades\Hashids;

class PatientObserver
{
    public function created(Patient $patient)
    {
        $patient->hid = Hashids::encode($patient->id);
        $patient->save();
    }
}
