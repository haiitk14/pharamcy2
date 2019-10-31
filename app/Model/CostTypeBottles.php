<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CostTypeBottles extends Model
{
    protected $table='cost_typebottles';

    /**
     * @var array
     */
    protected $fillable = [
        'reportcost_id',
        'name1',
        'name2', 
        'name3', 
        'name4',
        'name5', 
        'name6', 
        'name7', 
        'num1', 
        'num2', 
        'num3',
        'num4', 
        'num5', 
        'num6',
        'num7',
        'created_at', 
        'updated_at'
    ];

    public function reportcost() 
    {
        return $this->belongsTo('App\Model\ReportCost', 'reportcost_id');
    }
}
