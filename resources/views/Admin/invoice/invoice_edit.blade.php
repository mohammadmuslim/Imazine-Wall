@extends('layouts.admin_app')
@section('title', 'admin | invoice-edit')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">বিক্রয় এডিট করুন</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">বিক্রয় এডিট করুন এখান থেকে</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.invoice.update', $invoiceEdit->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label" for="date">আজকের তারিখ</label>
                        <input type="date" class="form-control" id="date" name="date" required value="{{ $invoiceEdit->date }}"> 
                    </div>
                </div><!-- End Colum -->

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label" for="water_quantity">বোতলের সংখ্যা</label>
                        <input type="number" class="form-control" id="water_quantity" name="water_quantity" required value="{{ $invoiceEdit->water_quantity }}">
                    </div>
                </div><!-- End Colum -->
            </div><!-- End Form rwo -->

            <div class="form-row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label" for="water_price">বোতলের দাম</label>
                        <input type="number" class="form-control" id="water_price" name="water_price" required value="{{ $invoiceEdit->water_price }}">
                    </div>
                </div><!-- End Colum -->

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label" for="paid_amount">নগদ টাকা</label>
                        <input type="number" class="form-control" id="paid_amount" name="paid_amount" required value="{{ $invoiceEdit->paid_amount }}">
                    </div>
                </div><!-- End Colum -->
            </div><!-- End Form rwo -->

            <div class="form-row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label" for="due_amount">বাকি টাকা</label>
                        <input type="number" class="form-control" id="due_amount" name="due_amount" required value="{{ $invoiceEdit->due_amount }}">
                    </div>
                </div><!-- End Colum -->

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="form-control-label" for="old_due">আগের সপ্তাহের বাকি</label>
                        <input type="number" class="form-control" id="old_due" name="old_due" value="{{ $invoiceEdit->old_due }}">
                    </div>
                </div><!-- End Colum -->
            </div><!-- End Form rwo -->

            <div class="form-row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="customer_id">ডিলার এর নাম সিলেক্ট করুন</label>
                        <select required data-toggle="select" class="form-control"  id="customer_id" name="customer_id">
                            <option></option>
                            @foreach($customers as $row)
                            <option {{ ($invoiceEdit->customer_id == $row->id)? 'selected' : '' }} value="{{ $row->id }}">{{ $row->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="আপডেট করুন">
            </div>

          </form>
        </div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->
@endsection