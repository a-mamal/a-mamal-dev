<?php

namespace Database\Seeders;

use App\Models\DocumentationPage;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RuntimeException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * Seeds documentation pages from the markdown files in database/seeders/data/documentation.
 *
 * Folder layout:
 *   documentation/{project-slug}/{page-slug}.md
 *
 * Each file starts with a short header, followed by the page content:
 *
 *   ---
 *   title: How the sidebar works
 *   order: 2
 *   ---
 *
 *   The page content in markdown...
 *
 * The folder name must match the slug of an existing project, and the file
 * name (without .md) becomes the slug of the page.
 */

class DocumentationPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedPages();
    
    }

    /**
     * Load and store the documentation pages from the markdown files.
     */
    private function seedPages(): void
    {
        $documentationPath = database_path('seeders/data/documentation');
        
        // Ensure the documentation directory exists before attempting to read it.
        if (! File::isDirectory($documentationPath)) {
            throw new RuntimeException('Documentation directory not found.');
        }

        // Run everything in a transaction so a single invalid page
        // does not leave the database half-seeded.
        DB::transaction(function () use ($documentationPath): void {
            // Each folder represents one project and is named after its slug.
            foreach (File::directories($documentationPath) as $directory) {
                $projectSlug = basename($directory);
                $project = Project::where('slug', $projectSlug)->first();

                // Ensure the folder name matches an existing project.
                if (! $project) {
                    throw new RuntimeException(
                        "No project found for documentation folder '{$projectSlug}'."
                    );
                }

                // Each markdown file in the folder represents one page.
                foreach (File::files($directory) as $file) {
                    // Skip anything that is not markdown.
                    if ($file->getExtension() !== 'md') {
                        continue;
                    }

                    // The file name becomes the page slug, 
                    // so it must already be in a URL-friendly format.
                    $slug = $file->getFilenameWithoutExtension();

                    if (Str::slug($slug) !== $slug) {
                        throw new RuntimeException("Invalid page slug '{$slug}'.");
                    }

                    // Split the file into its header and its content.
                    $document = YamlFrontMatter::parse(File::get($file->getPathname()));
                    $title = $document->matter('title');
                    $order = $document->matter('order', 0);

                    // Validate the header values.
                    if (! is_string($title) || Str::trim($title) === '') {
                        throw new RuntimeException("Page '{$slug}' is missing a title.");
                    }

                    if (! is_int($order)) {
                        throw new RuntimeException("Page '{$slug}' has an invalid order.");
                    }

                    // Match pages by project and slug 
                    // to avoid creating duplicates on subsequent imports.
                    DocumentationPage::updateOrCreate(
                        ['project_id' => $project->id, 'slug' => $slug],
                        [
                            'title' => $title,
                            'sort_order' => $order,
                            'body' => Str::trim($document->body()),
                        ]
                    );
                }
            }
        });
    }
}
