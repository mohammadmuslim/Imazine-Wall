<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\companycost;
use Illuminate\Http\Request;

class CompanyCostController extends Controller
{
    // Customer Index ================
    public function index()
    {
        $companyCosts = companycost::orderBy('id', 'DESC')->paginate(30);
        return view('Admin.companycost.companycost_index', compact('companyCosts'));
    }

    // Customer Store ================
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'date'  => 'required',
            'costs' => 'required',
        ]);
        $companyCostStore = new companycost();
        // Store
        $companyCostStore->date  = date('Y-m-d', strtotime($request->date));
        $companyCostStore->costs = $request->costs;
        $companyCostStore->save();
        // Notification
        $notification = array(
            'message'    => 'Cost Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.company.cost.index')->with($notification);
    }


    // Customer Edit =================
    public function edit($id)
    {
        $companyCostEdit = companycost::findOrFail($id);
        return view('Admin.companycost.companycost_edit', compact('companyCostEdit'));
    }


    // Customer Update ===============
    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'date'  => 'required',
            'costs' => 'required',
        ]);
        $companyCostUpdate = companycost::findOrFail($id);
        // Store
        $companyCostUpdate->date  = date('Y-m-d', strtotime($request->date));
        $companyCostUpdate->costs = $request->costs;
        $companyCostUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Cost Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.company.cost.index')->with($notification);
    }

    // Customer Destory ===============
    public function destory($id)
    {
        $companyCostDelete = companycost::findOrFail($id);
        $companyCostDelete->delete();
        // Notification
        $notification = array(
            'message'    => 'Cost Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.company.cost.index')->with($notification);
    }


    // Company Monthly Report ==========
    public function companyReport()
    {
        $companyMonthCost = companycost::whereMonth('date', '=', date('m'))->get();
        $companyThisMCost = companycost::whereMonth('date', '=', date('m'))->sum('costs');
        return view('Admin.report.company_month_report', compact('companyMonthCost', 'companyThisMCost'));
    }
}
