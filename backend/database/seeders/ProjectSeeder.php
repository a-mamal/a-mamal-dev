<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RuntimeException;

class ProjectSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$this->seedProjects($this->getMainUser());
	}

	/**
	 * Retrieve the main application user.
	 */
	private function getMainUser(): User
	{
		return User::where(
			'email',
			config('seeders.main_user.email')
		)->firstOrFail();
	}

	/**
	 * Load and store the projects from the JSON data file.
	 */
	private function seedProjects(User $user): void
	{
		$jsonPath = database_path('seeders/data/projects.json');

		// Ensure the data file exists before attempting to read it.
		if (!File::isFile($jsonPath)) {
			throw new RuntimeException('Project data file not found.');
		}

		// Decode the JSON file into an associative PHP array.
		// JSON_THROW_ON_ERROR ensures malformed JSON raises an exception.
		$projects = json_decode(
			File::get($jsonPath),
			true,
			512,
			JSON_THROW_ON_ERROR
		);

		// Ensure the decoded data is a sequential list of projects.
		if (! is_array($projects) || ! array_is_list($projects)) {
			throw new RuntimeException('Project data must be a JSON array.');
		}

		DB::transaction(function () use ($projects, $user): void {
			foreach ($projects as $project) {
				// Ensure each list entry represents a project object.
				if (! is_array($project)) {
					throw new RuntimeException(
						'Each project must be a JSON object.'
					);
				}

				// Validate the fields required to create a project.
				foreach (['name', 'slug', 'description', 'status'] as $field) {
					if (
						! isset($project[$field]) ||
						! is_string($project[$field]) ||
						Str::trim($project[$field]) === ''
					) {
						throw new RuntimeException(
							"Project data is missing the required '{$field}' value."
						);
					}
				}

				// Ensure the slug uses the expected URL-friendly format.
				if (Str::slug($project['slug']) !== $project['slug']) {
					throw new RuntimeException(
						"Invalid slug '{$project['slug']}' for project '{$project['name']}'."
					);
				}

				// Ensure the status matches one of the values allowed by the database.
				if (
					! in_array($project['status'], [
						'planned',
						'in_progress',
						'completed',
						'archived',
					], true)
				) {
					throw new RuntimeException(
						"Invalid status '{$project['status']}' for project '{$project['name']}'."
					);
				}

				// Validate optional project highlights when provided.
				$highlights = $project['highlights'] ?? null;

				if ($highlights !== null) {
					if (! is_array($highlights) || ! array_is_list($highlights)) {
						throw new RuntimeException(
							"Invalid highlights provided for project '{$project['name']}'."
						);
					}

					foreach ($highlights as $highlight) {
						if (
							! is_string($highlight) ||
							Str::trim($highlight) === ''
						) {
							throw new RuntimeException(
								"Invalid highlight provided for project '{$project['name']}'."
							);
						}
					}
				}

				// Validate the optional featured status.
				$is_featured = $project['is_featured'] ?? false;

				if (! is_bool($is_featured)) {
					throw new RuntimeException(
						"Invalid featured status for project '{$project['name']}'."
					);
				}

				// Validate optional project URLs when provided.
				$urls = [];

				foreach (['project_url', 'github_url'] as $field) {
					$url = $project[$field] ?? null;
					
					if ($url !== null) {
						if (! is_string($url)) {
							throw new RuntimeException(
								"Invalid URL provided for '{$field}' in project '{$project['name']}'."
							);
						}

						$url = Str::trim($url);

						if (! Str::isUrl($url, ['http', 'https'])) {
							throw new RuntimeException(
								"Invalid URL provided for '{$field}' in project '{$project['name']}'."
							);
						}
					}

					$urls[$field] = $url;
				}

				// Match projects by slug to avoid creating duplicates on subsequent imports.
				Project::updateOrCreate(
					['slug' => $project['slug']],
					[
						'user_id' => $user->id,
						'name' => $project['name'],
						'description' => $project['description'],
						'project_url' => $urls['project_url'],
						'github_url' => $urls['github_url'],
						'status' => $project['status'],
						'highlights' => $highlights,
						'is_featured' => $is_featured,
					]
				);
			}
		});
	}
}
