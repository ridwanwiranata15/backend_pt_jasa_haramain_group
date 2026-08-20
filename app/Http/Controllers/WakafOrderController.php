<?php

namespace App\Http\Controllers;

use App\Http\Requests\WakafOrderRequest;
use App\Http\Services\WakafOrderService;
use App\Models\WakafOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WakafOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:Wakaf_orders.index'], only: ['index']),
            new Middleware(['permission:Wakaf_orders.create'], only: ['store']),
            new Middleware(['permission:Wakaf_orders.edit'], only: ['update']),
            new Middleware(['permission:Wakaf_orders.delete'], only: ['destroy']),
        ];
    }
    private $WakafOrderService;

    public function __construct(WakafOrderService $WakafOrderService)
    {
        $this->WakafOrderService = $WakafOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->WakafOrderService->all();
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
    public function store(WakafOrderRequest $request)
    {
        return $this->WakafOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(WakafOrder $WakafOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WakafOrder $WakafOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WakafOrderRequest $request, int $id)
    {
        return $this->WakafOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->WakafOrderService->delete($id);
    }
}
