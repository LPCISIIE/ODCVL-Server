<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'item';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'purchased_at',
        'repaired_at'
    ];

    public function equipment()
    {
        return $this->belongsTo('App\Model\Equipment');
    }

    public function properties()
    {
        return $this->belongsToMany('App\Model\Property')->withPivot('value');
    }
}