@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Ajouter un bien')

@section('content')
<h1>@yield('title')</h1>
<form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">
    @csrf
    @method($property->exists ? 'put' : 'post')
    <div class="row">
        @include('shared.input', ['name' => 'title', 'label' => 'Titre', 'class' => 'col', 'value' => $property->title])
    </div>
    <div class="col row">
        @include('shared.input', ['name' => 'surface', 'class' => 'col', 'value' => $property->surface])
        @include('shared.input', ['name' => 'price', 'class' => 'col','label' => 'Prix', 'value' => $property->price])
    </div>
    @include('shared.input', ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $property->description])
    <div class="row">
        @include('shared.input', ['name' => 'rooms', 'class' => 'col','label' => 'Pièce', 'value' => $property->rooms])
        @include('shared.input', ['name' => 'bedrooms', 'class' => 'col','label' => 'Chambre', 'value' => $property->bedrooms])
        @include('shared.input', ['name' => 'floor', 'class' => 'col','label' => 'Etage', 'value' => $property->floor])
    </div>
    <div class="row">
        @include('shared.input', ['name' => 'city', 'class' => 'col','label' => 'Ville', 'value' => $property->city])
        @include('shared.input', ['name' => 'address', 'class' => 'col','label' => 'Adresse', 'value' => $property->address])
        @include('shared.input', ['name' => 'postal_code', 'class' => 'col','label' => 'Code Postale', 'value' => $property->postal_code])
    </div>
    @include('shared.select', ['name' => 'options','label' => 'Options', 'value' => $property->options()->pluck('id'), 'options' => $options ,'multiple' => true])
    @include('shared.checkbox', ['name' => 'sold', "type" => 'checkbox','label' => 'Vendu', 'value' => $property->sold])
    <div>
        <button class="btn btn-primary">
            @if($property->exists)
            Modifier
            @else
            Créer
            @endif
        </button>
    </div>
</form>
@endsection