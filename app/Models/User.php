<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Users\AccessLevelEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

#[Fillable(['subscriber_id', 'name', 'email','password', 'access_level', 'first_name', 'last_name'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // $model->user_id = generateRandomString();
            // $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $primaryKey = 'user_id';


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'access_level' => AccessLevelEnum::class
        ];
    }

    #[Scope]
    public static function technicalUsers(): Builder
    {

    }


    public function company()
    {
        return $this->belongsTo(Subscribers::class, 'subscriber_id');
    }


    /**
     * Methods ---------------------------------------------------------------------------
     */

    public static function getRegisteredUsers()
    {
        return User::where('subscriber_id', Auth::user()->subscriber_id)
            ->get();
    }


    public function getAccessLevelName()
    {
        $accessLevel = config('printforce.users.access_levels');

        return match (true) {
            array_key_exists($this->access_level, $accessLevel) => $accessLevel[$this->access_level],
            default => 'Undefined Access',
        };

        // return match ($this->access_level) {
        //     'administrator' => 'Administrator',
        //     'reception' => 'Receptionist',
        //     'super_admin' => 'Super Admin',
        //     default => 'Undefined Access',
        // };
    }


    public function isAdministrator()
    {
        return $this->access_level === 'administrator';
    }


    public function isReceptionist(){
        return $this->access_level === 'reception';
    }


    public function isPrintTechnician(){
        $printTechnicianLevels = config('printforce.users.technical_users');
        return in_array($this->access_level, $printTechnicianLevels);
    }
}
