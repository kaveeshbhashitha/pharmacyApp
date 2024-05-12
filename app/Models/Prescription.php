<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'pname',
        'pemail',
        'pnote',
        'address',
        'street',
        'city',
        'dtimeone',
        'dtimetwo',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'status',
    ];
}
