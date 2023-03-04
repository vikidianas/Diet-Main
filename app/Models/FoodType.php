<?php

namespace App\Models;

use App\Actions\Jetstream\DeletePhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Jetstream\HasProfilePhoto;

class FoodType extends Model
{
    use HasFactory, HasProfilePhoto, DeletePhoto;

    protected $fillable = ['name'];

    public function deleteFood(): static
    {
        $this->food()->delete();

        return $this;
    }

    public function newFood(array $food): static
    {
        $this->food()->createMany(
            collect($food)
            ->map(fn ($item) => ['name' => $item])
            ->toArray()
        );

        return $this;
    }

    /**
     * Get all of the food for the FoodType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function food(): HasMany
    {
        return $this->hasMany(Food::class);
    }

    /**
     * Get all of the recipes for the FoodType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
