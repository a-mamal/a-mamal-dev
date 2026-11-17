<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
	// Return all projects for the public projects listing.
	public function index()
	{
		return ProjectResource::collection(
			Project::query()
			->withExists('documentationPages')
			->get()
		);
	}

	// Return an individual project identified by its slug.
	public function show(Project $project)
	{
		$project->loadExists('documentationPages');

		return new ProjectResource($project);
	}
}
