<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property string $ipd
 * @property int $product_id
 * @property int $customer_id
 * @property string $address
 * @property int $manufature_id
 * @property string $formula_number
 * @property string $revision
 * @property date $date
 * @property bool $is_softgel
 * @property bool $is_tablet
 * @property bool $is_hardcapsule
 * @property string $size_type
 * @property string $color_logo
 * @property string $filling_wt
 * @property string $order
 * @property string $salesorder_ingredients_id
 * @property string $salesorder_comments_id
 * @property int $create_by
 * @property int $update_by
 * @property timestamps $create_at
 * @property timestamps $update_at
 */

class CustomRequest extends Model
{
    protected $table='custom_request';

    /**
     * @var array
     */
    protected $fillable = [
        'ipd',
        'product_id',
        'customer_id', 
        'address', 
        'manufature_id', 
        'formula_number', 
        'revision',
        'date',
        'is_softgel',
        'is_tablet',
        'is_hardcapsule',
        'size_type', 
        'color_logo', 
        'filling_wt', 
        'order', 
        'salesorder_ingredients_id',
        'salesorder_comments_id',
        'create_by', 
        'update_by',
        'create_at', 
        'update_at'
    ];

    public function salesorder_ingredients()
    {
        return $this->hasMany('App\Model\SalesOrderIngredients', 'salesorder_ingredients_id');
    }

    public function salesorder_comments()
    {
        return $this->hasMany('App\Model\SalesOrderComments', 'salesorder_comments_id');
    }

}
