<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addshop;
use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\invoicedetail;
use App\Models\product;
use App\Models\stock;
use DB;

class SellController extends Controller
{
    //
    public function index()
    {
        $data['shop_data'] = addshop::select('id', 'shop_name')->get();
        $data['products']  = product::all();
        $invoice_no = invoice::orderBy('id','desc')->first();
    	if($invoice_no == null){
    		$firstInvoice = '0';
    		$data['invoiceData']  =  $firstInvoice+1;
    	} else{
    		$invoiceCheck = invoice::orderBy('id','desc')->first()->invoice_no;
    		$data['invoiceData'] = $invoiceCheck+1;
    	}

        return view('Admin.addsell.index', $data);
    }

    // sell store
    public function store(Request $request)
    {
        // Multipale Data Insert start //
        $invoice = new invoice();
        $invoice->invoice_no  = $request->invoice_id;
        $invoice->shop_id     = $request->shop_id;
        $invoice->date        = date('Y-m-d', strtotime($request->date));
        $invoice->status      = '0';
        if($invoice->save()) {

           for ($i=0; $i < count($request->product_id); $i++) 
           {
               $invoice_details = new invoicedetail();
               $invoice_details->date = $request->date;
               $invoice_details->invoice_id = $invoice->id;
               $invoice_details->product_id = $request->product_id[$i];
               $invoice_details->selling_qty = $request->quantity[$i];
               $invoice_details->unit_price = $request->price[$i];
               $invoice_details->selling_price = $request->quantity[$i] * $request->price[$i];
               $invoice_details->status = '0';
               $invoice_details->save();
           }
        }
        // Notification
        $notification = array(
            'message'    => 'Sell Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}