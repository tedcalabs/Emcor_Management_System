<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'rname',
        'cname',
        'caddress',
        'cphone',
        'rsched',
        'status',    
    ];
}
