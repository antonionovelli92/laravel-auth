@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header>
        <h1 class="my-5">Projects:</h1>
    </header>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Slag</th>
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
                    <td>{{ $project->slag }}</td>
                    <td>{{ $project->url_project }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-small btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr scope='row' colspan='9' class="text-center">Non ci sono progetti</tr>
            @endforelse

        </tbody>
    </table>

@endsection
