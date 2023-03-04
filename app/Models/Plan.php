<?php

namespace App\Models;

use App\Actions\Jetstream\DeletePhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Jetstream\HasProfilePhoto;

class Plan extends Model
{
    use HasFactory, HasProfilePhoto, DeletePhoto;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The recipes that belong to the Plan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }
}
