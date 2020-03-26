@extends('layouts/template')

@section('home')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h3>Our Offer</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                    <p>
                        <a href="#" class="btn btn-primary custom-prev">Previous</a>
                        <span class="mx-2">/</span>
                        <a href="#" class="btn btn-primary custom-next">Next</a>
                    </p>
                </div>
                <div class="col-lg-9">
                    <div class="nonloop-block-13 owl-carousel">
                        @foreach($cars as $car)
                            @component('partials.car', ["car" => $car])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section section-3" style="background-image: url('images/hero_2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="text-white">Our services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
                        <div class="service-1-contents">
                            <h3>Repair</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
                        <div class="service-1-contents">
                            <h3>Car Accessories</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
                        <div class="service-1-contents">
                            <h3>Own a Car</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
