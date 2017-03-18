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
        'prix',
        'client_id'
    ];


    /** Get Location items*/ 
    public function items() 
    { 
    	return $this->belongsToMany('App\Model\Item');
    }

    public function client()
    {
        return $this->belongsTo('App\Model\Client');
    }
    
}
