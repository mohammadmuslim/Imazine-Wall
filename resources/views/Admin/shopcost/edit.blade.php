@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        দোকানের খরচ
    </div>
    <div class="card-body">
        <form action="{{  route('admin.shopcost.update', $shopcost_data->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-control-label" for="date">তারিখ</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $shopcost_data->date }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="cost_details">খরচের বিবরণ</label>
                <input type="text" class="form-control" id="cost_details" name="cost_details" value="{{ $shopcost_data->cost_details }}">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="cost_amount">টাকার পরিমান</label>
                <input type="text" class="form-control" id="cost_amount" name="cost_amount" value="{{ $shopcost_data->cost_amount }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>

@endsection