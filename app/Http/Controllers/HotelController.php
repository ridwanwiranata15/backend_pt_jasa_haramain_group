<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Http\Services\HotelService;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HotelController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:hotels.index'], only: ['index']),
            new Middleware(['permission:hotels.create'], only: ['store']),
            new Middleware(['permission:hotels.edit'], only: ['update']),
            new Middleware(['permission:hotels.delete'], only: ['destroy']),
        ];
    }
    private $HotelService;

    public function __construct(HotelService $HotelService)
    {
        $this->HotelService = $HotelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->HotelService->all();
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
    public function store(HotelRequest $request)
    {
        return $this->HotelService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $Hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $Hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $request, int $id)
    {
        return $this->HotelService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->HotelService->delete($id);
    }
}
