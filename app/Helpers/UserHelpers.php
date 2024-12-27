<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserHelpers {

    public static function isAdmin() {
        $user = Auth::user();
        return $user->role_id == 1;
    }

    public static $accessLevels = [
        'administrator' => 'Administrator',
        'reception' => 'Reception',
    ];
}
