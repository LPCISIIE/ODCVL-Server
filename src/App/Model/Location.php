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
      $total = 0.00;
      foreach ($this->items as $item) {
        $total += $item->product->prix;
      }
      return $total;
    }

  
    public function flows()
    {
        return $this->hasMany('App\Model\Flow');
    }



}
