<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceListHotelRequest;
use App\Http\Services\PriceListHotelService;
use App\Models\PriceListHotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PriceListHotelController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:price_list_hotels.index'], only: ['index']),
            new Middleware(['permission:price_list_hotels.create'], only: ['store']),
            new Middleware(['permission:price_list_hotels.edit'], only: ['update']),
            new Middleware(['permission:price_list_hotels.delete'], only: ['destroy']),
        ];
    }
    private $PriceListHotelService;

    public function __construct(PriceListHotelService $PriceListHotelService)
    {
        $this->PriceListHotelService = $PriceListHotelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->PriceListHotelService->all();
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
    public function store(PriceListHotelRequest $request)
    {
        return $this->PriceListHotelService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceListHotel $PriceListHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceListHotel $PriceListHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PriceListHotelRequest $request, int $id)
    {
        return $this->PriceListHotelService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->PriceListHotelService->delete($id);
    }
}
