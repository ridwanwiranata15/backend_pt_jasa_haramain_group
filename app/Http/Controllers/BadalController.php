<?php

namespace App\Http\Controllers;

use App\Http\Requests\BadalRequest;
use App\Http\Services\BadalService;
use App\Models\Badal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BadalController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:badals.index'], only: ['index']),
            new Middleware(['permission:badals.create'], only: ['store']),
            new Middleware(['permission:badals.edit'], only: ['update']),
            new Middleware(['permission:badals.delete'], only: ['destroy']),
        ];
    }
    private $BadalService;

    public function __construct(BadalService $BadalService)
    {
        $this->BadalService = $BadalService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->BadalService->all();
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
    public function store(BadalRequest $request)
    {
        return $this->BadalService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Badal $Badal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Badal $Badal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BadalRequest $request, int $id)
    {
        return $this->BadalService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->BadalService->delete($id);
    }
}
