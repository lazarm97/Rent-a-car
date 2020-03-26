<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="feature-car-rent-box-1">
                        <h3>{{ $homeCar->brand." ".$homeCar->model }}</h3>
                        <ul class="list-unstyled">
                            <li>
                                <span>Doors</span>
                                <span class="spec">{{ $homeCar->doors }}</span>
                            </li>
                            <li>
                                <span>Seats</span>
                                <span class="spec">{{ $homeCar->seats }}</span>
                            </li>
                            <li>
                                <span>Fuel</span>
                                <span class="spec">{{ $homeCar->fuel }}</span>
                            </li>
                            <li>
                                <span>Transmission</span>
                                <span class="spec">{{ $homeCar->transmission }}</span>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center bg-light p-3">
                            <span>${{ $homeCar->price }}/day</span>
                            <a href="{{ route('reservation', ['id' => $homeCar->id_car]) }}" class="ml-auto btn btn-primary">Rent Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
