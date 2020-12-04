@extends('layouts.admin_app')
@section('title', 'admin | report')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">সমস্ত বিক্রয় তালিকা</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
          <h2 class="text-center">ডিলার নাম:- {{ $customer_name->customer_name }}</h2> 
        <h2 class="mb-0 text-center">গত 7 দিনের হিসাব সংখ্যা:- ({{ $sevenDayInvoice->count() }})</h2>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>বিক্রয় তারিখ</th>
              <th>বোতলের সংখ্যা</th>
              <th>বোতলের দাম</th>
              <th>নগদ টাকা</th>
              <th>বাকি টাকা</th>
              <th>আগের সপ্তাহের বাকি</th>
              <th>মোট টাকা</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($sevenDayInvoice as $row)
            <tr>
              <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
              <td>{{ $row->water_quantity }}</td>
              <td>{{ $row->water_price }}</td>
              <td>{{ $row->paid_amount }}</td>
              <td>{{ $row->due_amount }}</td>
              <td>{{ $row->old_due }}</td>
              <td>{{ $row->total_amount }}</td>
              <td>
                  <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.invoice.edit', $row->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>
                    <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.invoice.destory', $row->id) }}">
                      @csrf
                      @method('DELETE')
                  </form>
              </td>
            </tr>
          @endforeach
          </tbody>
          <br><hr>
        </table>
      </div>
      <ul class="list-group">
          <li class="list-group-item active">গত 7 দিনের বাকি আছে:- {{ $sevenDayDue }} টাকা</li>
          <li class="list-group-item">গত 7 দিনের নগদ দিয়েছে:- {{ $sevenDayPaid }} টাকা</li>
          <li class="list-group-item">গত 7 দিনের পাওনা আছে:- {{ $sevenDayNewDue }} টাকা</li>
          <li class="list-group-item">গত 7 দিনের বোতল :- {{ $sevenDayWaterQ }} টা </li>
          <li class="list-group-item">গত 7 দিনের মোট টাকার পরিমাণ:- {{ $sevenDayTotal }} টাকা</li>
      </ul>
    </div>
  </div>
</div>
<!--- Data table End ---->

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h2 class="text-center">ডিলার নাম:- {{ $customer_name->customer_name }}</h2> 
          <h2 class="mb-0 text-center">এই মাসের হিসাব সংখ্যা:- ({{ $thisMonthReport->count() }})</h2>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>বিক্রয় তারিখ</th>
                <th>বোতলের সংখ্যা</th>
                <th>বোতলের দাম</th>
                <th>নগদ টাকা</th>
                <th>বাকি টাকা</th>
                <th>মোট টাকা</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($thisMonthReport as $row)
              <tr>
                <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
                <td>{{ $row->water_quantity }}</td>
                <td>{{ $row->water_price }}</td>
                <td>{{ $row->paid_amount }}</td>
                <td>{{ $row->due_amount }}</td>
                <td>{{ $row->total_amount }}</td>
                <td>
                    <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.invoice.edit', $row->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.invoice.destory', $row->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
            <br><hr>
          </table>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">এই মাসের বাকি :- {{ $thisMonthDueAmount }} টাকা</li>
            <li class="list-group-item">এই মাসের নগদ :- {{ $thisMonthPaidAmount }} টাকা</li>
            <li class="list-group-item">এই মাসের বোতল  :- {{ $thisMonthWaterQ }} টা </li>
            <li class="list-group-item">এই মাসে মোট টাকার পরিমাণ :- {{ $thisMonthTotalAmount }} টাকা</li>
          </ul>
      </div>
    </div>
  </div>
<!--- Data table End ---->

@endsection