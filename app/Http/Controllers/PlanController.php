<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('plans.index', [
            'plans' => Plan::query()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('plans.create', [
            'recipes' => Recipe::query()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request): RedirectResponse
    {
        $plan = Plan::query()->create($request->validated());

        if ($request->photo) {
            $plan->updateProfilePhoto($request->photo);
        }

        if ($request->recipes) {
            $plan->recipes()->sync($request->recipes);
        }

        return redirect()
        ->route('plans.index')
        ->banner('Rencana baru telah tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan): View
    {
        return view('plans.show', [
            'plan' => $plan->load('recipes.foodType'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan): View
    {
        return view('plans.edit', [
            'plan' => $plan->load('recipes'),
            'recipes' => Recipe::query()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan): RedirectResponse
    {
        $plan->update($request->validated());

        if ($request->photo) {
            $plan->updateProfilePhoto($request->photo);
        }

        if ($request->recipes) {
            $plan->recipes()->sync($request->recipes);
        }

        return redirect()
        ->route('plans.index')
        ->banner('Rencana telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan): RedirectResponse
    {
        $plan->delete();

        return redirect()
        ->route('plans.index')
        ->banner('Rencana telah terhapus.');
    }
}
