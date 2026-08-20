<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Services\ServiceService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ServiceController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:services.index'], only: ['index']),
            new Middleware(['permission:services.create'], only: ['store']),
            new Middleware(['permission:services.edit'], only: ['update']),
            new Middleware(['permission:services.delete'], only: ['destroy']),
        ];
    }
    private $ServiceService;

    public function __construct(ServiceService $ServiceService)
    {
        $this->ServiceService = $ServiceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->ServiceService->all();
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
    public function store(ServiceRequest $request)
    {
        return $this->ServiceService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $Service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, int $id)
    {
        return $this->ServiceService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->ServiceService->delete($id);
    }
}
