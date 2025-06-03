<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $data = $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $password = $data['password'];
        $user->forceFill([
            'password' => Hash::make($password)
        ]);

        if ($user->save()) {
            return redirect()->back()->with('success', "Bingo! Password updated successfully");
        }

        return redirect()->back()->with('error', "Something went wrong");
    }
}
