<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoice extends Model
{
    // Belong To Customer ==========
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
}
