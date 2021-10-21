<?php

namespace App\Observers;

use App\Models\BPReading;
use Vinkla\Hashids\Facades\Hashids;

class BPReadingObserver
{
    public function created(BPReading $reading)
    {
        $reading->hid = Hashids::encode($reading->id);

        if (!isset($reading->category)) {
            $reading->category = determine_bp_reading_category($reading->systolic, $reading->diastolic);
        }

        $reading->save();
    }
}
