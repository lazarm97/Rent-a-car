@extends('layouts/template')

@section('login')
    @isset($errors)
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endisset
    @if(session()->has('message'))
        {{ session('message') }}
    @endif
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2>Login</h2>
                    <p>asdasd</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5 m-lg-auto">
                    <form action="{{ route('doLogin') }}" method="post">
                        @csrf
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

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="isAdmin" id="isAdmin">
                            <label class="form-check-label" for="isAdmin">
                                I'm admin!
                            </label>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Login">
                            </div>
                            <div class="col-md-6 mr-auto">
                                <a href="{{ route('registration') }}" class="btn btn-block btn-primary text-white py-3 px-5">Registration</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('loginScripts')
    <script src="{{ asset("js/login.js") }}"></script>
@endsection
