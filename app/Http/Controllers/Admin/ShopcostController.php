<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\AddBank;
use App\Models\bank;
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

    //
    public function bank(){
        $bank_list       = AddBank::all();
        return view('Admin.shopcost.bank',compact('bank_list'));
    }

    //bank amount add
    public function costbankamount(Request $request){
        $add_amount = new bank();
        $add_amount->user_name = Auth::user()->name;
        $add_amount->bank_name = $request->bank_name;
        $add_amount->bank_amount = $request->cost_amount;
        $add_amount->date = $request->date;
        $add_amount->save();

        $add_amount = new shopcost();
        $add_amount->user_name = Auth::user()->name;
        $add_amount->cost_details = $request->bank_name;
        $add_amount->cost_amount = $request->cost_amount;
        $add_amount->date = $request->date;
        $add_amount->save();

        $notification = array(
            'message'    => 'টাকা সংরক্ষণ সফল হয়েছে',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }




}
