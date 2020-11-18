@extends('layouts.admin_app')
@section('title', 'admin | report')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">কোম্পানির মাসিক খরচ</h6>
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
          <h2 class="mb-0 text-center">এই মাসের খরচ সংখ্যা:- ({{ $companyMonthCost->count() }})</h2>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>খরচের তারিখ</th>
                <th>খরচ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($companyMonthCost as $row)
              <tr>
                <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
                <td>{{ $row->costs }}</td>
                <td>
                    <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.company.cost.edit', $row->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.company.cost.destory', $row->id) }}">
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
            <li class="list-group-item active">এই মাসে মোট খরচের পরিমাণ :- {{ $companyThisMCost }} টাকা</li>
        </ul>
      </div>
    </div>
  </div>
<!--- Data table End ---->

@endsection