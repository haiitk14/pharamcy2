<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MixingIngredients extends Model
{
    protected $table='mixing_ingredients';

    /**
     * @var array
     */
    protected $fillable = [
        'reportmixing_id',
        'ingredient_id',
        'code', 
        'name_ingredient', 
        'inactive', 
        'per_batch',
        'wt_amt',
        'lot_no', 
        'wt_by',
        'created_at', 
        'updated_at'
    ];

    public function reportmixing() 
    {
        return $this->belongsTo('App\Model\ReportMixing', 'reportmixing_id');
    }
}
