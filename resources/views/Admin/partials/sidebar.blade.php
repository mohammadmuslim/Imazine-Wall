@php 
$route  = Route::current()->getName();
@endphp
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        <img src="{{asset('public/Backend')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            @if(Request::is('admin*'))
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">ওভারভিউ</span>
            </a>
            @endif
          </li> 
        <!----------------- Admin Sidevar Here --------------------
         --------------------------------------------------------->           

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.customer.index') }}">
              <i class="fas fa-user text-primary"></i>
              <span class="nav-link-text">ডিলার যুক্ত করুন</span>
            </a>
          </li>

        @php
          $customers = App\Models\customer::orderBy('id', 'ASC')->get();
        @endphp

          <li class="nav-item">
            <a class="nav-link" href="#dealer_list" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
              <i class="fas fa-list text-primary"></i>
              <span class="nav-link-text">সমস্ত ডিলার তালিকা</span>
            </a>
            <div class="collapse collapse-show" id="dealer_list">
              <ul class="nav nav-sm flex-column">
                @foreach($customers as $key => $row)
                <li class="nav-item">
                  <a href="{{ route('admin.customer.report', $row->id) }}" class="nav-link">{{ $key+1 }} . {{ $row->customer_name }}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.invoice.index') }}">
              <i class="fas fa-shopping-cart text-primary"></i>
              <span class="nav-link-text">পানি বিক্রয় করুন</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#company_cost" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
              <i class="fas fa-industry text-primary"></i>
              <span class="nav-link-text">কোম্পানির খরচের তালিকা</span>
            </a>
            <div class="collapse collapse-show" id="company_cost">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.company.cost.index') }}" class="nav-link">কোম্পানির খরচ এড করুন</a>
                  <a href="{{ route('admin.company.report') }}" class="nav-link">কোম্পানির এই মাসের খরচ</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#cash_in" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
              <i class="fas fa-wallet text-primary"></i>
              <span class="nav-link-text">প্রতিদিনের ক্যাশ ইন তালিকা</span>
            </a>
            <div class="collapse collapse-show" id="cash_in">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('admin.cashin.index') }}" class="nav-link">ক্যাশ ইন যুক্ত করুন</a>
                  <a href="{{ route('admin.monthly.sale.index') }}" class="nav-link">মোট বিক্রয় যুক্ত করুন </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.search.report') }}">
              <i class="fas fa-dumpster text-primary"></i>
              <span class="nav-link-text">সব ধরনের হিসাব দেখুন</span>
            </a>
          </li>

        </ul>

      </div>
    </div>
  </div>
</nav>