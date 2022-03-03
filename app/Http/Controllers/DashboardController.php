<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // List all projects except those that belong to the logged in user
        $projects = Project::where('user_id', '!=', auth()->user()->id);


        $academies = Academy::all();

        // Filter
        if (request()->has('academy')) {
            $academy_id = request()->academy;

            $projects->whereHas('requirements', function ($query) use ($academy_id) {
                $query->where('academies.id', $academy_id);
            });
        }

        $projects = $projects->latest()->get();


        return view('dashboard', compact('projects', 'academies'));
    }
    public function store(Request $request)
    {
        $user = auth()->user();

        // $request = $user->projects()->store([
        //     'project_message' => $request->project_message,
        // ]);

        // $project->requirements()->attach($request->academy_id);

        $request->validate([
            'project_message' => ['required'],
        ]);

        $user = Project::create([
            'project_message' => $request->project_message,

        ]);

        return back();
    }
}
