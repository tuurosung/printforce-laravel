<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{

    public function __construct(private User $model){}


    public function create(array $data): User
    {
        return $this->model->create($data);
    }


    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }


    public function delete(User $user): bool
    {
        return $user->delete();
    }


    public function findById(int $id): User
    {
        return $this->model->findOrFail($id);
    }


    public function findByEmail(string $email): User
    {
        return $this->model->whereEmail($email)->first();
    }


    public function allUsers(): Collection
    {
        return $this->model->orderBy("firstname", "desc")->get();
    }
}
