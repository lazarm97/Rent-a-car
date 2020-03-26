@include('fixed/head')
@include('fixed/nav')
@if(request()->url() == route('home'))
@include('fixed/head_cover_home')
@else
@include('fixed/head_cover')
@endif

@yield('services')
@yield('contact')
@yield('about')
@yield('cars')
@yield('home')
@yield('reservation')
@yield('login')
@yield('registration')
@yield('user')

@include('fixed/how_it_works')
@include('fixed/footer')
