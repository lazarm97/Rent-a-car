@include('fixed.admin.head')
@include('fixed.admin.top_navigation')
@include('fixed.admin.sidebar_navigation')

@yield('admin_manager')
@yield('customer_manager')
@yield('reservations')
@yield('cars_manager')
@yield('dashboard')

@include('fixed.admin.footer')
