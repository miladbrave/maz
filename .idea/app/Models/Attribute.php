<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public function attributevalue()
    {
        return $this->hasMany(Attributevalue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'attribute_category')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
