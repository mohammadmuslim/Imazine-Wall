@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Return Add From Here</h3>
      <br>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <form action="{{ route('admin.return.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <input type="hidden" name="collection_no" value="{{ $collection_no }}">

            <div class="form-group">
              <label class="form-control-label" for="customer_id">Shop Name</label>
              <select required data-toggle="select" class="form-control"  id="customer_id" name="shop_id" required>
                <option></option>
                
                @foreach($shop_data as $row)
                <option value="{{ $row->id }}">{{ $row->shop_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="amount">Return Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Return">
            </div>

          </form>
    </div>
</div>
@endsection