<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property int $customrequest_id
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
        'customrequest_id', 
        'ingredient_id', 
        'per_serving',
        'create_at', 
        'update_at', 
    ];

    public function customrequest() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'customrequest_id');
    }

    public function ingredient() 
    {
        return $this->belongsTo('App\Model\Ingredient', 'ingredient_id');
    }
}
