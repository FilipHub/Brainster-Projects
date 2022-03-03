<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisteredUserController;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects()->latest()->get();
        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academies = Academy::all();

        return view('pages.projects.create', compact('academies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        $project = $user->projects()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $project->requirements()->attach($request->academy_id);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $user = User::all();
        $academies = Academy::all();
        $applicants = auth()->user()->projects()->latest()->get();
        return view('pages.projects.applicants')->with('project', Project::find($project));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($projectid)
    {
        $academies = Academy::all();
        $project = Project::find($projectid);
        return view('pages.projects.edit', compact('project', 'academies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($projectid)
    {

        $data = request()->all();
        $project = Project::find($projectid);

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->save();
        return redirect('/projects');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectid)

    {
        $project = Project::find($projectid);
        $project->delete();
        return redirect('/projects');
    }
}
