@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        <h1 class="text-center">Shop Name:- {{ $shop_single_view->shop_name }}</h1>
    </div>
    <div class="card-body">
         <div class="row">
             <div class="col-md-6">
                <h3>Shop Address:- {{ $shop_single_view->shop_adress }}</h3>
             </div>
             <div class="col-md-6">
               <h3>Mobile Numbers:- {{ $shop_single_view->mobile_number }}</h3>
            </div>
         </div>
    </div>
</div>


@endsection