@extends('layouts.admin_app')
@section('title', 'admin | search-report')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">নির্দিষ্ট তারিখ অনুযায়ী হিসাব দেখুন</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0 text-center">নির্দিষ্ট তারিখ অনুযায়ী ডিলারের হিসাব দেখুন</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.search.report.resuit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="customer_id">ডিলার এর নাম সিলেক্ট করুন</label>
                <select required data-toggle="select" class="form-control"  id="customer_id" name="customer_id">
                    <option></option>
                    @foreach($customers as $row)
                    <option value="{{ $row->id }}">{{ $row->customer_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="start_date">শুরুর তারিখ</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="end_date">শেষের তারিখ</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="হিসাব খুঁজুন">
            </div>

          </form>
        </div>
        <div class="col-md-2"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0 text-center">নির্দিষ্ট তারিখ অনুযায়ী কোম্পানির খরচের হিসাব দেখুন</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.company.search.report') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="start_date">শুরুর তারিখ</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="end_date">শেষের তারিখ</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="হিসাব খুঁজুন">
            </div>

          </form>
        </div>
        <div class="col-md-2"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection