<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportFormula extends Model
{
    protected $table='reportformula';

    /**
     * @var array
     */
    protected $fillable = [
        'customrequest_id',
        'po',
        'filling_wt',
        'serving_size', 
        'gelatin_batch', 
        'create_by', 
        'update_by',
        'created_at', 
        'updated_at'
    ];

    public function customrequest() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'customrequest_id');
    }

    public function formula_ingredients() 
    {
        return $this->hasMany('App\Model\FormulaIngredients', 'reportformula_id');
    }
}
