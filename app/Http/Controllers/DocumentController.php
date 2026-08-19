<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Http\Services\DocumentService;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DocumentController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:documents.index'], only: ['index']),
            new Middleware(['permission:documents.create'], only: ['store']),
            new Middleware(['permission:documents.edit'], only: ['update']),
            new Middleware(['permission:documents.delete'], only: ['destroy']),
        ];
    }
    private $DocumentService;

    public function __construct(DocumentService $DocumentService)
    {
        $this->DocumentService = $DocumentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->DocumentService->all();
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
    public function store(DocumentRequest $request)
    {
        return $this->DocumentService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $Document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $Document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, int $id)
    {
        return $this->DocumentService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->DocumentService->delete($id);
    }
}
