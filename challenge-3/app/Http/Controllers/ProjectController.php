<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // зема ги сите проекти од базата
        return view('projects.index', compact('projects')); // праќа ги во Blade
    }
}
