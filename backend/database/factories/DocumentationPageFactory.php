<?php

namespace Database\Factories;

use App\Models\DocumentationPage;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<DocumentationPage>
 */
class DocumentationPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = ucfirst(fake()->words(3, true));

        return [
            'project_id' => Project::factory(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1, 999999),
            'body' => "## " . fake()->sentence() . "\n\n" . fake()->paragraphs(3, true),
            'sort_order' => fake()->numberBetween(0, 20),
        ];
    }
}
