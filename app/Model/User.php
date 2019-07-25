<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $name
 * @property string $remember_token
 * @property boolean $roles_code
 * @property boolean $is_delete
 * @property boolean $is_admin
 * @property boolean $is_superadmin
 * @property boolean $is_user
 */
class User extends Model
{
    /**
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
    protected $hidden = ['password','remember_token'];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsto('App\Model\Role', 'roles_code', 'id');
    }

    

}
