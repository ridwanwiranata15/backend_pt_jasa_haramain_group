<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandlingHotelRequest;
use App\Http\Services\HandlingHotelService;
use App\Models\HandlingHotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HandlingHotelController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:handling_hotels.index'], only: ['index']),
            new Middleware(['permission:handling_hotels.create'], only: ['store']),
            new Middleware(['permission:handling_hotels.edit'], only: ['update']),
            new Middleware(['permission:handling_hotels.delete'], only: ['destroy']),
        ];
    }
    private $HandlingHotelService;

    public function __construct(HandlingHotelService $HandlingHotelService)
    {
        $this->HandlingHotelService = $HandlingHotelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->HandlingHotelService->all();
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
    public function store(HandlingHotelRequest $request)
    {
        return $this->HandlingHotelService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(HandlingHotel $HandlingHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HandlingHotel $HandlingHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HandlingHotelRequest $request, int $id)
    {
        return $this->HandlingHotelService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->HandlingHotelService->delete($id);
    }
}
