<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OutPut extends Model
{
    protected $table = 'output';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date_sortie',
        'date_retour',
        'status',
        'created_at',
        'updated_at'
    ];

    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

}
