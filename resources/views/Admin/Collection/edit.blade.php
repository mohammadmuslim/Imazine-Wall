@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<<<<<<< HEAD


<div class="card">
    <div class="card-header">
        Edit Collection
    </div>
    <div class="card-body">
        <form action="{{ route('admin.collection.update', $collection_edit->id) }}" method="POST">
            @csrf
            @method('put')

=======
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">ডিলার যুক্ত করুন এখান থেকে</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.collection.update', $collection_edit->id) }}" method="POST">
            @csrf
            @method('put')
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c
            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $collection_edit->date }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="name">Shop Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $collection_edit->shop_name }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $collection_edit->amount }}">
            </div>

            <div class="form-group">
<<<<<<< HEAD
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>

=======
                <input type="submit" class="btn btn-primary" value="Update">
            </div>

          </form>
        </div>
        <div class="col-md-1"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->
>>>>>>> 661faed257d2af4e2ece3e336c7e815a0479a50c
@endsection