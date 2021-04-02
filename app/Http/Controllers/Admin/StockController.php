<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Index
    public function index()
    {
       return view('Admin.stock.index');
    }

    // Store
    public function store(Request $request)
    {
       
    }
}
