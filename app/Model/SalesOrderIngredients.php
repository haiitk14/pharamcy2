<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property int $custom_request_id
 * @property int $ingredient_id
 * @property timestamps $create_at
 * @property timestamps $update_at
 */

class SalesOrderIngredients extends Model
{
    protected $table='salesorder_ingredients';

    /**
     * @var array
     */
    protected $fillable = [
        'custom_request_id', 
        'ingredient_id', 
        'create_at', 
        'update_at', 
    ];

    public function custom_request() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'salesorder_ingredients_id');
    }
}
