@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')

<div class="card">
    <div class="card-header">
        <h2>Shop Lists</h2>
    </div>

<!-- Table -->
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">All Shop Lists</h3>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Shop No</th>
                <th>Shop Name</th>
                <th>Shop Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach($shops as $row)
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->shop_name }}</td>
                <td>{{ $row->mobile_number }}</td>
                <td>
                    <a title="View" class="btn btn-primary btn-sm" href="{{ route('admin.shop.view', $row->id) }}">
                        <i class="fas fa-eye"></i>
                    </a>
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
</div>
@endsection