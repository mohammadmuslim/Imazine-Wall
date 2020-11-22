<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\monthlysale;
use Illuminate\Http\Request;

class MonthlySaleController extends Controller
{
    // CashIn Index ==========
    public function index()
    {
        $thisMonthSales      = monthlysale::whereMonth('date', date('m'))->get();
        $thisMonthTotalSales = monthlysale::whereMonth('date', date('m'))->sum('today_sales');

        return view('Admin.monthlysale.monthlysale_index', compact('thisMonthSales', 'thisMonthTotalSales'));
    }

    // CashIn Store ===========
    public function store(Request $request)
    {
        $request->validate([
            'date'        => 'required',
            'today_sales' => 'required',
        ]);
        // Store
        $thisMonthSaleStore              = new monthlysale();
        $thisMonthSaleStore->date        = $request->date;
        $thisMonthSaleStore->today_sales = $request->today_sales;
        $thisMonthSaleStore->save();

        // Notification
        $notification = array(
            'message'    => 'Today Total Amount Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.monthly.sale.index')->with($notification);
    }
    

    // CashIn Edit =================
    public function edit($id)
    {
        $thisMonthSaleEdit = monthlysale::findOrFail($id);
        return view('Admin.monthlysale.monthlysale_edit', compact('thisMonthSaleEdit'));
    }


    // CashIn Update ================
    public function update(Request $request, $id)
    {
        $monthSaleUpdate              = monthlysale::findOrFail($id);
        $monthSaleUpdate->date        = $request->date;
        $monthSaleUpdate->today_sales = $request->today_sales;
        $monthSaleUpdate->save();

        // Notification
        $notification = array(
            'message'    => 'Today Total Amount Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.monthly.sale.index')->with($notification);
    }


    // CashIn Destory ================
    public function destory($id)
    {
        $TodaySalesnDelete = monthlysale::findOrFail($id);
        $TodaySalesnDelete->delete();

        // Notification
        $notification = array(
            'message'    => 'Today Sale Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.monthly.sale.index')->with($notification);
    }
}
