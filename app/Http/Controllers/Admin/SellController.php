<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addshop;

class SellController extends Controller
{
    // 
    public function index(){
        $shop_data       = addshop::select('id', 'shop_name')->get();
    	return view('Admin.addsell.index', compact('shop_data'));
    }
}
