<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceListPlaneRequest;
use App\Http\Services\PriceListPlaneService;
use App\Models\PriceListPlane;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PriceListPlaneController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:price_list_planes.index'], only: ['index']),
            new Middleware(['permission:price_list_planes.create'], only: ['store']),
            new Middleware(['permission:price_list_planes.edit'], only: ['update']),
            new Middleware(['permission:price_list_planes.delete'], only: ['destroy']),
        ];
    }
    private $PriceListPlaneService;

    public function __construct(PriceListPlaneService $PriceListPlaneService)
    {
        $this->PriceListPlaneService = $PriceListPlaneService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->PriceListPlaneService->all();
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
    public function store(PriceListPlaneRequest $request)
    {
        return $this->PriceListPlaneService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceListPlane $PriceListPlane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceListPlane $PriceListPlane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriceListPlaneRequest $request, int $id)
    {
        return $this->PriceListPlaneService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->PriceListPlaneService->delete($id);
    }
}
