<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'image', 'description'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'category_service');
    }
}
