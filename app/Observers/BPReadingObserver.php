<?php

namespace App\Observers;

use App\Models\BPReading;

class BPReadingObserver
{
    public function created(BPReading $reading)
    {
        $reading->hid = 'R' . now()->format('Y') . str_pad($reading->id, 7, '0', STR_PAD_LEFT);

        if (!isset($reading->category)) {
            $reading->category = determine_bp_reading_category($reading->systolic, $reading->diastolic);
        }

        $reading->save();
    }
}
