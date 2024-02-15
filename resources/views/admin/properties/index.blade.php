@extends('admin.admin')

@section('title', 'Tous les biens')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
</div>

@if(session('success'))
<div class="test-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->title }}</td>
            <td>{{ $property->surface }} m2</td>
            <td>{{ number_format($property->price ,thousands_separator: ' ') }}€</td>
            <td>{{ $property->city }}</td>
            <td class="d-flex gap-2 justify-content-end aligne-items-center">
                <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-success">modifier</a>
                <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">suprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $properties->links() }}
@endsection