<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Settings\ProjectSetting;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(): View
    {
        /** @var ProjectSetting $setting */
        $setting = app(ProjectSetting::class);
        $projects = Project::get();

        return view('client.pages.projects', ['setting' => $setting, 'projects' => $projects]);
    }
}
