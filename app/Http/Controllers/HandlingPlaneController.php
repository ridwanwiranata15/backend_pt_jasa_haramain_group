<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandlingPlaneRequest;
use App\Http\Services\HandlingPlaneService;
use App\Models\HandlingPlane;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HandlingPlaneController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:handling_planes.index'], only: ['index']),
            new Middleware(['permission:handling_planes.create'], only: ['store']),
            new Middleware(['permission:handling_planes.edit'], only: ['update']),
            new Middleware(['permission:handling_planes.delete'], only: ['destroy']),
        ];
    }
    private $HandlingPlaneService;

    public function __construct(HandlingPlaneService $HandlingPlaneService)
    {
        $this->HandlingPlaneService = $HandlingPlaneService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->HandlingPlaneService->all();
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
    public function store(HandlingPlaneRequest $request)
    {
        return $this->HandlingPlaneService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(HandlingPlane $HandlingPlane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HandlingPlane $HandlingPlane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HandlingPlaneRequest $request, int $id)
    {
        return $this->HandlingPlaneService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->HandlingPlaneService->delete($id);
    }
}
