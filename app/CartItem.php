<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        "user_id", "food_id", "quantity",
    ];

    public function food()
    {
        return $this->belongsTo("App\Food");
    }
    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
