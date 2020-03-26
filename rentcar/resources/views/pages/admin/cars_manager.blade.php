@extends('layouts.admin')

@section('cars_manager')
    <div class="col-lg-6 m-lg-auto pt-4 pb-5">
        @isset($errors)
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endisset
        @if(session()->has('message'))
            Sesija poslata sa WITH:....
            {{ session('message') }}
        @endif
        <select id="slcCar" class="custom-select mb-5">
            <option value="0" selected>Select car</option>
            <option value="-1">Create car</option>
            @foreach($cars as $car)
                <option value="{{ $car->id_car }}">{{ $car->brand." ".$car->model}}</option>
            @endforeach
        </select>
        <div id="car_content">
            <form action="{{ url('/admin/cars_manager') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo (csrf_token()); ?>"/>
                <div id="formCont">

                </div>
            </form>
        </div>
    </div>
@endsection

@section('carsManagerScripts')
    <script src="{{ asset('js/admin/car_manager.js') }}"></script>
@endsection
