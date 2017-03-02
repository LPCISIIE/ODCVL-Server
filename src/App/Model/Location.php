<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable=[

        'date_debut',
        'date_fin'
    ];


}
