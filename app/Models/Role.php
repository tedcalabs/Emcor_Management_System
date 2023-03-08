<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
        // 'email',
        //'password',
        //'role_id',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users', 'roles_id', 'users_id');
    }
}
