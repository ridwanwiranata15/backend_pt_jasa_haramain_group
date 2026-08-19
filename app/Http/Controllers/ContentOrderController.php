<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentOrderRequest;
use App\Http\Services\ContentOrderService;
use App\Models\ContentOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ContentOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:content_orders.index'], only: ['index']),
            new Middleware(['permission:content_orders.create'], only: ['store']),
            new Middleware(['permission:content_orders.edit'], only: ['update']),
            new Middleware(['permission:content_orders.delete'], only: ['destroy']),
        ];
    }
    private $ContentOrderService;

    public function __construct(ContentOrderService $ContentOrderService)
    {
        $this->ContentOrderService = $ContentOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->ContentOrderService->all();
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
    public function store(ContentOrderRequest $request)
    {
        return $this->ContentOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(ContentOrder $ContentOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentOrder $ContentOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentOrderRequest $request, int $id)
    {
        return $this->ContentOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->ContentOrderService->delete($id);
    }
}
