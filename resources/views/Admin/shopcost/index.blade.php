@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        Shop Cost
        <button><a href="{{ route('admin.shopcost.bank') }}">Drap to Bank</a></button>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.shopcost.added') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="cost_details">Description</label>
                <input type="text" class="form-control" id="cost_details" name="cost_details" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="cost_amount">Amount</label>
                <input type="text" class="form-control" id="cost_amount" name="cost_amount" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>




 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0"> খরচের তালিকা</h2>
        </div>
        <div class="table-responsive py-4 ">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>হিসাব সংরক্ষকের নাম</th>
                <th>তারিখ</th>
                <th>খরচের বিবরণ</th>
                <th>টাকার পরিমান</th>
                <th>পরিবর্তন করুন</th>
              </tr>
            </thead>
            <tbody>

                @foreach($shopcost_data as $row)
                <tr>
                    <td>{{ $row->user_name }}</td>
                    <td>{{ $row->date }}</td>
                    <td>{{ $row->cost_details}}</td>
                    <td>{{ $row->cost_amount }}</td>
                    <td>
                        <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.shopcost.edit',$row->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>

                    </td>
                </tr>
                @endforeach

            </tbody>
          </table>
          {{ $shopcost_data->links() }}

      </div>
    </div>
  </div>
<!--- Data table End ---->


@endsection
