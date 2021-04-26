<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addshop;
use App\Models\collection;
use App\Models\invoice;
use App\Models\invoicedetail;
use Illuminate\Http\Request;

class AddshopController extends Controller
{
    //
    public function index()
    {
        return view('Admin.addshop.index');
    }
    //shop add

    public function addshop(Request $request)
    {
        $addshop_added                = new addshop;
        $addshop_added->shop_name     = $request->shop_name;
        $addshop_added->shop_adress   = $request->shop_adress;
        $addshop_added->mobile_number = $request->mobile_number;
        $addshop_added->save();

        // Notification
        $notification = array(
            'message'    => 'দোকান সংরক্ষিত হয়েছে',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // Shop View
    public function shopview($id)
    {
        $shop_single_view  = addshop::findOrFail($id);
        $invoice           = invoice::where('shop_id', $id)->where('status', 1)->latest()->paginate(20);
        $collections       = collection::where('shop_id', $id)->latest()->paginate(20);
        $total_amount      = invoicedetail::where('shop_id', $id)->where('status', 1)->sum('selling_price');
        $total_coll_amount = collection::where('shop_id', $id)->sum('amount');
        $rest_amount       = $total_amount - $total_coll_amount;

        return view('Admin.addshop.shop_single_view', compact('shop_single_view', 'invoice', 'collections', 'total_amount', 'total_coll_amount', 'rest_amount'));
    }

    // Shop Lists
    public function shopLists()
    {
        $shops = addshop::all();
        return view('Admin.addshop.shoplists', compact('shops'));
    }
}
