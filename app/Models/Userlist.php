<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    use HasFactory;

    public function purchlists()
    {
        return $this->hasMany(Purchlist::class,'factor_number');
    }
}
