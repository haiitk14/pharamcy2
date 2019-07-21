<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property int $custom_request_id
 * @property int $comment_id
 * @property timestamps $create_at
 * @property timestamps $update_at
 */

class SalesOrderComments extends Model
{
    protected $table='salesorder_comments';

    /**
     * @var array
     */
    protected $fillable = [
        'custom_request_id', 
        'comment_id', 
        'create_at', 
        'update_at', 
    ];

    public function custom_request() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'salesorder_comments_id');
    }
}
