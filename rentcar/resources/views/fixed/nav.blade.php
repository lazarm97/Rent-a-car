<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center position-relative">

                <div class="col-3 ">
                    <div class="site-logo">
                        <a href="{{ route('home') }}">CarRent</a>
                    </div>
                </div>

                <div class="col-9  text-right">


                    <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto ">
                            @foreach($navigation as $nav)
                                @component('partials.nav', ["nav" => $nav])
                                @endcomponent
                            @endforeach

                            @if(!session()->has('user'))
                                 <li>
                                     <a href="{{ route('login') }}" class="nav-link">Login</a>
                                 </li>
                            @else
                                 <li>
                                     <a href="@if(session('user')->role_id==2){{ route('user') }}@else{{ route('admin.dashboard') }}@endif" class="nav-link">{{ session('user')->first_name . " " .  session('user')->last_name }}</a>
                                 </li>

                                 <li>
                                     <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                                 </li>
                            @endif
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

    </header>
