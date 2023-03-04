<?php

namespace App\Models;

use App\Actions\Jetstream\DeletePhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Jetstream\HasProfilePhoto;

class Recipe extends Model
{
    use HasFactory, HasProfilePhoto, DeletePhoto;

    protected $fillable = [
        'name',
        'description',
        'food_type_id',
    ];

    /**
     * Get the category that owns the Recipe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the type that owns the Recipe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function foodType(): BelongsTo
    {
        return $this->belongsTo(FoodType::class);
    }

    /**
     * The plans that belong to the Recipe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class);
    }
}
