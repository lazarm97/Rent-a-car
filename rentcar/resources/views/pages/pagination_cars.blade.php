@foreach($cars as $car)
    <div class="col-lg-4 col-md-6 mb-4">
        @component('partials.car', ["car" => $car])
        @endcomponent
    </div>
@endforeach


<div class="col-12">
    {{ $cars->links() }}
</div>
