<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shopcost;
use App\Models\collection;
use Illuminate\Http\Request;

class CashController extends Controller
{
    //
    public function index(){
        $all_collect = Collection::sum('amount');
        $all_cost = shopcost::sum('cost_amount');
        $total = $all_collect - $all_cost;
        $shopcost_data = shopcost::latest()->paginate(10);
        $collection = Collection::with('addshop')->latest()->paginate(10);
        return view('Admin.shopcash.shopcash',compact('collection','shopcost_data','total'));
    }
}
