<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodTypeRequest;
use App\Http\Requests\UpdateFoodTypeRequest;
use App\Models\FoodType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FoodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('types.index', [
            'types' => FoodType::query()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoodTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodTypeRequest $request): RedirectResponse
    {
        $type = FoodType::query()->create($request->validated());

        if ($request->photo) {
            $type->updateProfilePhoto($request->photo);
        }

        if ($request->food) {
            $type->newFood($request->food);
        }

        return redirect()
        ->route('types.index')
        ->banner('Jenis Makanan baru telah tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodType  $type
     * @return \Illuminate\Http\Response
     */
    public function show(FoodType $type): View
    {
        return view('types.show', [
            'type' => $type->load('food'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodType $type): View
    {
        return view('types.edit', [
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodTypeRequest  $request
     * @param  \App\Models\FoodType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodTypeRequest $request, FoodType $type): RedirectResponse
    {
        $type->update($request->validated());

        if ($request->photo) {
            $type->updateProfilePhoto($request->photo);
        }

        $type->deleteFood();

        if ($request->food) {
            $type->newFood($request->food);
        }

        return redirect()
        ->route('types.index')
        ->banner('Jenis Makanan telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodType $type)
    {
        $type->delete();

        return redirect()
        ->route('types.index')
        ->banner('Jenis makanan telah terhapus.');
    }
}
