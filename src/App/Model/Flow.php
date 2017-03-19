<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    protected $table = 'flow';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date_entree',
        'date_sortie',
        'type',
        'status',
        'created_at',
        'updated_at'
    ];

    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

}
