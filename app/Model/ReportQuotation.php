<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportQuotation extends Model
{
    protected $table='reportquotation';

    /**
     * @var array
     */
    protected $fillable = [
        'customrequest_id',
        'price',
        'packing',
        'paper_big_box', 
        'deposit', 
        'create_by', 
        'update_by',
        'created_at', 
        'updated_at'
    ];

    public function customrequest() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'customrequest_id');
    }
}
