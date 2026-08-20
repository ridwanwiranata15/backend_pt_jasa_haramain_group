<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeHotelRequest;
use App\Http\Services\TypeHotelService;
use App\Models\TypeHotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TypeHotelController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:type_hotels.index'], only: ['index']),
            new Middleware(['permission:type_hotels.create'], only: ['store']),
            new Middleware(['permission:type_hotels.edit'], only: ['update']),
            new Middleware(['permission:type_hotels.delete'], only: ['destroy']),
        ];
    }
    private $TypeHotelService;

    public function __construct(TypeHotelService $TypeHotelService)
    {
        $this->TypeHotelService = $TypeHotelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->TypeHotelService->all();
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
    public function store(TypeHotelRequest $request)
    {
        return $this->TypeHotelService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeHotel $TypeHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeHotel $TypeHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeHotelRequest $request, int $id)
    {
        return $this->TypeHotelService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->TypeHotelService->delete($id);
    }
}
