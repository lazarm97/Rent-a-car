<div class="item-1">
    <a href="#"><img src="{{ asset("images/cars/".$car->image) }}" alt="Image" class="img-fluid"></a>
    <div class="item-1-contents">
        <div class="text-center">
            <h3><a href="#">{{ $car->brand." ".$car->model }}</a></h3>
            <div class="rating">
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
            </div>
            <div class="rent-price"><span>${{ $car->price }}/</span>day</div>
        </div>
        <ul class="specs">
            <li>
                <span>Doors</span>
                <span class="spec">{{ $car->doors }}</span>
            </li>
            <li>
                <span>Seats</span>
                <span class="spec">{{ $car->seats }}</span>
            </li>
            <li>
                <span>Transmission</span>
                <span class="spec">{{ $car->transmission }}</span>
            </li>
            @if(request()->url() == route('reservation', ['id' => $car->id_car]))
                <span>Description</span>
                <p class="spec">{{ $car->description }}</p>
            @endif
        </ul>
        @if(request()->url() != route('reservation', ['id' => $car->id_car]))
        <div class="d-flex action">
            <a href="{{ route('reservation', ['id' => $car->id_car]) }}" class="btn btn-primary">Rent Now</a>
        </div>
        @endif
    </div>
</div>
