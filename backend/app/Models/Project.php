<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'name',
    'slug',
    'description',
    'project_url',
    'github_url',
    'status',
])]
class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    // Get the user who owns this project.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public public function documentationPages(): HasMany
    {
        return $this->hasMany(DocumentationPage::class)->orderBy('sort_order');
    }
}
