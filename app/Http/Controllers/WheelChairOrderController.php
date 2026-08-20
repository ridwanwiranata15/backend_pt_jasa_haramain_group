<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheelChairOrderRequest;
use App\Http\Services\WheelChairOrderService;
use App\Models\WheelChairOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WheelChairOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:wheel_chair_orders.index'], only: ['index']),
            new Middleware(['permission:wheel_chair_orders.create'], only: ['store']),
            new Middleware(['permission:wheel_chair_orders.edit'], only: ['update']),
            new Middleware(['permission:wheel_chair_orders.delete'], only: ['destroy']),
        ];
    }
    private $WheelChairOrderService;

    public function __construct(WheelChairOrderService $WheelChairOrderService)
    {
        $this->WheelChairOrderService = $WheelChairOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->WheelChairOrderService->all();
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
    public function store(WheelChairOrderRequest $request)
    {
        return $this->WheelChairOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(WheelChairOrder $WheelChairOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WheelChairOrder $WheelChairOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WheelChairOrderRequest $request, int $id)
    {
        return $this->WheelChairOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->WheelChairOrderService->delete($id);
    }
}
