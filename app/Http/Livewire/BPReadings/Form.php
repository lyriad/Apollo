<?php

namespace App\Http\Livewire\BPReadings;

use Livewire\Component;
use App\Repositories\PatientRepository;
use App\Repositories\BPReadingRepository;

class Form extends Component
{
    public $patient_hid;
    public $patient_name;
    var $bpreading;

    public $systolic = 0;
    public $diastolic = 0;
    public $category = 'normal';
    public $date;
    public $is_open = false;

    protected $listeners = [
        'bpreading-form-open' => 'openModal',
        'bpreading-form-close' => 'closeModal'
    ];

    protected $rules = [
        'patient_hid' => 'required|exists:patients,hid',
        'systolic' => 'required|integer|min:0|gt:diastolic',
        'diastolic' => 'required|integer|min:0|lt:systolic',
    ];

    protected $messages = [
        'patient_hid.exists' => 'The patient could not be found.',
        'systolic.gt' => 'The systolic must be higher than the diastolic.',
        'diastolic.lt' => 'The diastolic must be lower than the systolic.',
    ];

    public function updatedSystolic() 
    {
        $this->validate();
        $this->category = determine_bp_reading_category($this->systolic, $this->diastolic);
    }

    public function updatedDiastolic() 
    {
        $this->validate();
        $this->category = determine_bp_reading_category($this->systolic, $this->diastolic);
    }

    public function openModal(string $bpreading_hid = '')
    {
        $this->bpreading = BPReadingRepository::firstByHid($bpreading_hid);
        if (isset($this->bpreading)) {
            $this->systolic = $this->bpreading->systolic;
            $this->diastolic = $this->bpreading->diastolic;
            $this->category = $this->bpreading->category;
            $this->date = $this->bpreading->created_at;
        }
        $this->is_open = true;
    }

    public function closeModal()
    {
        $this->systolic = 0;
        $this->diastolic = 0;
        $this->category = 'normal';
        $this->date = now();
        $this->resetValidation();
        $this->is_open = false;
    }

    public function save() 
    {
        $this->validate();

        $data = [
            'user_id' => auth()->id(),
            'patient_id' => PatientRepository::findIdByHid($this->patient_hid),
            'systolic' => $this->systolic,
            'diastolic' => $this->diastolic,
            'category' => $this->category
        ];

        if ($this->bpreading) {
            BPReadingRepository::updateById($this->bpreading->id, $data);

        } else {
            BPReadingRepository::create($data);
            $this->emit('bpreadings-table-reset');
            $this->closeModal();
        }
    }

    public function mount(string $patient_hid)
    {
        abort_if(!PatientRepository::existsByHid($patient_hid), 404);
        $this->patient_hid = $patient_hid;
        $this->patient_name = PatientRepository::firstByHid($patient_hid, ['name'])->name;
        $this->date = now();
    }

    public function render()
    {
        return view('livewire.bp-readings.form');
    }
}
