<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OraderUser extends Pivot
{
    use HasFactory;

    protected $table = 'order_user';
    protected $guarded = [];

    public $incrementing = false;
    public $timestamps = false;
    
    public function order() 
    {
        return $this->belongsTo(Order::class);

    }

    public function user() 
    {
        return $this->belongsTo(product::class);

    }
}
