<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentationPageResource;
use App\Models\Project;

class DocumentationPageController extends Controller
{
	// Return the pages of a project for the documentation sidebar, without their content.
	public function index(Project $project)
	{
		return DocumentationPageResource::collection(
			$project->documentationPages()
                // The sidebar only needs titles and links, so the long page
				// content is left out to keep the response small.
				->select(['id', 'title', 'slug', 'sort_order'])
                // Show the pages in the order set by their front matter.
				->orderBy('sort_order')
				->get()
		);
	}

	// Return a single page of a project, including its content.
	public function show(Project $project, string $pageSlug)
	{
		return new DocumentationPageResource(
			$project->documentationPages()
                // Page slugs are only unique within a project, so the lookup
				// has to go through the project's own pages.
				->where('slug', $pageSlug)
				->firstOrFail()
		);
	}
}
