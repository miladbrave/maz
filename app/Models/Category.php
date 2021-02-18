<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','type'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'attribute_category')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
