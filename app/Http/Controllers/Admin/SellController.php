<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addshop;
use App\Models\pmeta;
use Illuminate\Http\Request;

class SellController extends Controller
{
    //
    public function index()
    {
        $shop_data = addshop::select('id', 'shop_name')->get();
        return view('Admin.addsell.index', compact('shop_data'));
    }

    // sell store
    public function store(Request $request)
    {
        // Add sell
        for ($i = 0; $i < count($request->product_id); $i++) {
            $pmeta                   = new pmeta();
            $pmeta->product_id       = $request->product_id[$i];
            $pmeta->product_quantity = $request->quantity[$i];
            $pmeta->product_price    = $request->price[$i];
            $pmeta->save();
            // Notification
            $notification = array(
                'message'    => 'সংরক্ষিত হল',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
        
    }
}
