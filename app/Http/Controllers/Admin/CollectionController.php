<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\addshop;
use App\Models\collection;
use Auth;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
    public function index()
    {
        $data['collection_data'] = collection::latest()->paginate(5);
        $data['shop_data']       = addshop::select('id', 'shop_name')->get();

        $invoice_no = collection::orderBy('id', 'desc')->first();

        if ($invoice_no == null) {
            $firstInvoice          = '0';
            $data['collection_no'] = $firstInvoice + 1;
        } else {
            $invoiceCheck          = collection::orderBy('id', 'desc')->first()->collection_id;
            $data['collection_no'] = $invoiceCheck + 1;
        }

        return view('Admin.collection.index', $data);
    }

    //store
    public function store(Request $request)
    {
        $collection_store                = new collection();
        $collection_store->collection_id = $request->collection_no;
        $collection_store->user_name     = Auth::user()->name;
        $collection_store->shop_id       = $request->shop_id;
        $collection_store->date          = $request->date;
        $collection_store->amount        = $request->amount;
        $collection_store->discount      = $request->discount;
        $collection_store->save();

        // Notification
        $notification = array(
            'message'    => 'টাকা সংরক্ষণ সফল হয়েছে',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    //edit
    public function edit($id)
    {
        $data['collection_edit'] = collection::find($id);
        $data['shop_data']       = addshop::select('id', 'shop_name')->get();

        return view('Admin.collection.edit', $data);

    }

    //update

    public function update(Request $request, $id)
    {
        $collection_update            = collection::find($id);
        $collection_update->user_name = Auth::user()->name;
        $collection_update->shop_id   = $request->shop_id;
        $collection_update->date      = $request->date;
        $collection_update->amount    = $request->amount;
        $collection_update->discount  = $request->discount;
        $collection_update->save();

        // Notification
        $notification = array(
            'message'    => 'টাকা সংরক্ষন আপডেট করা হলো',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.collection.index')->with($notification);

    }

    //delete
    public function delete($id)
    {
        $collection_delete = collection::find($id);
        $collection_delete->delete();

        // Notification
        $notification = array(
            'message'    => 'টাকা সংরক্ষণ মুছে ফেলা হলো',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.collection.index')->with($notification);

    }

    // Return
    public function returnProduct()
    {
        $data['shop_data'] = addshop::select('id', 'shop_name')->get();

        $data['return_amount'] = collection::where('discount', 'Returned')->orderBy('id', 'desc')->get();

        $invoice_no = collection::orderBy('id', 'desc')->first();

        if ($invoice_no == null) {
            $firstInvoice          = '0';
            $data['collection_no'] = $firstInvoice + 1;
        } else {
            $invoiceCheck          = collection::orderBy('id', 'desc')->first()->collection_id;
            $data['collection_no'] = $invoiceCheck + 1;
        }

        return view('Admin.collection.return', $data);
    }

    // return store
    public function returnStore(Request $request)
    {
        $collection_return                = new collection();
        $collection_return->collection_id = $request->collection_no;
        $collection_return->user_name     = Auth::user()->name;
        $collection_return->shop_id       = $request->shop_id;
        $collection_return->date          = $request->date;
        $collection_return->amount        = $request->amount;
        $collection_return->r_amount      = $request->amount;
        $collection_return->discount      = 'Returned';
        $collection_return->save();

        // Notification
        $notification = array(
            'message'    => 'Returned Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
