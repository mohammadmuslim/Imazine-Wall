<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\shopcost;

class ShopcostController extends Controller
{
    //
    public function index(){
        $shopcost_data = shopcost::latest()->paginate(5);
        return view('Admin.shopcost.index',compact('shopcost_data'));
    }

    //cost add
    public function costadd(Request $request){
        $shopcost_add = new shopcost();
        $shopcost_add->user_name = Auth::user()->name;
        $shopcost_add->date = $request->date;
        $shopcost_add->cost_details = $request->cost_details;
        $shopcost_add->cost_amount = $request->cost_amount;
        $shopcost_add->save();


          // Notification
          $notification = array(
            'message'    => 'দোকানের খরচ সংরক্ষিত হল',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    //edit
    public function costedit($id){
        $shopcost_data = shopcost::find($id);
        return view('Admin.shopcost.edit',compact('shopcost_data'));

    }

    //update
    public function update(Request $request,$id){
        $shopcost_update = shopcost::find($id);
        $shopcost_update->user_name = Auth::user()->name;
        $shopcost_update->date = $request->date;
        $shopcost_update->cost_details= $request->cost_details;
        $shopcost_update->cost_amount = $request->cost_amount;
        $shopcost_update->save();

        // Notification
        $notification = array(
            'message'    => 'দোকানের খরচ  আপডেট করা হলো',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shopcost.index')->with($notification);
    }

}
