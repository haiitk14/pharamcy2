<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InspectionWorker extends Model
{
    protected $table='inspection_worker';

    /**
     * @var array
     */
    protected $fillable = [
        'reportinspection_id',
        'rack_no',
        'inspection_worker',
        'date',
        'time',
        'ck_by',
        'comments',
        'IPC',
        'cost',
        'create_by', 
        'update_by',
        'created_at', 
        'updated_at'
    ];

    public function report_inspection() 
    {
        return $this->belongsTo('App\Model\ReportInspection', 'reportinspection_id');
    }

}
