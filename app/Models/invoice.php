<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    //
    public function shop()
    {
        return $this->belongsTo(addshop::class, 'shop_id', 'id');
    }
    
    public function invoicedetails()
    {
        return $this->hasMany(invoicedetail::class, 'invoice_id', 'id');
    }

   
}
