<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Services\TransactionService;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TransactionController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:transactions.index'], only: ['index']),
            new Middleware(['permission:transactions.create'], only: ['store']),
            new Middleware(['permission:transactions.edit'], only: ['update']),
            new Middleware(['permission:transactions.delete'], only: ['destroy']),
        ];
    }
    private $TransactionService;

    public function __construct(TransactionService $TransactionService)
    {
        $this->TransactionService = $TransactionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->TransactionService->all();
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
    public function store(TransactionRequest $request)
    {
        return $this->TransactionService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $Transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $Transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, int $id)
    {
        return $this->TransactionService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->TransactionService->delete($id);
    }
}
