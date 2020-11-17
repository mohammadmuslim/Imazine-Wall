<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Invoice Index ================
    public function index()
    {
        $invoices = invoice::orderBy('id', 'DESC')->paginate(50);
        return view('Admin.invoice.invoice_index', compact('invoices'));
    }

    // Invoice Create ================
    public function create()
    {
        $customers = customer::all();
        return view('Admin.invoice.invoice_create', compact('customers'));
    }

    // Invoice Store ================
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'date'           => 'required',
            'water_quantity' => 'required',
            'water_price'    => 'required',
            'customer_id'    => 'required',
        ]);
        $invoiceStore = new invoice();
        // Store
        $total_amount                 = $request->water_price * $request->water_quantity;
        $invoiceStore->customer_id    = $request->customer_id;
        $invoiceStore->date           = date('Y-m-d', strtotime($request->date));
        $invoiceStore->water_quantity = $request->water_quantity;
        $invoiceStore->water_price    = $request->water_price;
        $invoiceStore->paid_amount    = $request->paid_amount;
        $invoiceStore->due_amount     = $request->due_amount;
        $invoiceStore->total_amount   = $total_amount;
        $invoiceStore->save();
        // Notification
        $notification = array(
            'message'    => 'Sale Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.invoice.index')->with($notification);
    }

    // Invoice Edit =================
    public function edit($id)
    {
        $customers = customer::all();
        $invoiceEdit = invoice::findOrFail($id);
        return view('Admin.invoice.invoice_edit', compact('invoiceEdit', 'customers'));
    }

    // Invoice Update ===============
    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'date'           => 'required',
            'water_quantity' => 'required',
            'water_price'    => 'required',
            'customer_id'    => 'required',
        ]);
        $invoiceUpdate = invoice::findOrFail($id);
        // Store
        $total_amount                  = $request->water_price * $request->water_quantity;
        $invoiceUpdate->customer_id    = $request->customer_id;
        $invoiceUpdate->date           = date('Y-m-d', strtotime($request->date));
        $invoiceUpdate->water_quantity = $request->water_quantity;
        $invoiceUpdate->water_price    = $request->water_price;
        $invoiceUpdate->paid_amount    = $request->paid_amount;
        $invoiceUpdate->due_amount     = $request->due_amount;
        $invoiceUpdate->total_amount   = $total_amount;
        $invoiceUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Sale Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.invoice.index')->with($notification);
    }

    // Invoice Destory ===============
    public function destory($id)
    {
        $invoiceDelete = invoice::findOrFail($id);
        $invoiceDelete->delete();
        // Notification
        $notification = array(
            'message'    => 'Delar Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.invoice.index')->with($notification);
    }
}
