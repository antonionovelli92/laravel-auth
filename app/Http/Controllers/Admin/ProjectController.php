<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


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

        $data = $request->all();
        $project = new Project();

        // $data['slug']=Str::slug($data['title'], '-'); alternativa per il slug (pre fill però)
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
