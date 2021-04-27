<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addshop;
use App\Models\invoice;
use App\Models\invoicedetail;
use App\Models\product;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SellController extends Controller
{
    //
    public function index()
    {
        $data['shop_data'] = addshop::select('id', 'shop_name')->get();
        $data['products']  = product::all();
        $invoice_no        = invoice::orderBy('id', 'desc')->first();
        if ($invoice_no == null) {
            $firstInvoice        = '0';
            $data['invoiceData'] = $firstInvoice + 1;
        } else {
            $invoiceCheck        = invoice::orderBy('id', 'desc')->first()->invoice_no;
            $data['invoiceData'] = $invoiceCheck + 1;
        }

        return view('Admin.addsell.index', $data);
    }

    // sell store
    public function store(Request $request)
    {
        // Multipale Data Insert start //
        $invoice             = new invoice();
        $invoice->invoice_no = $request->invoice_id;
        $invoice->shop_id    = $request->shop_id;
        $invoice->date       = date('Y-m-d', strtotime($request->date));
        $invoice->status     = '0';
        if ($invoice->save()) {

            for ($i = 0; $i < count($request->product_id); $i++) {
                $invoice_details                = new invoicedetail();
                $invoice_details->date          = $request->date;
                $invoice_details->invoice_id    = $invoice->id;
                $invoice_details->shop_id       = $request->shop_id;
                $invoice_details->product_id    = $request->product_id[$i];
                $invoice_details->selling_qty   = $request->quantity[$i];
                $invoice_details->unit_price    = $request->price[$i];
                $invoice_details->selling_price = $request->quantity[$i] * $request->price[$i];
                $invoice_details->status        = '0';
                $invoice_details->save();
            }
        } else {
            
        }
        // Notification
        $notification = array(
            'message'    => 'Sell Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // Pending list
    public function pendingList()
    {
        $invoices = invoice::where('status', 0)->latest()->paginate(20);
        return view('Admin.addsell.pendinglist', compact('invoices'));
    }

    // Approved List
    public function sellingApproved($id)
    {
        $invoice = invoice::with('invoicedetails')->find($id);
        return view('Admin.addsell.sellapproved', compact('invoice'));
    }

    public function approvedProcess(Request $request, $id)
    {
        foreach($request->selling_qty as $key => $val){
            $invoiceDetail = invoiceDetail::where('id', $key)->first();
            $stock  = stock::where('product_id', $invoiceDetail->product_id)->first();
            if($stock->quantity < $invoiceDetail->selling_qty) {
                // Notification
                $notification = array(
                    'message'    => 'Your Product Is out of Stock',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        }
        $invoice  = invoice::find($id);
        $invoice->status = '1';
        DB::transaction(function() use($request,$invoice,$id) {
            foreach($request->selling_qty as $key => $val){
               $invoiceDetail = invoiceDetail::where('id', $key)->first();
               $invoiceDetail->status = '1';
               $invoiceDetail->save();
               $stock = stock::where('product_id', $invoiceDetail->product_id)->first();
               $stock->quantity = ((float)$stock->quantity)-((float)$invoiceDetail->selling_qty);
               $stock->save(); 
            }
            $invoice->save();
         });

        // Notification
        $notification = array(
            'message'    => 'Products Approved Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.invoice.approve.list')->with($notification);        
    }

    // Approved Lists
    public function approvedList()
    {
        $invoices = invoice::where('status', 1)->latest()->get();
        return view('Admin.addsell.sellapprovedlists', compact('invoices'));
    }

    // Approved View
    public function approvedView($id)
    {
        $invoice = invoice::with('invoicedetails')->find($id);
        return view('Admin.addsell.sellapprovedview', compact('invoice'));
    } 

    // Sell Delete
    public function sellDelete($id)
    {
       $invoice_delete = invoice::findOrFail($id);
       $invoice_delete->delete();
       invoicedetail::where('invoice_id', $invoice_delete->id)->delete();

       // Notification
       $notification = array(
        'message'    => 'Invoice Deleted Successfully',
        'alert-type' => 'success',
      );
      return redirect()->back()->with($notification); 

    }

    // Sell Prient
    public function sellPrient($id)
    {
        $data['invoice'] = invoice::with('invoicedetails')->findOrFail($id);
        $pdf = PDF::loadView('Admin.pdf.invoice_prient', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
 