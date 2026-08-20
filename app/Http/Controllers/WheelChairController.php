<?php

namespace App\Http\Controllers;

use App\Http\Requests\WheelChairRequest;
use App\Http\Services\WheelChairService;
use App\Models\WheelChair;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WheelChairController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware(['permission:wheel_chairs.index'], only: ['index']),
            new Middleware(['permission:wheel_chairs.create'], only: ['store']),
            new Middleware(['permission:wheel_chairs.edit'], only: ['update']),
            new Middleware(['permission:wheel_chairs.delete'], only: ['destroy']),
        ];
    }
    private $WheelChairService;

    public function __construct(WheelChairService $WheelChairService)
    {
        $this->WheelChairService = $WheelChairService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->WheelChairService->all();
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
    public function store(WheelChairRequest $request)
    {
        return $this->WheelChairService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(WheelChair $WheelChair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WheelChair $WheelChair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WheelChairRequest $request, int $id)
    {
        return $this->WheelChairService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->WheelChairService->delete($id);
    }
}
