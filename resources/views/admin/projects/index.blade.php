@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1 class="my-5 text-white">Projects:</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
    </header>


    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Slug</th>
                <th scope="col">Link</th>
                <th scope="col">Creato il</th>
                <th scope="col">Aggiornato il</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->author }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->url_project }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    {{-- Bottoni --}}
                    <td>
                        <div class="d-flex justify-content-end align-items-center">
                            {{-- ? Btn-dettaglio --}}
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-small btn-primary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            {{-- ? Btn-modifica --}}
                            <a class="btn btn-warning ms-2" href="{{ route('admin.projects.edit', $project->id) }}">
                                <i class="fa-solid fa-edit text-white"></i>
                            </a>
                            {{-- ? Btn-elmina --}}
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" class="delete-form"
                                method="POST" data-entity="progetto">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger  ms-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr scope='row' colspan='9' class="text-center">Non ci sono progetti</tr>
            @endforelse

        </tbody>
    </table>

@endsection
@section('scripts')



@endsection
