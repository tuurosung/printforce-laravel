<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subscriber_id',
        'name',
        'email',
        'phone_number',
        'password',
        'access_level',
        'firstname',
        'lastname'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Attributes ------------------------------------------------------------------------
     */


     public function accessLevelName(): Attribute
     {
        return Attribute::make(
            get: fn () => $this->getAccessLevelName()
        );
     }


    /**
     * Relationships ---------------------------------------------------------------------
     */

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
        return $this->access_level === 'print_technician';
    }
}
