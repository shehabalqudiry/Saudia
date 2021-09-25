<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    protected $guarded = [];

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

}
