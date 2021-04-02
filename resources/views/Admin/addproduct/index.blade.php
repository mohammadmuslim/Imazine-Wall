@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        add product
    </div>
    <div class="card-body">
        <form action="{{ route('admin.product.add') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="date">DATE</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
            </div>

          </form>
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
                <th>Page_No</th>
                <th>Product Code</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach($product_list as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->product_name }}</td>
                    
                   
                </tr>
                @endforeach
               
            </tbody>
          </table>

         
      </div>
    </div>
  </div>
<!--- Data table End ---->




</div>

@endsection