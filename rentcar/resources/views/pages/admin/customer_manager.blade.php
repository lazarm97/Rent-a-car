@extends('layouts.admin')

@section('customer_manager')
    <div class="col-lg-6 m-lg-auto pt-4">
        @isset($errors)
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endisset
        @if(session()->has('message'))
            {{ session('message') }}
        @endif
        <select id="slcCustomer" class="custom-select mb-5">
            <option value="0" selected>Select customer</option>
            <option value="-1" selected>Create customer</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id_customer }}">{{ $customer->first_name." ".$customer->last_name }}</option>
            @endforeach
        </select>
        <div id="customer_content">
            <input type="hidden" name="_token" value="<?php echo (csrf_token()); ?>"/>
            <div id="formCont">

            </div>
        </div>
    </div>

@endsection

@section('customersManagerScripts')
    <script src="{{ asset('js/admin/customer_manager.js') }}"></script>
@endsection
