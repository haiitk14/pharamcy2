<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bigint $id
 * @property int $customrequest_id
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
        'customrequest_id', 
        'comment_id', 
        'create_at', 
        'update_at', 
    ];

    public function custom_request() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'salesorder_comments_id');
    }

    public function customrequest() 
    {
        return $this->belongsTo('App\Model\CustomRequest', 'customrequest_id');
    }
}
