@extends('layouts.admin_app')
@section('title', 'admin | report')
@section('content_body')

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="text-center text-primary">ডিলারের নাম:- {{ $customerName->customer_name }}</h2>
          <h2 class="mb-0 text-center">এই ডিলারের <span class="text-danger">{{ date('d-m-Y', strtotime($start_date)) }}</span> থেকে <span class="text-danger">{{ date('d-m-Y', strtotime($end_date)) }} </span> তারিখের হিসাব</h2>
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
              @foreach($delarReports as $row)
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
              <li class="list-group-item active">বাকি আছে:- {{ $delarDueAmount }} টাকা</li>
              <li class="list-group-item">নগদ দিয়েছে:- {{ $delarPaidAmount }} টাকা</li>
              <li class="list-group-item">বোতল :- {{ $delarWaterQ }} টা </li>
              <li class="list-group-item">মোট টাকার পরিমাণ:- {{ $delarTotalAmount }} টাকা</li>
          </ul> 
      </div>
    </div>
  </div>
<!--- Data table End ---->

@endsection