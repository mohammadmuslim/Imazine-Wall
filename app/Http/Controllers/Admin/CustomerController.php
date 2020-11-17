<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\invoice;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Customer Index ================
    public function index()
    {
        $customers = customer::latest()->get();
        return view('Admin.customer.customer_index', compact('customers'));
    }

    // Customer Store ================
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'customer_name'   => 'required',
            'customer_mobile' => 'required',
        ]);
        $customerStore = new customer();
        // Store
        $customerStore->customer_name    = $request->customer_name;
        $customerStore->customer_mobile  = $request->customer_mobile;
        $customerStore->customer_address = $request->customer_address;
        $customerStore->save();
        // Notification
        $notification = array(
            'message'    => 'Delar Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.customer.index')->with($notification);
    }

    // Customer Edit =================
    public function edit($id)
    {
        $customerEdit = customer::findOrFail($id);
        return view('Admin.customer.customer_edit', compact('customerEdit'));
    }

    // Customer Update ===============
    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'customer_name' => 'required',
        ]);
        $customerUpdate = customer::findOrFail($id);
        // Store
        $customerUpdate->customer_name    = $request->customer_name;
        $customerUpdate->customer_mobile  = $request->customer_mobile;
        $customerUpdate->customer_address = $request->customer_address;
        $customerUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Delar Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.customer.index')->with($notification);
    }

    // Customer Destory ===============
    public function destory($id)
    {
        $customerDelete = customer::findOrFail($id);
        $customerDelete->delete();
        // Notification
        $notification = array(
            'message'    => 'Delar Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.customer.index')->with($notification);
    }

    // Indivisul Customer Report ===========
    public function customerReport($id)
    {
        // Customer
        $customer_name = customer::where('id', $id)->first();
        // Last 7 day's Report
        $sevenDayInvoice = invoice::where('customer_id', $id)->orderBy('id', 'DESC')->take(7)->get();
        $sevenDayTotal   = $sevenDayInvoice->sum('total_amount');
        $sevenDayPaid    = $sevenDayInvoice->sum('paid_amount');
        $sevenDayDue     = $sevenDayInvoice->sum('due_amount');
        $sevenDayWaterQ  = $sevenDayInvoice->sum('water_quantity');
        // This Month Report
        $thisMonthReport      = invoice::where('customer_id', $id)->whereMonth('date', '=', date('m'))->get();
        $thisMonthTotalAmount = $thisMonthReport->sum('total_amount');
        $thisMonthPaidAmount  = $thisMonthReport->sum('paid_amount');
        $thisMonthDueAmount   = $thisMonthReport->sum('due_amount');
        $thisMonthWaterQ      = $thisMonthReport->sum('water_quantity');
        return view('Admin.report.customer_monthly_report', compact('customer_name', 'thisMonthReport', 'thisMonthTotalAmount', 'thisMonthPaidAmount', 'thisMonthDueAmount', 'thisMonthWaterQ', 'sevenDayInvoice', 'sevenDayTotal', 'sevenDayPaid', 'sevenDayDue', 'sevenDayWaterQ'));
    }
}
