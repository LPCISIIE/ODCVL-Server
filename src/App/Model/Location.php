<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date_debut',
        'date_fin'
    ];

    /** Get Location items*/ 
    public function items() 
    { 
    	return $this->belongsToMany('App\Model\Item'); 
    }



}
