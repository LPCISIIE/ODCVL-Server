<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date_debut',
        'date_fin',
        'created_at',
        'updated_at',
        'status',
        'prix'
    ];

    public function items()
    { 
    	return $this->belongsToMany('App\Model\Item');
    }

    public function client()
    {
        return $this->belongsTo('App\Model\Client');
    }


    public function getTotalPrice() 
    {
        return $this->items()->sum('prix');
    }

  
    public function inputs()
    {
        return $this->hasMany('App\Model\InPut');
    }

    public function outputs()
    {
        return $this->hasMany('App\Model\OuPut');
    }

}
