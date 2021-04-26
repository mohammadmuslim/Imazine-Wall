<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bank;
use App\Models\collection;
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
        //bank
        $total_bank_amount = bank::sum('bank_amount');
        $total_withdraw_amount = Withdraw::sum('amount');
        $total_balance = $total_bank_amount-$total_withdraw_amount;
        //cash
        $all_collect = collection::sum('amount');
        $all_cost = shopcost::sum('cost_amount');
        $total_cash = $all_collect - $all_cost;
        //product unit
        $stock = stock::sum('quantity');

        //today collection

        $date = date('Y-m-d');
        $today_collection = collection::where('date', $date)->sum('amount');
        //today shop cost
        $today_shopcost =shopcost::where('date', $date)->sum('cost_amount');

        return view('Admin.dashboard',compact('total_balance','total_cash','stock','today_collection','today_shopcost'));
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
