<?php

namespace App\Repositories;

use App\Models\User;

final class UserRepository extends BaseRepository 
{
    static $model = User::class;

    final static function existsByEmail(string $email) 
    {
        return User::where('email', $email)->exists();
    }

    final static function firstByEmail(string $email) 
    {
        return User::where('email', $email)->first();
    }

	public static function findByEmail(string $email)
    {
		return User::where('email' , $email)->first( );
	}
}
