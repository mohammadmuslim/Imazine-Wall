@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
<div class="card-header">
   <h1 class="text-center">Shop Name:- {{ $shop_single_view->shop_name }}</h1>
</div>
<div class="card-body">
   <div class="row text-center">
      <div class="col-md-4">
         <h3>Shop Address:- {{ $shop_single_view->shop_adress }}</h3>
      </div>
      <div class="col-md-4">
         <h3>Mobile Numbers:- {{ $shop_single_view->mobile_number }}</h3>
      </div>
      <div class="col-md-4">
         <h3>Address:- {{ $shop_single_view->shop_adress }}</h3>
      </div>
   </div>
   <div class="row text-center">
      <div class="col-md-12">
          <h3>বাকি টাকা:- <span class="text-primary">{{ $rest_amount }} টাকা</span></h3>
      </div>
   </div>
   <hr>
   <!-- Shop Invoice -->
   <div class="row text-center">
      <div class="col-md-6">
         <h4>This Shop Total Cost <span class="text-primary">{{ $total_amount }} TK.</span> </h4>
         <div class="table-responsive py-4 ">
            <table class="table table-flush">
               <thead class="thead-light">
                  <tr>
                     <th>Invoice No.</th>
                     <th>Shop Name</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($invoice as $row)
                  <tr>
                     <td>{{ $row->invoice_no }}</td>
                     <td>{{ $row->shop->shop_name }}</td>
                     <td>{{ date('d-m-y', strtotime($row->date)) }}</td>
                     <td>
                        <a  title="Approved" href="{{ route('admin.invoice.approved.view', $row->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{ $invoice->links() }} 
         </div>
      </div>
      <div class="col-md-6">
         <h4>Total Collection Amount:- <span class="text-primary">{{ $total_coll_amount }} TK.</span></h4>
         <!-- Table -->
         <div class="row">
            <div class="col">
               <div class="card">
                  <!-- Card header -->
                  <div class="table-responsive py-4 ">
                     <table class="table table-flush">
                        <thead class="thead-light">
                           <tr>
                              <th>তারিখ</th>
                              <th>দোকানের নাম</th>
                              <th>টাকা</th>
                              <th>Discount</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($collections as $row)
                           <tr>
                              <td>{{ date('d-m-y', strtotime($row->date)) }}</td>
                              <td>{{ $row->addshop->shop_name }}</td>
                              <td>{{ $row->amount }}</td>
                              <td>{{ $row->discount }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     {{ $collections->links() }}
                  </div>
               </div>
            </div>
            <!--- Data table End ---->  
         </div>
      </div>
      <!-- Invoice End -->
   </div>
</div>
@endsection