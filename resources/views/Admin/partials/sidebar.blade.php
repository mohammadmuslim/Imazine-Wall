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
            <a class="nav-link" href="">
              <i class="fas fa-user text-primary"></i>
              <span class="nav-link-text">ডিলার যুক্ত করুন</span>
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
                  <a href="" class="nav-link">কোম্পানির খরচ এড করুন</a>
                  <a href="" class="nav-link">কোম্পানির এই মাসের খরচ</a>
                </li>
              </ul>
            </div>
          </li>

        </ul>

      </div>
    </div>
  </div>
</nav>