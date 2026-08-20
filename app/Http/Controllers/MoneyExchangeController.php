<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoneyExchangeRequest;
use App\Http\Services\MoneyExchangeService;
use App\Models\MoneyExchange;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MoneyExchangeController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:money_exchanges.index'], only: ['index']),
            new Middleware(['permission:money_exchanges.create'], only: ['store']),
            new Middleware(['permission:money_exchanges.edit'], only: ['update']),
            new Middleware(['permission:money_exchanges.delete'], only: ['destroy']),
        ];
    }
    private $MoneyExchangeService;

    public function __construct(MoneyExchangeService $MoneyExchangeService)
    {
        $this->MoneyExchangeService = $MoneyExchangeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->MoneyExchangeService->all();
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
    public function store(MoneyExchangeRequest $request)
    {
        return $this->MoneyExchangeService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(MoneyExchange $MoneyExchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoneyExchange $MoneyExchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MoneyExchangeRequest $request, int $id)
    {
        return $this->MoneyExchangeService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->MoneyExchangeService->delete($id);
    }
}
