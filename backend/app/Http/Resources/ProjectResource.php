<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'slug' => $this->slug,
			'highlights' => $this->highlights,
			'description' => $this->description,
			'project_url' => $this->project_url,
			'github_url' => $this->github_url,
			'status' => $this->status,
			'is_featured' => $this->is_featured,
			'has_documentation' => (bool) $this->documentation_pages_exists,
		];
	}
}
