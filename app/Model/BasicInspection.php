<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $content
 * @property datetime $create_at
 * @property datetime $update_at
 */

class BasicInspection extends Model
{
    protected $table='basic_inspection';
    /**
     * @var array
     */
    protected $fillable = ['reportinspection_id', 'content', 'create_at', 'update_at'];

    public function report_inspection() 
    {
        return $this->belongsTo('App\Model\ReportInspection', 'reportinspection_id');
    }
}
