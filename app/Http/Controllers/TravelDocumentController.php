<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelDocumentRequest;
use App\Http\Services\TravelDocumentService;
use App\Models\TravelDocument;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TravelDocumentController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:travel_documents.index'], only: ['index']),
            new Middleware(['permission:travel_documents.create'], only: ['store']),
            new Middleware(['permission:travel_documents.edit'], only: ['update']),
            new Middleware(['permission:travel_documents.delete'], only: ['destroy']),
        ];
    }
    private $TravelDocumentService;

    public function __construct(TravelDocumentService $TravelDocumentService)
    {
        $this->TravelDocumentService = $TravelDocumentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->TravelDocumentService->all();
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
    public function store(TravelDocumentRequest $request)
    {
        return $this->TravelDocumentService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelDocument $TravelDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelDocument $TravelDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelDocumentRequest $request, int $id)
    {
        return $this->TravelDocumentService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->TravelDocumentService->delete($id);
    }
}
