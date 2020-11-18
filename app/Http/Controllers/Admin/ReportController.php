<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\companycost;
use App\Models\customer;
use App\Models\invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Search Report ===============
    public function searchReport()
    {
        $customers = customer::all();
        return view('Admin.report.search_report', compact('customers'));
    }

    // Search Report Resuit ===========
    public function searchReportResuit(Request $request)
    {
        // validation
        $request->validate([
            'customer_id' => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
        ]);

        // Customer Name
        $customerName = customer::where('id', $request->customer_id)->first();
        $customer     = $request->customer_id;
        $start_date   = date('Y-m-d', strtotime($request->start_date));
        $end_date     = date('Y-m-d', strtotime($request->end_date));

        // Report
        $delarReports     = invoice::whereBetween('date', [$start_date, $end_date])->where('customer_id', $customer)->orderBy('id', 'ASC')->get();
        $delarTotalAmount = invoice::whereBetween('date', [$start_date, $end_date])->where('customer_id', $customer)->sum('total_amount');
        $delarPaidAmount  = invoice::whereBetween('date', [$start_date, $end_date])->where('customer_id', $customer)->sum('paid_amount');
        $delarDueAmount   = invoice::whereBetween('date', [$start_date, $end_date])->where('customer_id', $customer)->sum('due_amount');
        $delarWaterQ      = invoice::whereBetween('date', [$start_date, $end_date])->where('customer_id', $customer)->sum('water_quantity');

        return view('Admin.report.customer_search_report', compact('customerName', 'start_date', 'end_date', 'delarReports', 'delarTotalAmount', 'delarPaidAmount', 'delarDueAmount', 'delarWaterQ'));
    }

    // Company search Report ==============
    public function companysearchReport(Request $request)
    {
        // validation
        $request->validate([
            'start_date'  => 'required',
            'end_date'    => 'required',
        ]);
        // date
        $start_date   = date('Y-m-d', strtotime($request->start_date));
        $end_date     = date('Y-m-d', strtotime($request->end_date));
        // Report
        $companyCostReport = companycost::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'ASC')->get();
        $companyCostAmount = companycost::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'ASC')->sum('costs');

        return view('Admin.report.company_search_report', compact('start_date', 'end_date', 'companyCostReport', 'companyCostAmount'));
    }
}
