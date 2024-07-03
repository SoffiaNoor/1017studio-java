<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectImage360;
use App\Models\ProjectType;
use App\Models\ProjectTypeImage;

class ProjectController extends Controller
{
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $projectImages = ProjectImage::where('id_project_image', $id)->get();
        $projectType = ProjectType::where('id_project', $id)->get();

        return view('projects.show', compact('project', 'projectImages', 'projectType'));
    }

    public function detail($id_project, $id_project_type)
    {
        $project = Project::findOrFail($id_project);
        $projectType = ProjectType::findOrFail($id_project_type);

        $projectTypeImages = ProjectTypeImage::where('id_project_type', $id_project_type)->get();
        $projectTypeImages360 = ProjectImage360::where('id_project_type', $id_project_type)->get();
        return view('projects.detail', compact('project', 'projectType', 'projectTypeImages', 'projectTypeImages360'));
    }
}