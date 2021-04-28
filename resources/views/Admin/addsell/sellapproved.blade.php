@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')

<div class="card">
    <div class="card-header">
        <h2>Invoice Approved</h2>
    </div>

<!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0">LIST</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-dark"> Invoice No: {{ $invoice->invoice_no }} ({{ date('d-m-Y', strtotime($invoice->date)) }}) </h4>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('admin.invoice.approve.process', $invoice->id) }}"> 
                @csrf
              <!--- Customer Info start ---->
              <table class="table" style="color: black;">
                <tbody>
                  <tr> 
                    <td><strong>Invoice No: </strong>
                      {{ $invoice->invoice_no }}
                    </td>
                    <td><strong>Shop Name: </strong>
                      {{ $invoice->shop->shop_name }} 
                    </td>
                    <td><strong>Shop Owner Number: </strong>
                        {{ $invoice->shop->mobile_number }}
                    </td>
                  </tr>
                </tbody>
              </table>
              <!--- Customer Info End ---->
              <!---- Selling info Start -->
              <table class="table borderd" style="background: #e2e2e2;  color: black;" width="100%">
                <thead style="background:#cdced2;">
                 <tr class="text-center">
                  <th>SL NO.</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                 </tr>
                </thead>
                <tbody>
                  @php 
                  $subTotal = '0';
                  @endphp
                  @foreach($invoice['invoicedetails'] as $key => $invoices) 

                  <input type="hidden" name="product_id[]" value="invoices->product_id">

                  <input type="hidden" name="selling_qty[{{ $invoices->id }}]" value="invoices->selling_qty">
                  <tr class="text-center">

                    <td>{{ $key+1 }}</td>
                    <td>{{ $invoices->product->product_name }}</td>
                    <td>{{ $invoices->selling_qty }}</td>
                    <td>{{ $invoices->unit_price }}</td>
                    <td>{{ $invoices->selling_price }}</td>
                  </tr>
                  @php
                  $subTotal += $invoices->selling_price;
                  @endphp
                @endforeach
                <tr class="text-center">
                  <td colspan="4" class="text-right"><strong>Grant Total:</strong></td>
                  <td><strong>{{ $subTotal }}</strong></td>
                </tr>
                </tbody>
              </table>
              <!---- Selling info End -->
              <input type="submit" name="submit" value="Invoice Approved" class="btn btn-primary">
              </form>
            </div>
          </div>
    </div>
  </div>
<!--- Data table End ---->
</div>
@endsection