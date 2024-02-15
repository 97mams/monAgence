@extends('base')

@section('title', 'Mon agence')
@section('content')
<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence lorem ipsum</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro perferendis modi laborum harum in expedita quod architecto accusantium ad eveniet officia qui cupiditate voluptate itaque illum hic, quis dolores asperiores?</p>
    </div>
</div>
<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach($properties as $property)
        <div class="col">
            @include('property.card')
        </div>
        @endforeach
    </div>
</div>
@endsection