<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class collection extends Model
{
    // Belongs To AddShop
    public function addshop()
    {
        return $this->belongsTo(addshop::class, 'shop_id', 'id');
    }
}
