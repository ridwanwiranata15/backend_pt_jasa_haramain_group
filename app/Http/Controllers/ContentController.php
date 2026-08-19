<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Http\Services\ContentService;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ContentController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:contents.index'], only: ['index']),
            new Middleware(['permission:contents.create'], only: ['store']),
            new Middleware(['permission:contents.edit'], only: ['update']),
            new Middleware(['permission:contents.delete'], only: ['destroy']),
        ];
    }
    private $ContentService;

    public function __construct(ContentService $ContentService)
    {
        $this->ContentService = $ContentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->ContentService->all();
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
    public function store(ContentRequest $request)
    {
        return $this->ContentService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $Content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $Content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, int $id)
    {
        return $this->ContentService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->ContentService->delete($id);
    }
}
