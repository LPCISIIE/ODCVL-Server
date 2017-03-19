<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InPut extends Model
{
    protected $table = 'input';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date_entree',
        'date_sortie',
        'status',
        'created_at',
        'updated_at'
    ];

    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

}
