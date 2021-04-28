@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')

<div class="card">
    <div class="card-header">
        <h2>Invoice Approved List</h2>
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
              <th>Invoice No.</th>
              <th>Shop Name</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($invoices as $row)
            <tr>
                <td>{{ $row->invoice_no }}</td>
                <td>{{ $row->shop->shop_name }}</td>
                <td>{{ $row->date }}</td>
                <td>
                    <a  title="Approved" href="{{ route('admin.invoice.approved.view', $row->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a  title="Approved" target="__blank" href="{{ route('admin.invoice.sell.prient', $row->id) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-print"></i>
                    </a>
                  <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="itemdelete({{ $row->id }})">
                      <i class="fa fa-trash"></i>
                  </button>
                  <form id="delete_form_{{ $row->id }}" method="POST" style="display: none" action="{{ route('admin.invoice.sell.delete', $row->id) }}">
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