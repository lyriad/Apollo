<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPReading extends Model
{
    use HasFactory;

    protected $table = 'bp_readings';

    protected $fillable = [
        'hid',
        'user_id',
        'patient_id',
        'systolic',
        'diastolic',
        'category'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function nurse() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
