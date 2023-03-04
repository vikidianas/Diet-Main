<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Category;
use App\Models\FoodType;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category): View
    {
        return view('recipes.create', [
            'types' => FoodType::query()->get(),
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request, Category $category)/* : RedirectResponse */
    {
        $recipe = $category->recipe()
        ->create($request->validated());

        if ($request->photo) {
            $recipe->updateProfilePhoto($request->photo);
        }

        return redirect()
        ->route('categories.show', $category)
        ->banner('Resep telah tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe): View
    {
        return view('recipes.show', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe): View
    {
        return view('recipes.edit', [
            'recipe' => $recipe,
            'types' => FoodType::query()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $recipe->update($request->validated());

        if ($request->photo) {
            $recipe->updateProfilePhoto($request->photo);
        }

        return redirect()
        ->route('recipes.show', $recipe)
        ->banner('Resep telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()
        ->route('categories.show', $recipe->category)
        ->banner('Resep telah terhapus.');
    }
}
