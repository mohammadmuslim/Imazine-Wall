<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\collection;
use Auth;

class CollectionController extends Controller
{
    //
    public function index(){
        $collection_data = collection::latest()->paginate(5);
    	return view('Admin.collection.index', compact('collection_data'));
    }

    // store
    public function store(Request $request)
    {
        $collection_store = new collection();
        $collection_store->user_name = Auth::user()->name;
        $collection_store->date = $request->date;
        $collection_store->shop_name = $request->name;
        $collection_store->amount = $request->amount;
        $collection_store->save();

        // Notification
        $notification = array(
            'message'    => 'Amount Collection Succcessfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    // edit 
    public function edit($id)
    {
       $collection_edit = collection::find($id);
       return view('Admin.collection.edit', compact('collection_edit'));
    }

    // update
    public function update(Request $request, $id)
    {
       $collection_update = collection::find($id);
       $collection_update->user_name = Auth::user()->name;
        $collection_update->date = $request->date;
        $collection_update->shop_name = $request->name;
        $collection_update->amount = $request->amount;
        $collection_update->save();

        // Notification
        $notification = array(
            'message'    => 'Amount Collection update successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.collection.index')->with($notification);
    }

    // delete
    public function delete($id)
    {
        $collection_delete = collection::find($id);
        $collection_delete->delete();

        // Notification
        $notification = array(
            'message'    => 'Amount Collection Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.collection.index')->with($notification);

    }
}
