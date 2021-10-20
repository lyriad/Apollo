<?php

namespace App\Observers;

use App\Models\User;
use Vinkla\Hashids\Facades\Hashids;

class UserObserver
{
    public function created(User $user)
    {
        $user->hid = Hashids::encode($user->id);
        $user->save();
    }
}
