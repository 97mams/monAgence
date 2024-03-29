<div class="card">
    <div class="card-body">
        <img src="{{ url('property.jpeg') }}" alt="property" class="card-img">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">
            {{ $property->surface }} m2 - {{ $property->city }} ({{ $property->postal_code }})
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4em;">
            {{ number_format($property->price, thousands_separator: ' ') }} Ariary
        </div>
    </div>
</div>