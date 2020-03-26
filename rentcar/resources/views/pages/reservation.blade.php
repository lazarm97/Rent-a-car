@extends('layouts/template')

@section('reservation')
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2>Contact Us Or Use This Form To Rent A Car</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5" >
                    @if(session()->has('message'))
                        {{ session('message') }}
                    @endif
                    @isset($errors)
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    @endisset
                    <form action="{{ route('doReservation') }}" method="post">
                        @csrf
                        <input type="hidden" name="idCar" value="{{ $car->id_car }}">
                        <input type="hidden" name="idCustomer" value="{{ Session::get('user')->id_customer }}">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="fName" value="{{ Session::get('user')->first_name }}" disabled placeholder="First name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lName" value="{{ Session::get('user')->last_name }}" disabled placeholder="Last name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="email" value="{{ Session::get('user')->email }}" disabled placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile" value="{{ Session::get('user')->mobile }}" disabled placeholder="Mobile">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="icn" value="{{ Session::get('user')->identity_card_number }}" disabled placeholder="Identity card number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select name="pLocation" class="form-control">
                                    <option>Pick up location</option>
                                    @foreach($locations as $pLoc)
                                        <option value="{{ $pLoc->id_location }}">{{ $pLoc->city .", ". $pLoc->street ." ". $pLoc->street_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" id="cf-3" placeholder="Pickup date" name="pDate" class="form-control datepicker px-3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select name="rLocation" class="form-control">
                                    <option>Return location</option>
                                    @foreach($locations as $pLoc)
                                        <option value="{{ $pLoc->id_location }}">{{ $pLoc->city .", ". $pLoc->street ." ". $pLoc->street_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" id="cf-4" placeholder="Return date" name="rDate" class="form-control datepicker px-3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="description" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <span>Price: $222</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 mb-7">
                    @component('partials.car', ["car" => $car])
                    @endcomponent
                </div>
            </div>
    </div>
@endsection
