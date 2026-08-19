<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodOrderRequest;
use App\Http\Services\FoodOrderService;
use App\Models\FoodOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FoodOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:food_orders.index'], only: ['index']),
            new Middleware(['permission:food_orders.create'], only: ['store']),
            new Middleware(['permission:food_orders.edit'], only: ['update']),
            new Middleware(['permission:food_orders.delete'], only: ['destroy']),
        ];
    }
    private $FoodOrderService;

    public function __construct(FoodOrderService $FoodOrderService)
    {
        $this->FoodOrderService = $FoodOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->FoodOrderService->all();
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
    public function store(FoodOrderRequest $request)
    {
        return $this->FoodOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodOrder $FoodOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodOrder $FoodOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodOrderRequest $request, int $id)
    {
        return $this->FoodOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->FoodOrderService->delete($id);
    }
}
