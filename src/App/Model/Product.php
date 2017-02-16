<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany('App\Model\Item');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category');
    }
}
