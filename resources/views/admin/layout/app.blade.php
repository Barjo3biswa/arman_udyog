

<!DOCTYPE html>
<html lang="en">

@include('admin.layout.header')
@yield('css')
<body>

    <body>
        {{-- <div class="fixed-button">
            <a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank"
                class="btn btn-md btn-primary">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
            </a>
        </div> --}}
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="loader-bar"></div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                @include('admin.layout.top-bar')

                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
                        <nav class="pcoded-navbar">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>

                            @include('admin.layout.sidebar')
                        </nav>

                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('alert'))
                                <div class="alert alert-warning" role="alert">
                                    {{ Session::get('alert') }}
                                </div>
                            @endif
                            @yield('content')
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @include('admin.layout.footer')
            @yield('scripts')
    </body>

</html>
