<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchlist extends Model
{
    use HasFactory;

    protected $fillable =['factor_number','product_id','count','price'];

    public function userlist()
    {
        return $this->belongsTo(Userlist::class);
    }
}
