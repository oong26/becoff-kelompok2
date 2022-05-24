<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BeCoff</title>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        @stack('css')
    </head>
    @if (auth()->user() != null)
    <body class="sb-nav-fixed">
    @else
    <body class="sb-nav-fixed sb-sidenav-toggled">
    @endif
        <!-- Topbar -->
        @include('layouts.partials.topbar')
        <!-- End of Topbar -->
        <div id="layoutSidenav">
          <!-- Sidebar -->
          @include('layouts.partials.sidebar')
          <!-- End of Sidebar -->
          <!-- Main Content -->
          <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i> {{session('status')}}
                                </div>
                            @endif
                
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-times-circle"></i> {{session('error')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    @yield('content')
                </div>
            </main>
            @include('layouts.partials.footer')
        </div>
        <!-- End of Main Content -->
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        @stack('js')
    </body>
</html>
