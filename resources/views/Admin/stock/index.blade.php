@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
    <div class="card-header">
        নতুন দোকান যুক্ত করুন
    </div>
    <div class="card-body">
        <form action="{{ route('admin.stock.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Stock Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="customer_id">Product code</label>
                <select required data-toggle="select" class="form-control"  id="product_id" name="product_id">
                <option></option>   
                @foreach($products as $row)
                <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Product Quantity</label>
                <input type="number" class="form-control" id="shop_adress" name="product_quantity" required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>
@endsection

