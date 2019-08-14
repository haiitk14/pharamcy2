<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportCost extends Model
{
    protected $table='reportcost';

    /**
     * @var array
     */
    protected $fillable = [
        'customrequest_id',
        'po',
        'batch_no',
        'sum_price_per_batch_color', 
        'sum_price_per_batch_shell', 
        'sum_price_per_batch_inactive',
        'sum_num3_hardcapsule',
        'sum_amount_labor',
        'sum_cost1000', 
        'sum_amount_cost', 
        'sum_amount_labor_bottles',
        'sum_num1_type_bottles',
        'sum_num2_type_bottles',
        'sum_num3_type_bottles', 
        'create_by', 
        'update_by',
        'created_at', 
        'updated_at'
    ];

    public function customrequest() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'customrequest_id');
    }

    public function cost_ingredients() 
    {
        return $this->hasMany('App\Model\CostIngredients', 'reportcost_id');
    }

    public function cost_hardcapsule() 
    {
        return $this->hasMany('App\Model\CostHardcapsule', 'reportcost_id');
    }
}