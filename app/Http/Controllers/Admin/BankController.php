<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bank;
use Auth;
use Illuminate\Http\Request;

class BankController extends Controller
{
    //
    public function index(){
        

        $collection_data = bank::latest()->paginate(10);
        $bank_data       = bank::all();
        return view('Admin.banking.index', compact('collection_data', 'bank_data'));
    }

    //bank amount add
    public function addamount(Request $request){
        $add_amount = new bank();
        $add_amount->user_name = Auth::user()->name;
        $add_amount->bank_name = $request->bank_name;
        $add_amount->bank_amount = $request->bank_amount;
        $add_amount->date = $request->date;
        $add_amount->save();

        $notification = array(
            'message'    => 'টাকা সংরক্ষণ সফল হয়েছে',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
