<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InventoryIngredients extends Model
{
    protected $table='inventory_ingredients';

    /**
     * @var array
     */
    protected $fillable = [
        'reportinventory_id',
        'ingredient_id',
        'code', 
        'name_ingredient', 
        'inactive', 
        'per_batch',
        'in_stock',
        'lot',
        'purchased',
        'checked',
        'created_at', 
        'updated_at'
    ];

    public function reportinventory() 
    {
        return $this->belongsTo('App\Model\ReportInventory', 'reportinventory_id');
    }
}
