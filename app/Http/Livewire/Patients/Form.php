<?php

namespace App\Http\Livewire\Patients;

use Livewire\Component;
use App\Repositories\PatientRepository;

class Form extends Component
{
    var $patient;
    public $name = '';
    public $birthdate;
    public $gender = 'male';
    public $weight;
    public $height;
    public $observations;

    public function mount(string $patient_hid) 
    {
        $this->patient = PatientRepository::firstByHid($patient_hid);

        if (!$this->patient) return;
        $this->name = $this->patient->name;
        $this->birthdate = $this->patient->birthdate->format('Y-m-d');
        $this->gender = $this->patient->gender;
        $this->weight = $this->patient->weight_kg;
        $this->height = $this->patient->height_cm;
        $this->observations = $this->patient->observations;
    }

    public function render()
    {
        return view('livewire.patients.form');
    }

    public function save() 
    {
        $this->validate([
            'name' => 'required|string|min:10|max:191',
            'birthdate' => 'nullable|date|before_or_equal:today',
            'gender' => 'required|string|in:male,female',
            'weight' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'observations' => 'nullable|max:400'
        ]);

        $data = [
            'name' => $this->name,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'weight_kg' => $this->weight,
            'height_cm' => $this->height,
            'observations' => $this->observations
        ];

        if ($this->patient) {
            PatientRepository::updateById($this->patient->id, $data);

        } else {
            $patient = PatientRepository::create($data);

            return redirect()->route('patients.update', [
                'hid' => $patient->hid
            ]);
        }
    }
}
