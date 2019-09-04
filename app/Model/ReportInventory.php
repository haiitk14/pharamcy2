<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportInventory extends Model
{
    protected $table='reportinventory';

    /**
     * @var array
     */
    protected $fillable = [
        'customrequest_id',
        'batch_no',
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
        return $this->hasMany('App\Model\InventoryIngredients', 'reportinventory_id');
    }
}
