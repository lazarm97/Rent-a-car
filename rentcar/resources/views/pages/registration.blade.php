@extends('layouts/template')

@section('registration')
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2>Registration</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 m-lg-auto">
                    @if(session()->has('message'))
                        {{ session('message') }}
                    @endif
                        @isset($errors)
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        @endisset
                    <form action="{{ route('doRegistration') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="fName" placeholder="First name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lName" placeholder="Last name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="icn" placeholder="Identity card number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Registration">
                            </div>
                            <div class="col-md-6 mr-auto">
                                <a href="{{ route('login') }}" class="btn btn-block btn-primary text-white py-3 px-5">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
