<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'capital',
        'population',
        'region',
        'sub_region',
        'flag_url',
        'currency',
        'language'
    ];
}
