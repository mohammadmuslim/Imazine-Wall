@extends('layouts.admin_app')
@section('title', 'admin | company-cost')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">কোম্পানির মাসিক খরচের তালিকা</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">কোম্পানির মাসিক খরচ যুক্ত করুন এখান থেকে</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.company.cost.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">খরচের তারিখ</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="costs">মোট খরচ</label>
                <input type="number" class="form-control" id="costs" name="costs" required>
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
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0">মোট খরচের সংখ্যা ({{ $companyCosts->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>সিরিয়াল</th>
                <th>খরচের তারিখ</th>
                <th>মোট খরচ</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($companyCosts as $key => $row)
              <tr>
                <td>{{ $key+1 }}</td>
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
          </table>
          {{ $companyCosts->links() }}
        </div>
      </div>
    </div>
  </div>
<!--- Data table End ---->


@endsection