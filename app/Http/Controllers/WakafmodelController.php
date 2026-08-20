<?php

namespace App\Http\Controllers;

use App\Http\Requests\WakafModelRequest;
use App\Http\Services\WakafModelService;
use App\Models\WakafModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WakafModelController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:Wakafs.index'], only: ['index']),
            new Middleware(['permission:Wakafs.create'], only: ['store']),
            new Middleware(['permission:Wakafs.edit'], only: ['update']),
            new Middleware(['permission:Wakafs.delete'], only: ['destroy']),
        ];
    }
    private $WakafModelService;

    public function __construct(WakafModelService $WakafModelService)
    {
        $this->WakafModelService = $WakafModelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->WakafModelService->all();
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
    public function store(WakafModelRequest $request)
    {
        return $this->WakafModelService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(WakafModel $WakafModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WakafModel $WakafModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WakafModelRequest $request, int $id)
    {
        return $this->WakafModelService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->WakafModelService->delete($id);
    }
}
