@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="text-white" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" class="text-white" novalidate>
@endif
@csrf
<div class="row">
    {{-- Titolo --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title"
                class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}"
                required minlength="3" maxlength="80">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="text-muted">Inserisci il titolo</div>
            @enderror

        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug', $project->slug) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    {{-- Autore --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="author">Autore</label>
            <input type="text" name="author" id="author"
                class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $project->author) }}"
                required minlength="3" maxlength="80">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="text-muted">Inserisci l'autore, cioè io, è il mio portfolio d'altronde.</div>
            @enderror
        </div>
    </div>
    {{-- Descrizione --}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="description">Descrizione</label>
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror"
                value="{{ old('description', $project->description) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="text-muted">Inserisci la descrizione</div>
            @enderror


        </div>
    </div>
    {{-- Immagine --}}
    <div class="col-md-8">
        <div class="mb-3">
            <label for="image">Immagine</label>
            <input type="url" name="image" id="image"
                class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $project->image) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="text-muted">Inserisci l'immagine</div>
            @enderror
        </div>
    </div>
    {{-- Contenuto --}}
    <div class="col-md-12">
        <div class="mb-3">
            <label for="content">Contenuto</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10">{{ old('content', $project->content) }}</textarea>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="text-muted">Inserisci il contenuto</div>
            @enderror
        </div>
    </div>
    {{-- Link --}}
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="url_project">URL Progetto</label>
                <input type="url" name="url_project" id="url_project"
                    class="form-control @error('url_project') is-invalid @enderror"
                    value="{{ old('url_project', $project->url_project) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @else
                    <div class="text-muted">Link diretto al progetto</div>
                @enderror
            </div>

        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="url_generic">URL Generico</label>
                <input type="url" name="url_generic" id="url_generic"
                    class="form-control @error('url_generic') is-invalid @enderror"
                    value="{{ old('url_generic', $project->url_generic) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @else
                    <div class="text-muted">Link personale</div>
                @enderror
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
