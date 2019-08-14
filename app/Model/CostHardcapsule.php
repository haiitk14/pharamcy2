<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CostHardcapsule extends Model
{
    protected $table='cost_hardcapsule';

    /**
     * @var array
     */
    protected $fillable = [
        'reportcost_id',
        'name',
        'num1', 
        'num2', 
        'num3', 
        'size_type', 
        'created_at', 
        'updated_at'
    ];

    public function reportcost() 
    {
        return $this->belongsTo('App\Model\ReportCost', 'reportcost_id');
    }
}
