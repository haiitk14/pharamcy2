<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportMixing extends Model
{
    protected $table='reportmixing';

    /**
     * @var array
     */
    protected $fillable = [
        'customrequest_id',
        'batch_no',
        'personnel', 
        'ipc_person', 
        'weighing_person',
        'blendling_person',
        'line_clear',
        'ipc', 
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
        return $this->hasMany('App\Model\MixingIngredients', 'reportmixing_id');
    }

    public function mixing_ass() 
    {
        return $this->hasMany('App\Model\MixingAss', 'reportmixing_id');
    }
}
