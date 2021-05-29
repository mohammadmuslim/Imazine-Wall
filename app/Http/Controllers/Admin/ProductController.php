<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //product
    public function index(){
        $product_list = product::all();
        return view('Admin.addproduct.index',compact('product_list'));

    }
    //add product
    public function addproduct(Request $request){
        $add_product = new product();
        $add_product->date = $request->date;
        $add_product->product_name = $request->product_name;
        $add_product->save();

           // Notification
           $notification = array(
            'message'    => 'সংরক্ষিত হল',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
