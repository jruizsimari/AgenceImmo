@extends('admin.base')

@section('title', 'Liste des options')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom de l'option</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($options as $option)
            <tr>
                <td>{{ $option->name }}</td>
                <td class="text-end">
                    <a class="btn btn-primary" href="{{ route('admin.option.edit', $option) }}"><i class="bi bi-pencil-square"></i></a>
                    <form class="d-inline" action="{{ route('admin.option.destroy', $option) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $options->links() }}
@endsection
