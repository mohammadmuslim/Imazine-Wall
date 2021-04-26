@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')

<div class="card">
    <div class="card-header">
        <h2>Invoice Lists</h2>
    </div>

<!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0">তালিকা</h2>
        </div>
        <div class="table-responsive py-4 ">
          <table class="table table-flush">
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
                      <a  title="Approved" href="{{ route('admin.sell.approved', $row->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i>
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
          {{ $invoices->links()}}   
        </div>
    </div>
  </div>
<!--- Data table End ---->
</div>
@endsection