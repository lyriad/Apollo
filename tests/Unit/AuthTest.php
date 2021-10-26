<?php

namespace Tests\Unit;

use function Pest\Livewire\livewire;
use App\Http\Livewire\Auth\Login as LoginForm;

test('Component mounts and renders', function () {

    livewire(LoginForm::class)
        ->assertViewIs('livewire.auth.login')
        ->assertSeeHtml('<input wire:model="email"')
        ->assertSeeHtml('<input wire:model="password"')
        ->assertSeeHtml('<button id="submit-button"');
});

test('Can\'t login with empty credentials', function () {

    livewire(LoginForm::class)
        ->set('email', null)
        ->set('password', null)
        ->call('login')
        ->assertHasErrors([
            'email' => 'required',
            'password' => 'required'
        ]);
});

test('Can\'t login with invalid credentials', function () {

    livewire(LoginForm::class)
        ->set('email', 'flbdafjdkbf')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors([
            'email' => 'email',
        ]);

    livewire(LoginForm::class)
        ->set('email', 'definitelynotrealemail@fake.com')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors([
            'email' => 'exists',
        ]);
});

test('Can login with valid credentials', function () {

    livewire(LoginForm::class)
        ->set('email', 'nurse1@apollo.com')
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect(route('home'));
});
