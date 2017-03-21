<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'status',
        'reparations',
        'remarques',
        'purchased_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }

    public function location()
    {
        return $this->belongsToMany('App\Model\Location'); 
    }
}
