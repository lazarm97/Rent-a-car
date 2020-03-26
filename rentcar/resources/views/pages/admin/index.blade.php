@extends('layouts.admin')

@section('dashboard')
    <div class="col-lg-10 mb-5 mt-5">
        <div class="col-lg-8 ml-auto mr-auto mb-5 table-wrapper-scroll-y my-custom-scrollbar">
            @isset($errors)
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endisset
            @if(session()->has('message'))
                {{ session('message') }}
            @endif
            <input type="hidden" name="_token" value="<?php echo (csrf_token()); ?>"/>
            <select id="sortActivity" class="custom-select mb-5">
                <option value="0" selected>Sort by</option>
                <option value="1">Date asc</option>
                <option value="2">Date desc</option>
            </select>
            <table class="table col-lg-12">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">IP</th>
                </tr>
                </thead>
                <tbody id="tableActivity">
                @for($i=0; $i<count($activity)-1; $i++)
                    <tr>
                        <th scope="row">{{ $i+1 }}</th>
                        <td>{{ $activity[$i][3] }}</td>
                        <td>{{ $activity[$i][4] }}</td>
                        <td>{{ $activity[$i][5] }}</td>
                        <td>{{ $activity[$i][6] }}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
        <div class="col-lg-8 ml-auto mr-auto mb-5 table-wrapper-scroll-y my-custom-scrollbar">
            <select id="sortAutentification" class="custom-select mb-5">
                <option value="0" selected>Sort by</option>
                <option value="1">Date asc</option>
                <option value="2">Date desc</option>
            </select>
            <table class="table col-lg-12">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">IP</th>
                </tr>
                </thead>
                <tbody id="tableAutentification">
                @for($i=0; $i<count($autentification)-1; $i++)
                    <tr>
                        <th scope="row">{{ $i+1 }}</th>
                        <td>{{ $autentification[$i][3] }}</td>
                        <td>{{ $autentification[$i][4] }}</td>
                        <td>{{ $autentification[$i][5] }}</td>
                        <td>{{ $autentification[$i][6] }}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('dashboardScripts')
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection
