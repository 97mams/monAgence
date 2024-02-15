@extends('admin.admin')

@section('title', 'Les options')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
</div>

@if(session('success'))
<div class="text-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th class="text-end">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($options as $option)
        <tr>
            <td>{{ $option->name }}</td>
            <td class="d-flex gap-2 justify-content-end aligne-items-center">
                <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-success">modifier</a>
                <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">suprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $options->links() }}
@endsection
