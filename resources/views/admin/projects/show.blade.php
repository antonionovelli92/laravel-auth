@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <header>
        <h1 class="my-5 text-white">
            {{ $project->title }}
        </h1>
        <div class="projects">
            <div class="project">
                <a href="#project-1">
                    @if ($project->image)
                        <img src="{{ $project->image }}" alt="{{ $project->title }}">
                    @endif
                    <h2>{{ $project->title }}</h2>
                </a>
                <a href="{{ $project->url_project }}" class="btn btn-small btn-primary p-0 mb-2">Visualizza il progetto</a>
                <a href="{{ $project->url_generic }}" class="btn btn-small btn-secondary p-0">Visualizza il link generico</a>
                {{-- Bottoni --}}
                <div class="d-flex justify-content-start mt-5">
                    {{-- ? Btn-torna-indietro --}}
                    <a class="btn btn-success rounded-5" href="{{ route('admin.projects.index') }}">
                        <i class="fa-solid fa-arrow-left text-white"></i>
                    </a>
                    {{-- ? Btn-modifica --}}
                    <a class="btn btn-warning rounded-5 ms-2" href="{{ route('admin.projects.edit', $project->id) }}">
                        <i class="fa-solid fa-edit text-white"></i>
                    </a>
                    {{-- ? Btn-elimina --}}
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-form"
                        data-entity="progetto">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-5 ms-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <div class="project-show text-bg-dark rounded-5" id="project-1">
            <div class="project-details">
                <h2>{{ $project->title }}</h2>
                <p>{{ $project->description }}</p>
                <div class="project-content">
                    {!! $project->content !!}
                </div>
                <h6><strong>Autore:</strong> {{ $project->author }}</h6>
                <div class="d-flex justify-content-between">
                    <h6> <strong>Creato:</strong> {{ $project->created_at }}</h6>
                    <h6> <strong>Aggiornato:</strong> {{ $project->updated_at }}</h6>

                </div>

            </div>
        </div>

    </header>
@endsection
