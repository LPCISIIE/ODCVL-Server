<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name'];

    public function parent()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function subCategories()
    {
        return $this->hasMany('App\Model\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }

    public function properties()
    {
        return $this->belongsToMany('App\Model\Property')->withPivot('required');
    }
}
