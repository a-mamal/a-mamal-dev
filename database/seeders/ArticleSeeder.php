<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the path to the directory containing the Markdown articles
        $path = database_path('seeders/data/articles');

        // Get all files inside the articles directory
        $files = File::files($path);

        foreach ($files as $file) {
            // Read the entire Markdown file as a string
            $content = File::get($file->getPathname());

            // Split the file into:
            // 1. Everything before the first "---"
            // 2. The front matter
            // 3. The markdown content
            $parts = preg_split('/^---\s*$/m', $content, 3);

            // Split the front matter into individual lines
            $frontMatter = preg_split('/\R/', trim($parts[1]));

            $metadata = [];

            foreach ($frontMatter as $line) {
                // Split each line into a key and a value
                [$key, $value] = array_pad(
                    explode(':', $line, 2),
                    2,
                    null
                );

                // Remove whitespace from the key and value.
                $key = trim($key);
                $value = trim($value);

                // Treat empty values as null
                if ($value === '') {
                    $value = null;
                }

                // Add the parsed key/value pair to the metadata array
                $metadata[$key] = $value;
            }

            // Extract the Markdown body from the third part of the file
            $markdown = trim($parts[2]);

            // Find an existing article by its unique slug and update it.
            // If no article with that slug exists, create a new one.

            Article::updateOrCreate(
                [
                    'slug' => $metadata['slug'],
                ],
                [
                    'user_id' => null,
                    'title' => $metadata['title'],
                    'excerpt' => $metadata['excerpt'],
                    'content' => $markdown,
                    'status' => $metadata['status'],
                    'published_at' => $metadata['published_at'],
                ]
            );
        }
    }
}
