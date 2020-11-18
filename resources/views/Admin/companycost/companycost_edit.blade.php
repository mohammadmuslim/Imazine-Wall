@extends('layouts.admin_app')
@section('title', 'admin | company-cost')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">কোম্পানির খরচ আপডেট করুন</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">কোম্পানির খরচ আপডেট করুন এখান থেকে</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.company.cost.update', $companyCostEdit->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-control-label" for="date">খরচের তারিখ</label>
                <input type="date" class="form-control" id="date" name="date" required value="{{ $companyCostEdit->date }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="costs">মোট খরচ</label>
                <input type="number" class="form-control" id="costs" name="costs" required value="{{ $companyCostEdit->costs }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="আপডেট করুন">
            </div>

          </form>
        </div>
        <div class="col-md-1"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection