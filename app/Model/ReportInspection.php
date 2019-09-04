<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportInspection extends Model
{
    protected $table='reportinspection';

    /**
     * @var array
     */
    protected $fillable = [
        'customrequest_id',
        'batch_no',
        'personel',
        'qcpersonel',
        'create_by', 
        'update_by',
        'created_at', 
        'updated_at'
    ];

    public function customrequest() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'customrequest_id');
    }

    public function basic_inspection() 
    {
        return $this->hasMany('App\Model\BasicInspection', 'reportinspection_id');
    }

}
