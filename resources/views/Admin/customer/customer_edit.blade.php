@extends('layouts.admin_app')
@section('title', 'admin | customers')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">ডিলার এডিট করুন</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">ডিলার এডিট করুন করুন এখান থেকে</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <form action="{{ route('admin.customer.update', $customerEdit->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label class="form-control-label" for="customer_name">ডিলারের নাম</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $customerEdit->customer_name }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="customer_mobile">ডিলার মোবাইল নাম্বার</label>
                <input type="number" class="form-control" id="customer_mobile" name="customer_mobile" value="{{ $customerEdit->customer_mobile }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="customer_address">ডিলার ঠিকানা</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address" value="{{ $customerEdit->customer_address }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="এডিট করুন">
            </div>

          </form>
        </div>
        <div class="col-md-1"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection