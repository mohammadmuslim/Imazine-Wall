@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
<<<<<<< HEAD
        কালেকশন
=======
      <h3 class="mb-0">ডিলার যুক্ত করুন এখান থেকে</h3>
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c
    </div>
    <!-- Card body -->
    <div class="card-body">
<<<<<<< HEAD
        <form action="{{ route('admin.collection.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">তারিখ</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="name">দোকানের নাম</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="amount">টাকা</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>
=======
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.collection.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c

            <div class="form-group">
                <label class="form-control-label" for="name">Shop Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

<<<<<<< HEAD


=======
            <div class="form-group">
                <label class="form-control-label" for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
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
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
<<<<<<< HEAD
          <h2 class="mb-0"> কালেকশন এর তালিকা</h2>
        </div>
        <div class="table-responsive py-4 ">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>টাকা গ্রহীতার নাম</th>
                <th>তারিখ</th>
                <th>দোকানের নাম</th>
                <th>টাকা</th>
                <th>পরিবর্তন করুন</th>
              </tr>
            </thead>
            <tbody>
                @foreach($collection_data as $row)
                <tr>
                    <td>{{ $row->user_name }}</td>
                    <td>{{ $row->date }}</td>
                    <td>{{ $row->shop_name }}</td>
                    <td>{{ $row->amount }}</td>
                    <td>
                        <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.collection.edit',$row->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                          <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="itemdelete({{ $row->id }})">
                              <i class="fa fa-trash"></i>
                          </button>
                          <form id="delete_form_{{ $row->id }}" method="POST" style="display: none" action="{{ route('admin.collection.delete', $row->id) }}">
                            @csrf
                            @method('DELETE')
                         </form>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
          </table>

          {{ $collection_data->links() }}
         
=======
          <h2 class="mb-0"> Collection History</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr>
                <th>Collector Name</th>
                <th>Date</th>
                <th>Shop Name</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($collection_data as $row)
              <tr>
                <td>{{ $row->user_name }}</td>
                <td>{{ $row->date }}</td>
                <td>{{ $row->shop_name }}</td>
                <td>{{ $row->amount }}</td>
                <td>
                    <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.collection.edit', $row->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="itemdelete({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form id="delete_form_{{ $row->id }}" method="POST" style="display: none" action="{{ route('admin.collection.delete', $row->id) }}">
                       @csrf
                       @method('DELETE')
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $collection_data->links() }}
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c
        </div>
      </div>
    </div>
  </div>
<!--- Data table End ---->
<<<<<<< HEAD


=======
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c
@endsection