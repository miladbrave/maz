<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $uploads = '/photo/';

    public function getPathAttribute($photo)
    {
        return $this->uploads . $photo;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
