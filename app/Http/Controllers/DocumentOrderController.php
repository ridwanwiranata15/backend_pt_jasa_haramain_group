<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentOrderRequest;
use App\Http\Services\DocumentOrderService;
use App\Models\DocumentOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DocumentOrderController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:document_orders.index'], only: ['index']),
            new Middleware(['permission:document_orders.create'], only: ['store']),
            new Middleware(['permission:document_orders.edit'], only: ['update']),
            new Middleware(['permission:document_orders.delete'], only: ['destroy']),
        ];
    }
    private $DocumentOrderService;

    public function __construct(DocumentOrderService $DocumentOrderService)
    {
        $this->DocumentOrderService = $DocumentOrderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->DocumentOrderService->all();
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
    public function store(DocumentOrderRequest $request)
    {
        return $this->DocumentOrderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentOrder $DocumentOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentOrder $DocumentOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentOrderRequest $request, int $id)
    {
        return $this->DocumentOrderService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->DocumentOrderService->delete($id);
    }
}
