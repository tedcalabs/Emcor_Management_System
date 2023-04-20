<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'description'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'category_service','category_id','service_id');
    }
}
