<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_service');
    }
}
