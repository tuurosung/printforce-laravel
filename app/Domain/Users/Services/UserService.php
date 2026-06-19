<?php

namespace App\Domain\Users\Services;

use App\Domain\Users\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $users
    ){}


    public function createUser(array $data): User
    {
        return $this->users->create($data);
    }


    public function getAllUsers(): Collection
    {
        return $this->users->allUsers();
    }


    public static function getTechnicalUsers()
    {
        // $tecnicalUsersArray = config('printforce.users.technical_users');

        // return User::whereIn('access_level', $tecnicalUsersArray)
        //     ->where('subscriber_id', Auth::user()->subscriber_id)
        //     ->orderBy('name', 'asc')->get();
    }
}
