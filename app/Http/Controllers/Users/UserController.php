<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::getRegisteredUsers();

        return view('app.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $is_created = User::create($data);

        return $is_created
            ? redirect()->back()->with('success', "Bingo! User created successfully")
            : redirect()->back()->with('error', "Something went wrong");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('app.users.modals.edit-user-modal', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (!$user->update($data)) {
            return redirect()->back()->with('error', "Something went wrong");
        }

        return redirect()->back()->with('success', "Bingo! User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Check if the user is the last admin
        if ($user->access_level === 'administrator' && User::where('subscriber_id', $user->subscriber_id)->where('access_level', 'administrator')->count() <= 1) {
            return redirect()->back()->with('error', "You cannot delete the last administrator");
        }

        if (!$user->delete()) {
            return redirect()->back()->with('error', "Something went wrong");
        }
        return redirect()->back()->with('success', "Bingo! User deleted successfully");
    }
}
