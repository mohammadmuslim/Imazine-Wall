<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bank;
use App\Models\collection;
use App\Models\invoice;
use App\Models\invoicedetail;
use App\Models\Withdraw;
use App\Models\shopcost;
use App\Models\stock;
use Auth;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    // Admin Dashboard ==================
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Report =============
        //today sell
        $date = date('Y-m-d');
        $today_sell = invoicedetail::where('date', $date)->where('status', 1)->sum('selling_price');
        //bank
        $Mercantile_amount = bank::where('bank_name','Mercantile Bank Limited')->sum('bank_amount');
        $Mercantile_withdraw = Withdraw::where('bank_name','Mercantile Bank Limited')->sum('amount');
        $Mercantile_total = $Mercantile_amount-$Mercantile_withdraw;

        $NRB_amount = bank::where('bank_name','NRB Bank Ltd')->sum('bank_amount');
        $NRB_withdraw = Withdraw::where('bank_name','NRB Bank Ltd')->sum('amount');
        $NRB_total = $NRB_amount-$NRB_withdraw;
        //cash
        $collect = Collection::sum('amount');
        $discount = Collection::sum('discount');
        $all_collect = $collect - $discount;
        $all_cost = shopcost::sum('cost_amount');
        $total_cash = $all_collect - $all_cost;
        //product unit
        $stock = stock::sum('quantity');

         //today sell unit
         $today_sell_unit = invoicedetail::where('date', $date)->sum('selling_qty');

        //today collection

        $date = date('Y-m-d');
        $today_amount = collection::where('date', $date)->sum('amount');
        $today_discount = collection::where('date', $date)->sum('discount');
        $today_collection = $today_amount-$today_discount;
        //today shop cost
        $today_shopcost =shopcost::where('date', $date)->sum('cost_amount');

        return view('Admin.dashboard',compact('total_cash','stock','today_collection','today_shopcost',
        'today_sell','Mercantile_total','NRB_total','today_sell_unit'));
    }
    // Admin Logout
    public function logout()
    {
        Auth::logout();
        // Notification
        $notification = array(
            'message'    => 'Logout Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect('/')->with($notification);
    }
}
