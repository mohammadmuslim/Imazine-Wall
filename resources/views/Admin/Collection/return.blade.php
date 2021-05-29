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
<!-- Table -->
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Action buttons</h3>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Collection Id</th>
                <th>Author Name</th>
                <th>Date</th>
                <th>Shop Name</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($return_amount as $row)
                  <tr>
                      <td>#{{ $row->collection_id }}</td>
                      <td>{{ $row->user_name }}</td>
                      <td>{{ $row->date }}</td>
                      <td>{{ $row->addshop->shop_name }}</td>
                      <td>{{ $row->amount }}</td>
                      <td>{{ $row->discount }}</td>
                      <td>
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="itemdelete({{ $row->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                            <form id="delete_form_{{ $row->id }}" method="POST" style="display: none" action="{{ route('admin.collection.delete', $row->id) }}">
                              @csrf
                              @method('DELETE')
                           </form>
                      </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
