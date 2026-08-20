<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Http\Services\TourService;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TourController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:tours.index'], only: ['index']),
            new Middleware(['permission:tours.create'], only: ['store']),
            new Middleware(['permission:tours.edit'], only: ['update']),
            new Middleware(['permission:tours.delete'], only: ['destroy']),
        ];
    }
    private $TourService;

    public function __construct(TourService $TourService)
    {
        $this->TourService = $TourService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->TourService->all();
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
    public function store(TourRequest $request)
    {
        return $this->TourService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $Tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $Tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourRequest $request, int $id)
    {
        return $this->TourService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->TourService->delete($id);
    }
}
