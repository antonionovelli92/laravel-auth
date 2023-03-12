<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // passo un project vuoto per 'ingannare' il form
        $project = new Project;
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione
        // todo possibile problema validazione con il titolo
        $request->validate([
            'title' => 'required|string|unique:projects|min:3|max:80',
            'author' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            // 'slug' => 'required|string|unique:projects|min:3|max:80',
            // con la voce 'mimes' nel campo image possiamo specificare anche il formato dell'immagine
            'image' => 'nullable|image',
            'url_project' => 'nullable|url',
            'url_generic' => 'nullable|url',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => "Esiste già un progetto chiamato $request->title",
            'title.min' => 'il titolo deve avere almeno 3 caratteri',
            'title.max' => 'il titolo deve avere un massimo di 80 caratteri',
            'author.required' => 'Il nome dell\'autore è obbligatorio, anche se sei solo tu!',
            'author.min' => 'il nome dell\'autore deve avere almeno 3 caratteri',
            'author.max' => 'il nome dell\'autore deve avere massimo 30 caratteri',
            'description.required' => 'Il progetto deve avere una descrizone',
            'description.min' => 'Il progetto deve avere almeno 3 caratteri',
            'content.required' => 'Il progetto deve avere una descrizone',
            'content.min' => 'Il progetto deve avere almeno 3 caratteri',
            // 'slug.required' => 'Il titolo è obbligatorio',
            // 'slug.unique' => "Esiste già un progetto chiamato $request->slug",
            // 'slug.min' => 'il titolo deve avere almeno 3 caratteri',
            // 'slug.max' => 'il titolo deve avere un massimo di 80 caratteri',
            'image.image' => 'l\'immagine deve essere un file di tipo immagine',
            'url_project.url' => 'il link del progetto deve essere valido',
            'url_generic.url' => 'il link generico deve essere valido',

        ]);

        $data = $request->all();
        $project = new Project();

        // $data['slug']=Str::slug($data['title'], '-'); alternativa per il slug (pre fill però)

        // if (array_key_exists('image', $data)) {
        // } oppure(importando prima l'helper array)
        if (Arr::exists($data, 'image')) {
            $img_url = Storage::put('projects', $data['image']);
            $data['image'] = $img_url;
        };

        $project->fill($data);
        $project->slug = Str::slug($project->title, '-');

        $project->save();

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('msg', 'Nuovo incredibile progetto inserito con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // Validazione
        $request->validate([
            'title' => ['required', 'string', Rule::unique('projects')->ignore($project->id), 'min:3', 'max:80'],
            'author' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            // 'slug' => ['required', 'string', Rule::unique('projects')->ignore($project->id), 'min:3', 'max:80'],
            'image' => 'nullable|image',
            'url_project' => 'nullable|url',
            'url_generic' => 'nullable|url',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => "Esiste già un progetto chiamato $request->title",
            'title.min' => 'il titolo deve avere almeno 3 caratteri',
            'title.max' => 'il titolo deve avere un massimo di 80 caratteri',
            'author.required' => 'Il nome dell\'autore è obbligatorio, anche se sei solo tu!',
            'author.min' => 'il nome dell\'autore deve avere almeno 3 caratteri',
            'author.max' => 'il nome dell\'autore deve avere massimo 30 caratteri',
            'description.required' => 'Il progetto deve avere una descrizone',
            'description.min' => 'Il progetto deve avere almeno 3 caratteri',
            'content.required' => 'Il progetto deve avere una descrizone',
            'content.min' => 'Il progetto deve avere almeno 3 caratteri',
            // 'slug.required' => 'Lo slug è obbligatorio',
            // 'slug.unique' => "Esiste già un progetto chiamato $request->slug",
            // 'slug.min' => 'il titolo deve avere almeno 3 caratteri',
            // 'slug.max' => 'il titolo deve avere un massimo di 80 caratteri',
            'image.image' => 'l\'immagine deve essere un file di tipo immagine',
            'url_project.url' => 'il link del progetto deve essere valido',
            'url_generic.url' => 'il link generico deve essere valido',

        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $project->update($data);
        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('msg', 'Questo fantastico progetto è stato modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('type', 'danger')->with('msg', "il progetto '$project->title' è stato eliminato con successo");
    }
}
