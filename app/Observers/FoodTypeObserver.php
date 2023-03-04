<?php

namespace App\Observers;

use App\Models\FoodType;

class FoodTypeObserver
{
    /**
     * Handle the FoodType "created" event.
     *
     * @param  \App\Models\FoodType  $foodType
     * @return void
     */
    public function created(FoodType $foodType)
    {
        //
    }

    /**
     * Handle the FoodType "updated" event.
     *
     * @param  \App\Models\FoodType  $foodType
     * @return void
     */
    public function updated(FoodType $foodType)
    {
        //
    }

    /**
     * Handle the FoodType "deleted" event.
     *
     * @param  \App\Models\FoodType  $foodType
     * @return void
     */
    public function deleted(FoodType $foodType)
    {
        $foodType->deletePhoto(false);
    }

    /**
     * Handle the FoodType "restored" event.
     *
     * @param  \App\Models\FoodType  $foodType
     * @return void
     */
    public function restored(FoodType $foodType)
    {
        //
    }

    /**
     * Handle the FoodType "force deleted" event.
     *
     * @param  \App\Models\FoodType  $foodType
     * @return void
     */
    public function forceDeleted(FoodType $foodType)
    {
        $foodType->deletePhoto(false);
    }
}
