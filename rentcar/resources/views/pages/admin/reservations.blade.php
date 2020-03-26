@extends('layouts.admin')

@section('reservations')
    <div class="container">
        @isset($errors)
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endisset
        @if(session()->has('message'))
            {{ session('message') }}
        @endif
        <div class="row mt-4">
            <div class="col-9">
                <select id="slcReservations" class="custom-select mb-5">
                    <option value="0" selected>Select reservation for more informations</option>
                    @foreach($reservations as $reservation)
                        <option value="{{ $reservation->id_reservation }}">{{ $reservation->brand." ".$reservation->model }}</option>
                    @endforeach
                </select>
                <div id="table-reservation">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('reservationsScripts')
    <script src="{{ asset('js/admin/reservations.js') }}"></script>
@endsection

