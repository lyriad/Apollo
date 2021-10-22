<?php

namespace Tests\Unit\Modules;

use App\Models\Patient;
use App\Http\Livewire\Patients\Form as PatientsForm;
use function Tests\userLogin;
use function Pest\Faker\faker;
use function Pest\Livewire\livewire;

beforeEach(function () {

    userLogin();
});

test('Component mounts and renders', function () {

    livewire(PatientsForm::class, ['patient_hid' => ''])
        ->assertSet('patient', null)
        ->assertViewIs('livewire.patients.form')
        ->assertSeeHtml('<input wire:model="name"')
        ->assertSeeHtml('<input wire:model="birthdate"')
        ->assertSeeHtml('<select wire:model="gender"')
        ->assertSeeHtml('<input wire:model="weight"')
        ->assertSeeHtml('<input wire:model="height"')
        ->assertSeeHtml('<textarea wire:model="observations"')
        ->assertSeeHtml('<button wire:click="save"');
});

test('Can\'t register patient with empty dataset', function () {

    livewire(PatientsForm::class, ['patient_hid' => ''])
        ->call('save')
        ->assertHasErrors([
            'name' => ['required'],
        ]);
});

test('Can\'t register patient with extremely long name', function () {

    livewire(PatientsForm::class, ['patient_hid' => ''])
        ->set('name', faker()->text(400))
        ->set('gender', ['male', 'female'][rand(0, 1)])
        ->set('weight', faker()->numberBetween(70, 300))
        ->set('height', faker()->numberBetween(120, 190))
        ->set('observations', faker()->text(100))
        ->call('save')
        ->assertHasErrors([
            'name' => ['max']
        ]);
});

test('Can\'t register patient with invalid data', function () {

    livewire(PatientsForm::class, ['patient_hid' => ''])
        ->set('name', faker()->name())
        ->set('birthdate', 'aa-aa-aaaa')
        ->set('gender', 'test')
        ->set('weight', -1)
        ->set('height', -1)
        ->set('observations', '')
        ->call('save')
        ->assertHasErrors([
            'birthdate' => ['date'],
            'gender' => ['in'],
            'weight' => ['min'],
            'height' => ['min'],
        ]);
});

test('Can register patient', function () {

    $name = (faker()->name() . ' - ' . faker()->uuid());

    livewire(PatientsForm::class, ['patient_hid' => ''])
        ->set('name', $name)
        ->set('gender', ['male', 'female'][rand(0, 1)])
        ->set('weight', faker()->numberBetween(70, 300))
        ->set('height', faker()->numberBetween(120, 190))
        ->set('observations', faker()->text(100))
        ->call('save')
        ->assertHasNoErrors();

    $this->assertTrue(Patient::where('name', $name)->exists());
});
