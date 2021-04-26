@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        <h1 class="text-center">Shop Cash</h1>
        <h1 class="text-center">Amount</h1>
        <h1 class="text-center">{{ $total }}</h1>
    </div>
    <div class="card-body">
         <div class="row">
             <div class="col-md-6">
                {{-- <h3>Bank Description:- {{ $bank_single_view->description }}</h3> --}}
             </div>
             <div class="col-md-6">
                {{-- <h3>Active Amount:({{ $total }})</h3> --}}
             </div>
         </div>
    </div>
</div>

</div>

<div class="card-body">
         <div class="row">
                 <div class="card col-md-12">
                    <!-- Card header -->
                    <div class="card-header">
                        <h2 class="mb-0">Drap History</h2>
                        <h2 class="mb-0">Total Drap:</h2>
                    </div>
                    <div class="table-responsive py-4 ">
                        <table class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th>Date</th>
                            <th>Shop Name</th>
                            <th>Amount</th>
                            <th>Author Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collection as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->shop_id }}</td>
                                <td>{{ $row->amount }}</td>
                                <td>{{ $row->user_name }}</td>


                            </tr>

                            @endforeach
                        </tbody>
                        </table>
                        {{ $collection->links() }}

                    </div>
                </div>
                <div class="card col-md-12">
                    <!-- Card header -->
                    <div class="card-header">
                        <h2 class="mb-0">Shop Cost History</h2>
                        <h2 class="mb-0">Total Cost:</h2>
                    </div>
                    <div class="table-responsive py-4 ">
                        <table class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                            <th>Date</th>
                            <th>Cost Details</th>
                            <th>Amount</th>
                            <th>Author Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shopcost_data as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->cost_details }}</td>
                                <td>{{ $row->cost_amount }}</td>
                                <td>{{ $row->user_name }}</td>


                            </tr>

                            @endforeach
                        </tbody>
                        </table>
                        {{ $shopcost_data->links() }}

                    </div>
                </div>


         </div>
    </div>


@endsection
