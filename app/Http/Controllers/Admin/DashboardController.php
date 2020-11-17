<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\post;
use DB;
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
        return view('Admin.dashboard');
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
