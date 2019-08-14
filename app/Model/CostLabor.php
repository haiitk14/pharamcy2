<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CostLabor extends Model
{
    protected $table='cost_labor';

    /**
     * @var array
     */
    protected $fillable = [
        'reportcost_id',
        'amount',
        'cost', 
        'hour', 
        'person', 
        'process', 
        'created_at', 
        'updated_at'
    ];

    public function reportcost() 
    {
        return $this->belongsTo('App\Model\ReportCost', 'reportcost_id');
    }
}
