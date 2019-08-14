<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CostIngredients extends Model
{
    protected $table='cost_ingredients';

    /**
     * @var array
     */
    protected $fillable = [
        'reportcost_id',
        'ingredient_id',
        'code', 
        'name_ingredient', 
        'inactive', 
        'per_unit',
        'per_batch',
        'price_per_kg',
        'price_per_batch', 
        'reportformula_id',
        'create_by', 
        'update_by',
        'created_at', 
        'updated_at'
    ];

    public function reportcost() 
    {
        return $this->belongsTo('App\Model\ReportCost', 'reportcost_id');
    }
}
