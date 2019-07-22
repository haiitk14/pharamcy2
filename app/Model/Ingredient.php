<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $code
 * @property string $name
 * @property boolean $inactive
 * @property boolean $is_delete
 * @property boolean $is_using
 * @property datetime $create_at
 * @property int $create_by
 * @property datetime $update_at
 * @property int $update_by
 */

class Ingredient extends Model
{
    protected $table='ingredient';
     /**
     * @var array
     */
    protected $fillable = [
        'code', 
        'name', 
        'inactive', 
        'is_delete', 
        'is_using', 
        'create_at', 
        'create_by', 
        'update_at', 
        'update_by'
    ];

    public function salesOrderIngredients()
    {
        return $this->hasMany('App\Model\SalesOrderIngredients', 'ingredient_id');
    }
}
