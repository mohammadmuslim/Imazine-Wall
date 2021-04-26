@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Imagine Walls</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Users stats -->
    <div class="row">
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Today Sell</h5>
                <span class="h2 font-weight-bold mb-0">2424 টাকা</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="fas fa-shopping-cart"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Today Shop Cost</h5>
                <span class="h2 font-weight-bold mb-0">{{ $today_shopcost }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Today Collection</h5>
                <span class="h2 font-weight-bold mb-0">{{ $today_collection }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Row -->

    <!-- Users stats -->
    <div class="row">
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total Bank Amount</h5>
                <span class="h2 font-weight-bold mb-0">{{ $total_balance }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Cash</h5>
                <span class="h2 font-weight-bold mb-0">{{ $total_cash }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Row -->

    <!-- Users stats -->
    <div class="row">
      <div class="col-xl-4 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Product Unit</h5>
                <span class="h2 font-weight-bold mb-0">{{ $stock }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Row -->
    <br><br><hr>
@endsection
