<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cachin;
use App\Models\companycost;
use App\Models\customer;
use App\Models\invoice;
use App\Models\monthlysale;
use Illuminate\Http\Request;
use PDF;

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
        
        $pdf = PDF::loadView('Admin.pdf.customer_report', compact('customerName', 'start_date', 'end_date', 'delarReports', 'delarTotalAmount', 'delarPaidAmount', 'delarDueAmount', 'delarWaterQ'));
	    $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');
    }


    // Company Costs Report ==============
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

        $pdf = PDF::loadView('Admin.pdf.company_cost', compact('start_date', 'end_date', 'companyCostReport', 'companyCostAmount'));
	    $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');
    }


    // Company CashIn Report ==============
    public function companyCashin(Request $request)
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
        $companyCashins     = cachin::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'ASC')->get();
        $companyCashinTotal = cachin::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'ASC')->sum('today_cach_in');

        $pdf = PDF::loadView('Admin.pdf.company_cashin', compact('start_date', 'end_date', 'companyCashins', 'companyCashinTotal'));
	    $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');
    }


    // Company Total Amount Report =================
    public function companyTotalAmount(Request $request)
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
        $companyTotals      = monthlysale::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'ASC')->get();
        $companyTotalAmount = monthlysale::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'ASC')->sum('today_sales');

        $pdf = PDF::loadView('Admin.pdf.company_total_amount', compact('start_date', 'end_date', 'companyTotals', 'companyTotalAmount'));
	    $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');
    }
}
