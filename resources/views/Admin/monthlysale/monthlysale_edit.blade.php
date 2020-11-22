@extends('layouts.admin_app')
@section('title', 'admin | total-sale-edit')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">আজকের মোট বিক্রয় এডিট করুন</h6>
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
          <form action="{{ route('admin.monthly.sale.update', $thisMonthSaleEdit->id) }}" method="POST">
            @csrf
            @method('put')
            
            <div class="form-group">
                <label class="form-control-label" for="date">আজকের তারিখ</label>
                <input type="date" class="form-control" id="date" name="date" required value="{{ $thisMonthSaleEdit->date }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="today_sales">আজকের মোট বিক্রয়</label>
                <input type="number" class="form-control" id="today_sales" name="today_sales" required value="{{ $thisMonthSaleEdit->today_sales }}">
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

@endsection