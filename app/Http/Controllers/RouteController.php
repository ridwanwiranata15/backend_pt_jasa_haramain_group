<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Http\Services\RouteService;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RouteController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:routes.index'], only: ['index']),
            new Middleware(['permission:routes.create'], only: ['store']),
            new Middleware(['permission:routes.edit'], only: ['update']),
            new Middleware(['permission:routes.delete'], only: ['destroy']),
        ];
    }
    private $RouteService;

    public function __construct(RouteService $RouteService)
    {
        $this->RouteService = $RouteService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->RouteService->all();
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
    public function store(RouteRequest $request)
    {
        return $this->RouteService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $Route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $Route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RouteRequest $request, int $id)
    {
        return $this->RouteService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->RouteService->delete($id);
    }
}
