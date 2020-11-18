@extends('layouts.admin_app')
@section('title', 'admin | company-report')
@section('content_body')

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0 text-center">এই কোম্পানির <span class="text-danger">{{ date('d-m-Y', strtotime($start_date)) }}</span> থেকে <span class="text-danger">{{ date('d-m-Y', strtotime($end_date)) }} </span> তারিখের হিসাব</h2>
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
              @foreach($companyCostReport as $key => $row)
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
        </div>
        <ul class="list-group">
            <li class="list-group-item active">মোট খরচের পরিমাণ :- {{ $companyCostAmount }} টাকা</li>
        </ul>
      </div>
    </div>
  </div>
<!--- Data table End ---->

@endsection