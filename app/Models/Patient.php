<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'hid',
        'name',
        'birthdate',
        'gender',
        'weight_kg',
        'height_cm',
        'observations'
    ];

    protected $casts = [
        'birthdate' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $appends = [
        'age',
        'weight_lb',
        'height_ft'
    ];

    public function getAgeAttribute() {
        return $this->birthdate->age;
    }

    public function getWeightLbAttribute() {
        return kilograms_to_pounds($this->weight_kg);
    }

    public function getHeightFtAttribute() {
        return centimeters_to_feet_and_inches($this->height_cm);
    }
}
