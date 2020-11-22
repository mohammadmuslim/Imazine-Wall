<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cachin;
use Illuminate\Http\Request;

class CashinController extends Controller
{
    // CashIn Index ==========
    public function index()
    {
        $thisMonthCashin   = cachin::whereMonth('date', date('m'))->get();
        $thisMontCashTotal = cachin::whereMonth('date', date('m'))->sum('today_cach_in');

        return view('Admin.cashin.cashin_index', compact('thisMonthCashin', 'thisMontCashTotal'));
    }

    // CashIn Store ===========
    public function store(Request $request)
    {
        $request->validate([
            'date'          => 'required',
            'today_cach_in' => 'required',
        ]);
        // Store
        $cashinStore                = new cachin();
        $cashinStore->date          = $request->date;
        $cashinStore->today_cach_in = $request->today_cach_in;
        $cashinStore->save();

        // Notification
        $notification = array(
            'message'    => 'CashIn Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.cashin.index')->with($notification);
    }

    // CashIn Edit =================
    public function edit($id)
    {
        $cashInEdit = cachin::findOrFail($id);
        return view('Admin.cashin.cashin_edit', compact('cashInEdit'));
    }

    // CashIn Update ================
    public function update(Request $request, $id)
    {
        $cashInUpdate               = cachin::findOrFail($id);
        $cashInUpdate->date          = $request->date;
        $cashInUpdate->today_cach_in = $request->today_cach_in;
        $cashInUpdate->save();

        // Notification
        $notification = array(
            'message'    => 'CashIn Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.cashin.index')->with($notification);
    }

    // CashIn Destory ================
    public function destory($id)
    {
        $cashInDelete = cachin::findOrFail($id);
        $cashInDelete->delete();

        // Notification
        $notification = array(
            'message'    => 'CashIn Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.cashin.index')->with($notification);
    }
}
