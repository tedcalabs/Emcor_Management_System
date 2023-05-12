<?php

namespace App\Models;

use App\Models\Role;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Laravel\Sanctum\HasApiTokens;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'bdate',
        'gender',
        'phone',
        'email',
        'picture',
        'password',
        'role',
        'status',
        'sched_status',
        'device_token',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function maintenance()
    // {
    //     return $this->hasMany(Maintenance::class, 'device_token', 'device_token');
    // }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_users', 'roles_id', 'users_id');
    }
}
