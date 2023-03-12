@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="text-white">
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" class="text-white">
@endif

@csrf
<div class="row">
    {{-- Titolo --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}"
                required>
            <div class="text-muted">Inserisci il titolo</div>
        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $project->slug }}">
        </div>
    </div>
    {{-- Autore --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="author">Autore</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $project->author }}">
            <div class="text-muted">Inserisci l'autore, cioè io, è il mio portfolio d'altronde.</div>
        </div>
    </div>
    {{-- Descrizione --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="description">Descrizione</label>
            <input type="text" name="description" id="description" class="form-control"
                value="{{ $project->description }}">
            <div class="text-muted">Inserisci la descrizione</div>


        </div>
    </div>
    {{-- Immagine --}}
    <div class="col-md-8">
        <div class="mb-3">
            <label for="image">Immagine</label>
            <input type="url" name="image" id="image" class="form-control" value="{{ $project->image }}">
            <div class="text-muted">Inserisci l'immagine</div>
        </div>
    </div>
    {{-- Contenuto --}}
    <div class="col-md-12">
        <div class="mb-3">
            <label for="content">Contenuto</label>
            <textarea name="content" id="content" class="form-control" rows="10">{{ $project->content }}</textarea>
            <div class="text-muted">Inserisci il contenuto</div>
        </div>
    </div>
    {{-- Link --}}
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="url_project">URL Progetto</label>
                <input type="url" name="url_project" id="url_project" class="form-control"
                    value="{{ $project->url_project }}">
                <div class="text-muted">Link diretto al progetto</div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="url_generic">URL Generico</label>
                <input type="url" name="url_generic" id="url_generic" class="form-control"
                    value="{{ $project->url_generic }}">
                <div class="text-muted">Link personale</div>
            </div>

        </div>
    </div>
</div>

{{-- Bottone --}}
<footer class="d-flex justify-content-between">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <button type="submit" class="btn btn-success">
        <i class="fa-solid fa-floppy-disk"></i>
    </button>
</footer>











</form>
