<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> রুসা ড্রিংকিং ওয়াটার </title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/Backend/assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/css/argon.css?v=1.1.0') }}" type="text/css">
    <!-- Toastr CSS -->
    <link href="{{ asset('public/Backend/assets/toster-js/css/toastr.css') }}" rel="stylesheet">
</head>
 
 <body class="bg-default">

   <!-- Main content -->
   <div class="main-content">
     <!-- Header -->
     <div class="header bg-gradient-primary py-6 py-lg-6 pt-lg-6">
       <div class="container">
         <div class="header-body text-center mb-7">
           <div class="row justify-content-center">
             <div class="col-xl-5 col-lg-6 col-md-8 px-5">
               <h1 class="text-white">রুসা ড্রিংকিং ওয়াটার লগইন করুন</h1>
             </div>
           </div>
         </div>
       </div>
       <div class="separator separator-bottom separator-skew zindex-100">
         <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
           <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
         </svg>
       </div>
     </div>
     <!-- Page content -->
     <div class="container mt--8 pb-5">
       <div class="row justify-content-center">
         <div class="col-lg-5 col-md-7">
           <div class="card bg-secondary border-0 mb-0">
 
             <div class="card-body px-lg-5 py-lg-5">
               <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                 <div class="form-group mb-3">
                   <div class="input-group input-group-merge input-group-alternative">
                     <div class="input-group-prepend">
                       <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                     </div>
                     <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                     <!-- Error Msg -->
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="input-group input-group-merge input-group-alternative">
                     <div class="input-group-prepend">
                       <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                     </div>
                     <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                     <!-- Error Msg -->
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                   </div>
                 </div>
                 <div class="text-center">
                   <button type="submit" class="btn btn-primary my-4">Login</button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="{{ asset('public/Backend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('public/Backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('public/Backend/assets/vendor/js-cookie/js.cookie.js') }}"></script>
   <script src="{{ asset('public/Backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
   <script src="{{ asset('public/Backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
   <!-- Argon JS -->
   <script src="{{ asset('public/Backend/assets/js/argon.js?v=1.1.0') }}"></script>
   <!--- Toastr js Start --->
   <script src="{{ asset('public/Backend/assets/toster-js/js/toastr.js') }}"></script>
    <!--- Toastr Message --->
    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <!--- Laravel validation Message By Toaster --->
    <script type="text/javascript">
        @if($errors->any())
            @foreach($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error', {
                closeButton:true,
                progressBar:true,
            });
            @endforeach
        @endif
    </script>
 </body>
 
 </html>