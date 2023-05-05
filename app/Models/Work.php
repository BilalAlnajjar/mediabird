<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function video(){
        
        return $this->hasOne(Video::class);
    }

    public function images(){
        
        return $this->hasMany(Image::class);
    }

    public function voice(){
        
        return $this->hasOne(Voice::class);
    }

    public function link(){
        
        return $this->hasOne(Link::class);
    }
}
