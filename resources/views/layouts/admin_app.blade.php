<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('public/Frontend/assets/images/favicon.png') }}"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/vendor/select2/dist/css/select2.min.css') }}">
    <!-- Toastr CSS -->
    <link href="{{ asset('public/Backend/assets/toster-js/css/toastr.css') }}" rel="stylesheet">
    <!-- sweetalert2 CSS -->
    <link href="{{ asset('public/Backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('public/Backend/assets/css/argon.css?v=1.1.0') }}" type="text/css">
  @stack('css')
</head>

<body>
  <!--- Sidevar  start --->
   @include('Admin.partials.sidebar')
  <!--  End Sidevar -->
   <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Top Navigation Bar -->
    @include('Admin.partials.header_top')
    <!--- Content Head --->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        @yield('content_head')
      </div>
    </div>
    <!--- Content Body --->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              @yield('content_body')
            </div>
          </div>
        </div>
        @include('Admin.partials.footer')
      </div><!-- End Content -->
    </div><!--- End Main Content -->
  <!-- Core -->
  <script src="{{ asset('public/Backend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('public/Backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/Backend/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('public/Backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('public/Backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Select 2 -->
  <script src="{{ asset('public/Backend/assets/vendor/select2/dist/js/select2.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('public/Backend/assets/js/argon.js?v=1.1.0') }}"></script>
  <!--- Toastr js Start --->
  <script src="{{ asset('public/Backend/assets/toster-js/js/toastr.js') }}"></script>
  <!-- Sweet-Alert  -->
  <script src="{{ asset('public/Backend/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('public/Backend/assets/vendor/sweetalert2/sweet-alert.init.js') }}"></script>

  @stack('js')
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
    


    <!--- Sweet-Alert --->
    <script type="text/javascript">
        function itemdelete(id){
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'mr-2 btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Delete This!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete_form_'+id).submit();
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Data is Save :)',
                            'error'
                        )
                    }
                })
        }

    </script>
</body>
</html>