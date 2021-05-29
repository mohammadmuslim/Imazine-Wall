@php
    $allstoplist = App\Models\addshop::get();
    $banklist = App\Models\AddBank::get();
@endphp
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                {{--  <img src="{{asset('public/Backend')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">  --}}
                <h1 style="color: red;">Imazine <span style="color: blue;">Wall</span></h1>
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner" style="width: 45px;height: 5px;">
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
                    <li class="nav-item menuhover" >
                        @if(Request::is('admin*'))
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Overview</span>
                        </a>
                        @endif
                    </li>
                    <!----------------- Admin Sidevar Here -------------------------->
                    <li class="nav-item">
                        <a class="nav-link menuhover" href="#sell" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
                            <i class="fab fa-sellcast text-primary"></i>
                            <span class="nav-link-text">sell</span>
                        </a>
                        <div class="collapse collapse-show" id="sell">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.sell.index') }}" class="nav-link">Add Sell</a>
                                </li>
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.sell.pendinglist') }}" class="nav-link">Sell Pending List</a>
                                </li>
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.invoice.approve.list') }}" class="nav-link">Sell Approved List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menuhover">
                        <a class="nav-link" href="{{ route('admin.shop.lists') }}">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="nav-link-text">SHOP</span>
                        </a>
                    </li>
                    <li class="nav-item menuhover">
                        <a class="nav-link" href="{{ route('admin.shopcost.index') }}">
                            <i class="fas fa-address-card text-primary"></i>
                            <span class="nav-link-text">Shop Cost</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menuhover" href="#collection" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
                            <i class="fab fa-sellcast text-primary"></i>
                            <span class="nav-link-text">Collection/Return</span>
                        </a>
                        <div class="collapse collapse-show" id="collection">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.collection.index') }}" class="nav-link">collection</a>
                                </li>
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.return.index') }}" class="nav-link">Return</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item menuhover">
                        <a class="nav-link" href="{{ route('admin.addshop.index') }}">
                            <i class="fas fa-cart-plus text-primary"></i>
                            <span class="nav-link-text">ADD SHOP</span>
                        </a>
                    </li>

                    <li class="nav-item menuhover">
                        <a class="nav-link" href="{{ route('admin.stock.index') }}">
                            <i class="fas fa-coins text-primary"></i>
                            <span class="nav-link-text">STOCK</span>
                        </a>
                    </li>

                    <li class="nav-item menuhover">
                        <a class="nav-link menuhover" href="{{ route('admin.product.index') }}">
                            <i class="fas fa-plus text-primary"></i>
                            <span class="nav-link-text">ADD PRODUCT</span>
                        </a>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link menuhover" href="#bank" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">

                            <i class="fas fa-university text-primary"></i>
                            <span class="nav-link-text">BANK</span>
                        </a>
                        <div class="collapse collapse-show" id="bank">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.bank.withdraw') }}" class="nav-link">Withdraw to Bank</a>
                                </li>
                                <li class="nav-item menuhover">
                                    <a href="{{ route('admin.bank.add') }}" class="nav-link">Add Bank</a>
                                </li>
                            <li class="nav-item ">
                                    <a class="nav-link menuhover" href="#Bank_list" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
                                        <i class="fas fa-industry text-primary"></i>
                                        <span class="nav-link-text">All Bank List</span>
                                    </a>
                                    <div class="collapse collapse-show" id="Bank_list">
                                        <ul class="nav nav-sm flex-column">
                                            @foreach($banklist as $key => $row)
                                            <li class="nav-item menuhover">
                                                <a href="{{ route('admin.bank.view', $row->id) }}" class="nav-link">{{ $key+1 }}. {{ $row->bank_name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuhover" href="{{ route('admin.shop.cash') }}">
                            <i class="fas fa-money-bill-alt text-primary"></i>
                            <span class="nav-link-text">CASH</span>
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
