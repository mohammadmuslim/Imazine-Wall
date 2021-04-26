@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
    <div class="card-header">
        ADD BANK ACCOUNT
    </div>
    <div class="card-body">
        <form action="{{ route('admin.bank.added') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-control-label" for="bank_name">Bank Name</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name" required>
              </div>
            <div class="form-group">
                <label class="form-control-label" for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
             </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="যুক্ত করুন">
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
         <h2 class="mb-0">Active Bank</h2>
       </div>
       <div class="table-responsive py-4 ">
         <table class="table table-flush">
           <thead class="thead-light">
             <tr>

               <th>Bank Name</th>
               <th>Bank Creator Name</th>

             </tr>
           </thead>
           <tbody>
            @foreach($data as $row)
               <tr>
                   <td>{{ $row->bank_name }}</td>
                   <td>{{ $row->description }}</td>
               </tr>

               @endforeach
           </tbody>
         </table>

         {{ $data->links() }}
     </div>
   </div>
 </div>
<!--- Data table End ---->




</div>
@endsection
