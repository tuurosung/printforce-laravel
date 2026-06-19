<?php

namespace App\Domain\Users\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function update(User $user, array $data): bool;
    public function delete(User $user): bool;


    public function findById(int $id): ?User;
    public function findByEmail(string $email): ?User;


    public function allUsers(): Collection;
}
