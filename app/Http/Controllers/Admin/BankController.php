<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddBank;
use App\Models\bank;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BankController extends Controller
{
    //
    public function index(){


        $bank_data = bank::latest()->paginate(5);
        $bank_list       = AddBank::all();
        return view('Admin.banking.index', compact('bank_data','bank_list'));
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

    // bank View
    public function bankview($id)
    {
        $bank_single_view = AddBank::findOrFail($id);

        $bank_drap_view = bank::where('bank_name', $bank_single_view->bank_name)->latest()->paginate(5);
        $bank_withdraw_view = Withdraw::where('bank_name', $bank_single_view->bank_name)->latest()->paginate(5);

        $drap = bank::where('bank_name', $bank_single_view->bank_name)->sum('bank_amount');
        $withdraw = Withdraw::where('bank_name', $bank_single_view->bank_name)->sum('amount');
        $total = $drap - $withdraw;
        return view('Admin.banking.bank_single_view', compact('bank_single_view','bank_drap_view','bank_withdraw_view','total','drap','withdraw'));

    }
}
