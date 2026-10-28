<?php

namespace App\Models;

use Database\Factories\PetFactory; 
use Illuminate\Database\Eloquent\Attributes\Fillable; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable([
	'user_id', 
	'name', 
	'slug', 
	'species', 
	'bio', 
	'profile_image', 
])]
class Pet extends Model
{
	/** @use HasFactory<PetFactory> */
	use HasFactory;

	// Get the user account responsible for this pet.
	public function user(): BelongsTo 
	{ 
		return $this->belongsTo(User::class); 
	}
}
