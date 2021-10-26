<?php

namespace Tests\Unit;

use App\Repositories\PatientRepository;
use App\Http\Livewire\BPReadings\Form as BPReadingsForm;
use App\Http\Livewire\BPReadings\DataTable as BPReadingsTable;
use function Tests\userLogin;
use function Pest\Faker\faker;
use function Pest\Livewire\livewire;

beforeEach(function () {

    userLogin();

    $gender = ['male', 'female'][rand(0, 1)];
    if (!isset($this->patient)) {
        $this->patient = PatientRepository::create([
            'name' => faker()->name($gender),
            'birthdate' => faker()->dateTimeInInterval('-70 years', '+60 years'),
            'gender' => $gender,
            'weight_kg' => rand(70.00, 300.00),
            'height_cm' => rand(120.0, 190.0),
            'observations' => faker()->text(rand(50, 400)),
        ]);
    }

    expect($this->patient)->not->toBeNull();
});

test('Component mounts and renders', function () {

    livewire(BPReadingsForm::class, ['patient_hid' => $this->patient->hid])
        ->assertSet('patient', null)
        ->assertViewIs('livewire.bp-readings.form')
        ->assertSeeHtml('<input wire:model.debounce.250ms="systolic"')
        ->assertSeeHtml('<input wire:model.debounce.250ms="diastolic"')
        ->assertSeeHtml('<button wire:click="save"');
});

test('Can\'t register blood pressure reading with empty dataset', function () {

    livewire(BPReadingsForm::class, ['patient_hid' => $this->patient->hid])
        ->set('systolic', null)
        ->set('diastolic', null)
        ->call('save')
        ->assertHasErrors([
            'systolic' => ['required'],
            'diastolic' => ['required']
        ]);
});

test('Can\'t register blood pressure reading with invalid data', function () {

    livewire(BPReadingsForm::class, ['patient_hid' => $this->patient->hid])
        ->set('systolic', 'hfbsflakjs')
        ->set('diastolic', 'afhdsfb')
        ->call('save')
        ->assertHasErrors([
            'systolic' => ['integer'],
            'diastolic' => ['integer']
        ]);

    livewire(BPReadingsForm::class, ['patient_hid' => $this->patient->hid])
        ->set('systolic', 100)
        ->set('diastolic', 200)
        ->call('save')
        ->assertHasErrors([
            'systolic' => ['gt'],
            'diastolic' => ['lt']
        ]);
});

test('Can register blood pressure reading', function () {


    $this->patient->bpReadings()->delete();

    livewire(BPReadingsForm::class, ['patient_hid' => $this->patient->hid])
        ->set('systolic', 110)
        ->set('diastolic', 80)
        ->call('save')
        ->assertHasNoErrors();

    $this->assertTrue($this->patient->bpReadings()->exists());
});
