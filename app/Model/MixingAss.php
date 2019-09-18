<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MixingAss extends Model
{
    protected $table='mixing_ass';

    /**
     * @var array
     */
    protected $fillable = [
        'reportmixing_id',
        'name',
        'labor_name', 
        'time_in', 
        'time_out', 
        'record', 
        'cost_per_hour', 
        'labor_cost', 
        'created_at', 
        'updated_at'
    ];

    public function reportmixing() 
    {
        return $this->belongsTo('App\Model\ReportMixing', 'reportmixing_id');
    }
}
