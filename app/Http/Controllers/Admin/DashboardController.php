<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\companycost;
use App\Models\invoice;
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

        // Today invoice Report
        $todaySale          = invoice::whereDate('date', today())->sum('total_amount');
        $todayDue           = invoice::whereDate('date', today())->sum('due_amount');
        $todayPaid          = invoice::whereDate('date', today())->sum('paid_amount');
        $todayWaterQuantity = invoice::whereDate('date', today())->sum('water_quantity');

        // Today Company Report
        $todayCompanyCost = companycost::whereDate('date', today())->sum('costs');

        // This Month Invoice Report
        $ThisMonthCosts   = companycost::whereMonth('date', date('m'))->sum('costs');

        return view('Admin.dashboard', compact('todaySale', 'todayDue', 'todayPaid', 'todayWaterQuantity', 'todayCompanyCost', 'ThisMonthCosts'));
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
