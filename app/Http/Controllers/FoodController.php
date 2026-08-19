<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Http\Services\FoodService;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FoodController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:foods.index'], only: ['index']),
            new Middleware(['permission:foods.create'], only: ['store']),
            new Middleware(['permission:foods.edit'], only: ['update']),
            new Middleware(['permission:foods.delete'], only: ['destroy']),
        ];
    }
    private $FoodService;

    public function __construct(FoodService $FoodService)
    {
        $this->FoodService = $FoodService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->FoodService->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        return $this->FoodService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $Food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $Food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, int $id)
    {
        return $this->FoodService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->FoodService->delete($id);
    }
}
