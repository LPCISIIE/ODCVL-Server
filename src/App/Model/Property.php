<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name'];

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category')->withPivot('required');
    }

    public function products()
    {
        return $this->belongsToMany('App\Model\Product')->withPivot('required');
    }

    public function items()
    {
        return $this->belongsToMany('App\Model\Item')->withPivot('value');
    }
}