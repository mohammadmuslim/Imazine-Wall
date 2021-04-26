@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
    <div class="card-header">
        নতুন দোকান যুক্ত করুন
    </div>
    <div class="card-body">
        <form action="{{ route('admin.addshop.added') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="shop_name">দোকানের নাম</label>
                <input type="text" class="form-control" id="shop_name" name="shop_name" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="shop_adress">দোকানের ঠিকানা</label>
                <input type="text" class="form-control" id="shop_adress" name="shop_adress" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="mobile_number">মোবাইল নাম্বার</label>
                <input type="number" class="form-control" id="mobile_number" name="mobile_number">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>
@endsection