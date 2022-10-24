<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;
    protected $timestamps = true;
    protected $filable = ['city',
    'country',
    'lat',
    'long',
    'region',
    'timezone_id',
    'temperature',
    'text',
    'sunrise',
    'sunset',
    'humidity',
    'pressure',
    'rising',
    'visibility'];

}
