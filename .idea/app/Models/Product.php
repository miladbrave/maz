<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function attributevalus()
    {
        return $this->belongsToMany(Attributevalue::class,'attributevalue_product');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
