@extends('layouts/template')

@section('cars')
<div class="site-section bg-light">
    <div class="container">
        @csrf
        @isset($errors)
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endisset
        @if(session()->has('message'))
            {{ session('message') }}
        @endif
        <div class="row" id="cars">
            @include('pages\pagination_cars')
        </div>
    </div>
</div>
@endsection

@section('carsScripts')
    <script src="{{ asset("js/pagination.js") }}"></script>
@endsection
