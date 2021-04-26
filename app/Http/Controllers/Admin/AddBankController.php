<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AddBank;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Validator;
class AddBankController extends Controller
{
    //
    public function index(){

        $data = AddBank::latest()->paginate(5);
        $bank_data       = AddBank::all();
        return view('Admin.banking.addbank', compact('data','bank_data'));
    }

    public function store(Request $request){
        $bank = new AddBank;
        $bank->bank_name = $request->bank_name;
        $bank->user_name = Auth::user()->name;
        $bank->description = $request->description;
         $bank->save();
         $notification = array(
            'message'    => 'Bank Added SuccessFully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function withdraw(){
         $data = Withdraw::latest()->paginate(5);
        $bank_list       = AddBank::all();
        return view('Admin.banking.withdraw', compact('bank_list','data'));

    }

    public function withdrawamount(Request $request){
        $bank = new Withdraw;
        $bank->bank_name = $request->bank_name;
        $bank->user_name = Auth::user()->name;
        $bank->amount = $request->amount;
        $bank->date = $request->date;
         $bank->save();
         $notification = array(
            'message'    => 'Withdraw SuccessFully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
