<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideOrderRequest;
use App\Http\Services\GuideOrderService;
use App\Models\GuideOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GuideOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:guide_orders.index'], only: ['index']),
            new Middleware(['permission:guide_orders.create'], only: ['store']),
            new Middleware(['permission:guide_orders.edit'], only: ['update']),
            new Middleware(['permission:guide_orders.delete'], only: ['destroy']),
        ];
    }
    private $GuideOrderService;

    public function __construct(GuideOrderService $GuideOrderService)
    {
        $this->GuideOrderService = $GuideOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->GuideOrderService->all();
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
    public function store(GuideOrderRequest $request)
    {
        return $this->GuideOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(GuideOrder $GuideOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuideOrder $GuideOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuideOrderRequest $request, int $id)
    {
        return $this->GuideOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->GuideOrderService->delete($id);
    }
}
