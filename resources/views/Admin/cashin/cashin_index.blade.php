@extends('layouts.admin_app')
@section('title', 'admin | cashin')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">আজকের নগদ বিক্রয় যুক্ত করুন</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.cashin.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">আজকের তারিখ</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="today_cach_in">আজকের নগদ বিক্রয়</label>
                <input type="number" class="form-control" id="today_cach_in" name="today_cach_in" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
        </div>
        <div class="col-md-1"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <div class="table-responsive py-4">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>সিরিয়াল</th>
                <th>আজকের তারিখ</th>
                <th>নগদ বিক্রয়</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($thisMonthCashin as $key => $row)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
                <td>{{ $row->today_cach_in }}</td>
                <td>
                    <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.cashin.edit', $row->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.cashin.destory', $row->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">এই মাসে মোট নগদ বিক্রয় পরিমাণ :- {{ $thisMontCashTotal }} টাকা</li>
        </ul>
      </div>
    </div>
  </div>
<!--- Data table End ---->
@endsection