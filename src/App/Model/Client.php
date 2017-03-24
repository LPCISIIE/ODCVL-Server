<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'prenom',
        'organisme',
        'adresse',
        'telephone',
        'email'
    ];

    public function locations()
    {
        return $this->hasMany('App\Model\Location');
    }

    public static function validateEmail($email)
    {   
        return Client::where('email', '=', $email)->first();
    }
}
