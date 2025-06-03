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
            $model->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'access_level'
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
        return match ($this->access_level) {
            'administrator' => 'Administrator',
            'reception' => 'Receptionist',
            'super_admin' => 'Super Admin',
            default => 'Undefined Access',
        };
    }
}
