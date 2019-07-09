<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $name
 * @property boolean $is_active
 * @property boolean $is_delete
 */

class Role extends Model
{
     /**
     * @var array
     */
    protected $fillable = ['name', 'is_active', 'is_delete'];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->hasMany('App\User','id', 'role_id');
    }

    /**
     * Check role access with permissions
     */
    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    /**
     * Check role has permission
     */
    private function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
