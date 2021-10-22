<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->hid = 'U' . now()->format('Y') . str_pad($user->id, 7, '0', STR_PAD_LEFT);
        $user->save();
    }
}
