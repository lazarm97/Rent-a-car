@extends('layouts/template')

@section('user')
    <section class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                @isset($errors)
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endisset
                @if(session()->has('message'))
                    {{ session('message') }}
                @endif
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-reservation-tab" data-toggle="pill" href="#v-pills-reservation" role="tab" aria-controls="v-pills-reservation" aria-selected="true">Reservations</a>
                                <a class="nav-link" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Account</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-reservation" role="tabpanel" aria-labelledby="v-pills-reservation-tab">
                                    @foreach($reservations as $reservation)
                                        <table class="table col-lg-6 m-lg-auto">
                                            <tbody>
                                            <tr>
                                                <th scope="row">First name</th>
                                                <td>{{ $reservation->first_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Last name</th>
                                                <td>{{ $reservation->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{ $reservation->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile</th>
                                                <td>{{ $reservation->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Identity card number</th>
                                                <td>{{ $reservation->icn }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pick up location</th>
                                                <td>{{ $reservation->pLocation }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pick up date</th>
                                                <td>{{ $reservation->p_date }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Return location</th>
                                                <td>{{ $reservation->rLocation }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Return date</th>
                                                <td>{{ $reservation->r_date }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Price</th>
                                                <td>{{ $reservation->price }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Description</th>
                                                <td>{{ $reservation->description }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <form action="" method="post">
                                        <input type="hidden" name="_token" value="<?php echo (csrf_token()); ?>"/>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="fName" value="{{ $user->first_name }}" name="fName" placeholder="First name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="lName" value="{{ $user->last_name }}" name="lName" placeholder="Last name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="icn" value="{{ $user->icn }}" name="icn" placeholder="icn">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="mobile" value="{{ $user->mobile }}" name="mobile" placeholder="mobile">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="email" value="{{ $user->email }}" name="email" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 mr-auto">
                                                <a href="#" data-id="{{ Session::get('user')->id_customer }}" name="updateUser" class="update btn btn-block btn-primary text-white py-3 px-5">Update</a>
                                            </div>
                                            <div class="col-md-6 mr-auto">
                                                <a href="{{ route('deleteUser', ['id' => Session::get('user')->id_customer]) }}"  name="deleteUser" class="btn btn-block btn-danger text-white py-3 px-5">Delete</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </section>

@endsection

@section('userScripts')
    <script src="{{ asset("js/user.js") }}"></script>
@endsection
