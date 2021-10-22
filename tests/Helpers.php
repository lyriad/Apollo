<?php

namespace Tests;

use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Authenticatable;

function actingAs(Authenticatable $user, string $driver = null) {
    Auth::guard('web')->login($user, true);
    return test()->actingAs($user, $driver);
}

function userLogin() {
    $user = UserRepository::firstByEmail('nurse1@apollo.com');
    return actingAs($user);
}
