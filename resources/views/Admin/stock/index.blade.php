<<<<<<< HEAD
=======
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
                <label class="form-control-label" for="shop_name">Prduct Name</label>
                <input type="text" class="form-control" id="product" name="product_name" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">Product Quantity</label>
                <input type="text" class="form-control" id="shop_adress" name="product_quantity" required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>
@endsection
>>>>>>> 8bcfd21f97e45e9abd3cecef9b405c84adf38344
