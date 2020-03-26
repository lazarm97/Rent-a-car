

<div id="footer">
	<p>Copyright|<a href="https://github.com/lazarm97">Lazar Marojkin</a>|<a href="{{ url('Dokumentacija PHP2.docx') }}" target="_blank">Documentation</a></p>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="{{ asset("vendor/animsition/js/animsition.min.js") }}"></script>
	<script src="{{ asset("vendor/select2/select2.min.js") }}"></script>
	<script src="{{ asset("vendor/daterangepicker/moment.min.js") }}"></script>
	<script src="{{ asset("vendor/daterangepicker/daterangepicker.js") }}"></script>
	<script src="{{ asset("vendor/countdowntime/countdowntime.js") }}"></script>
	<script src="{{ asset("js/admin/main.js") }}"></script>
    @yield('reservationsScripts')
    @yield('customersManagerScripts')
    @yield('adminManagerScripts')
    @yield('carsManagerScripts')
    @yield('dashboardScripts')
</body>
</html>
