<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offerer extends Model
{
    //
    protected $fillable = [
        'offerer_name',
        'offerer_legal_name',
        'description',
        'phone',
        'address',
        'website',
        'verification_website',
    ];
}
