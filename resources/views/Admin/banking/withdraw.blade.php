@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="card">
    <div class="card-header">
        Withdraw to Bank
    </div>
    <div class="card-body">
        <form action="{{ route('admin.amount.withdraw') }}" method="POST">
            @csrf

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
                <label class="form-control-label" for="amount">Withdraw Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
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
         <h2 class="mb-0">Withdraw History</h2>
       </div>
       <div class="table-responsive py-4 ">
         <table class="table table-flush">
           <thead class="thead-light">
             <tr>
               <th>Date</th>
               <th>Bank Name</th>
               <th>Withdraw Amount</th>
               <th>Author Name</th>

             </tr>
           </thead>
           <tbody>
            @foreach($data as $row)
               <tr>
                   <td>{{ $row->date }}</td>
                   <td>{{ $row->bank_name }}</td>
                   <td>{{ $row->amount }}</td>
                   <td>{{ $row->user_name }}</td>


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
