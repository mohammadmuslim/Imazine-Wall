@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        Drap to Bank
        <button><a href="{{ route('admin.shopcost.index') }}">Back</a></button>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.shopcost.bank.add') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="bank_name">Select Bank Name</label>
                <select required data-toggle="select" class="form-control"  id="bank_name" name="bank_name">
                  <option></option>

                    @foreach($bank_list as $row)
                    <option value="{{ $row->bank_name }}">{{ $row->bank_name }}</option>
                    @endforeach

                </select>
              </div>

            <div class="form-group">
                <label class="form-control-label" for="cost_amount">Amount</label>
                <input type="text" class="form-control" id="cost_amount" name="cost_amount" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
    </div>
</div>






@endsection
