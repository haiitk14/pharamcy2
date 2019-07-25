<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roles_code', 
        'name', 
        'username', 
        'email', 
        'password', 
        'is_active', 
        'is_delete', 
        'is_admin', 
        'is_superadmin',
        'is_user',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsto('App\Model\Role', 'roles_code', 'id');
    }
}
