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
 * @property boolean $role_id
 * @property boolean $is_delete
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['username', 'password', 'email', 'name', 'role_id', 'is_active', 'is_delete'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsto('App\Model\Role', 'role_id', 'id');
    }

    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

}
