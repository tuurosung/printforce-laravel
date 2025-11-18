<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAccessLevels()
    {
        return [
            'administrator' => 'Administrator',
            'reception' => 'Reception',
        ];
    }


    public static function getTechnicalUsers()
    {
        $tecnicalUsersArray = config('printforce.users.technical_users');

        return User::whereIn('access_level', $tecnicalUsersArray)
            ->where('subscriber_id', Auth::user()->subscriber_id)
            ->orderBy('name', 'asc')->get();
    }
}
