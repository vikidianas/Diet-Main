<?php

namespace App\Models;

use App\Actions\Jetstream\DeletePhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Jetstream\HasProfilePhoto;

class Category extends Model
{
    use HasFactory, HasProfilePhoto, DeletePhoto;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get all of the recipe for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
