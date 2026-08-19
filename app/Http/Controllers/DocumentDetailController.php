<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentDetailRequest;
use App\Http\Services\DocumentDetailService;
use App\Models\DocumentDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DocumentDetailController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:document_details.index'], only: ['index']),
            new Middleware(['permission:document_details.create'], only: ['store']),
            new Middleware(['permission:document_details.edit'], only: ['update']),
            new Middleware(['permission:document_details.delete'], only: ['destroy']),
        ];
    }
    private $DocumentDetailService;

    public function __construct(DocumentDetailService $DocumentDetailService)
    {
        $this->DocumentDetailService = $DocumentDetailService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->DocumentDetailService->all();
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
    public function store(DocumentDetailRequest $request)
    {
        return $this->DocumentDetailService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentDetail $DocumentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentDetail $DocumentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentDetailRequest $request, int $id)
    {
        return $this->DocumentDetailService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->DocumentDetailService->delete($id);
    }
}
