<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportationOrderRequest;
use App\Http\Services\TransportationOrderService;
use App\Models\TransportationOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TransportationOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:transportation_orders.index'], only: ['index']),
            new Middleware(['permission:transportation_orders.create'], only: ['store']),
            new Middleware(['permission:transportation_orders.edit'], only: ['update']),
            new Middleware(['permission:transportation_orders.delete'], only: ['destroy']),
        ];
    }
    private $TransportationOrderService;

    public function __construct(TransportationOrderService $TransportationOrderService)
    {
        $this->TransportationOrderService = $TransportationOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->TransportationOrderService->all();
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
    public function store(TransportationOrderRequest $request)
    {
        return $this->TransportationOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TransportationOrder $TransportationOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransportationOrder $TransportationOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransportationOrderRequest $request, int $id)
    {
        return $this->TransportationOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->TransportationOrderService->delete($id);
    }
}
