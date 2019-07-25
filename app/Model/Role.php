<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $code
 * @property string $name
 * @property boolean $created_at
 * @property boolean $updated_at
 */

class Role extends Model
{
    protected $table='roles';
     /**
     * @var array
     */
    protected $fillable = ['code' ,'name', 'created_at', 'updated_at'];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->hasMany('App\User','id', 'roles_code');
    }
}
