<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideRequest;
use App\Http\Services\GuideService;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GuideController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:guides.index'], only: ['index']),
            new Middleware(['permission:guides.create'], only: ['store']),
            new Middleware(['permission:guides.edit'], only: ['update']),
            new Middleware(['permission:guides.delete'], only: ['destroy']),
        ];
    }
    private $GuideService;

    public function __construct(GuideService $GuideService)
    {
        $this->GuideService = $GuideService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->GuideService->all();
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
    public function store(GuideRequest $request)
    {
        return $this->GuideService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Guide $Guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide $Guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuideRequest $request, int $id)
    {
        return $this->GuideService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->GuideService->delete($id);
    }
}
