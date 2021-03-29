<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addshop;

class AddshopController extends Controller
{
     //
     public function index(){
    	return view('Admin.addshop.index');
    }
    //shop add

    public function addshop(Request $request){
        $addshop_added = new addshop;
        $addshop_added->shop_name = $request->shop_name;
        $addshop_added->shop_adress = $request->shop_adress;
        $addshop_added->mobile_number = $request->mobile_number;
        $addshop_added->save();

        // Notification
        $notification = array(
            'message'    => 'দোকান সংরক্ষিত হয়েছে',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
