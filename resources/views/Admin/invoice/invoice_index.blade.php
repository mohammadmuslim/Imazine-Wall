@extends('layouts.admin_app')
@section('title', 'admin | Invoice')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">সমস্ত বিক্রয় তালিকা</h6>
      </div>
      <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('admin.invoice.create') }}" class="btn btn-lg btn-dark">নতুন বিক্রয় যুক্ত করুন</a>
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
          <h2 class="mb-0">মোট বিক্রয় ({{ $invoices->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>ডিলার এর নাম</th>
                <th>বিক্রয় তারিখ</th>
                <th>বোতলের সংখ্যা</th>
                <th>নগদ টাকা</th>
                <th>বাকি টাকা</th>
                <th>মোট টাকা</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($invoices as $row)
              <tr>
                <td>{{ $row->customer->customer_name }}</td>
                <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
                <td>{{ $row->water_quantity }}</td>
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
          </table>
          {{ $invoices->links() }}
        </div>
      </div>
    </div>
  </div>
<!--- Data table End ---->

@endsection