@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        <h1 class="text-center">{{ $bank_single_view->bank_name }}</h1>
    </div>
    <div class="card-body">
         <div class="row">
             <div class="col-md-6">
                <h3>Bank Description:- {{ $bank_single_view->description }}</h3>
             </div>
             <div class="col-md-6">
                <h3>Active Amount:({{ $total }})</h3>
             </div>
         </div>
    </div>
</div>

</div>

<div class="card-body">
         <div class="row">
                 <div class="card col-md-6">
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
                            @foreach($bank_withdraw_view as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->bank_name }}</td>
                                <td>{{ $row->amount }}</td>
                                <td>{{ $row->user_name }}</td>


                            </tr>

                            @endforeach
                        </tbody>
                        </table>
                        {{ $bank_withdraw_view->links() }}

                    </div>
                </div>
                 <div class="card col-md-6">
                    <!-- Card header -->
                    <div class="card-header">
                        <h2 class="mb-0">Drap History</h2>

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
                            @foreach($bank_drap_view as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->bank_name }}</td>
                                <td>{{ $row->bank_amount }}</td>
                                <td>{{ $row->user_name }}</td>


                            </tr>

                            @endforeach
                        </tbody>
                        </table>
                        {{ $bank_drap_view->links() }}

                    </div>
                </div>


         </div>
    </div>


@endsection
