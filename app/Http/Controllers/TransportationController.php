<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportationRequest;
use App\Http\Services\TransportationService;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TransportationController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:transportations.index'], only: ['index']),
            new Middleware(['permission:transportations.create'], only: ['store']),
            new Middleware(['permission:transportations.edit'], only: ['update']),
            new Middleware(['permission:transportations.delete'], only: ['destroy']),
        ];
    }
    private $TransportationService;

    public function __construct(TransportationService $TransportationService)
    {
        $this->TransportationService = $TransportationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->TransportationService->all();
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
    public function store(TransportationRequest $request)
    {
        return $this->TransportationService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportation $Transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportation $Transportation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransportationRequest $request, int $id)
    {
        return $this->TransportationService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->TransportationService->delete($id);
    }
}
