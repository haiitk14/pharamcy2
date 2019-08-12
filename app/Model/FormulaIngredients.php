<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FormulaIngredients extends Model
{
    protected $table='formula_ingredients';

    /**
     * @var array
     */
    protected $fillable = [
        'reportformula_id',
        'ingredient_id',
        'code', 
        'name_ingredient', 
        'inactive', 
        'per_serving',
        'per_unit',
        'purity',
        'overage',
        'per_tab',
        'per_batch',
        'tab100',
        'create_at', 
        'update_at'
    ];

    public function reportformula() 
    {
        return $this->belongsTo('App\Model\ReportFormula', 'reportformula_id');
    }
}
