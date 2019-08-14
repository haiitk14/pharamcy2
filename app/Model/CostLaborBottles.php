<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CostLaborBottles extends Model
{
    protected $table='cost_laborbottles';

    /**
     * @var array
     */
    protected $fillable = [
        'reportcost_id',
        'cost', 
        'hour', 
        'person', 
        'process', 
        'total', 
        'created_at', 
        'updated_at'
    ];

    public function reportcost() 
    {
        return $this->belongsTo('App\Model\ReportCost', 'reportcost_id');
    }
}
