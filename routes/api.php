<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BadalController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentOrderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentDetailController;
use App\Http\Controllers\DocumentOrderController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\GuideOrderController;
use App\Http\Controllers\HandlingHotelController;
use App\Http\Controllers\HandlingPlaneController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MoneyExchangeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceListHotelController;
use App\Http\Controllers\PriceListPlaneController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TransportationOrderController;
use App\Http\Controllers\TravelDocumentController;
use App\Http\Controllers\TypeHotelController;
use App\Http\Controllers\WakafModelController;
use App\Http\Controllers\WakafOrderController;
use App\Http\Controllers\WheelChairController;
use App\Http\Controllers\WheelChairOrderController;


//route login
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'index']);

//group route with middleware "auth"
Route::group(['middleware' => 'auth:api'], function () {
    //logout
    Route::post('/logout', [App\Http\Controllers\Api\Auth\LoginController::class, 'logout']);
});


//group route with middleware "auth:api"
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/dashboard', App\Http\Controllers\DashboardController::class);
    Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'index']);
    Route::get('/permissions/all', [\App\Http\Controllers\PermissionController::class, 'all']);
    Route::get('/roles/all', [\App\Http\Controllers\RoleController::class, 'all']);
    Route::apiResource('/roles', App\Http\Controllers\RoleController::class);
    Route::apiResource('/users', App\Http\Controllers\UserController::class);
    Route::apiResource('/customers', CustomerController::class);

     Route::apiResource('users', UserController::class);
    Route::apiResource('badals', BadalController::class);
    Route::apiResource('contents', ContentController::class);
    Route::apiResource('content-orders', ContentOrderController::class);

    Route::apiResource('documents', DocumentController::class);
    Route::apiResource('document-details', DocumentDetailController::class);
    Route::apiResource('document-orders', DocumentOrderController::class);

    Route::apiResource('foods', FoodController::class);
    Route::apiResource('food-orders', FoodOrderController::class);

    Route::apiResource('guides', GuideController::class);
    Route::apiResource('guide-orders', GuideOrderController::class);

    Route::apiResource('handling-hotels', HandlingHotelController::class);
    Route::apiResource('handling-planes', HandlingPlaneController::class);

    Route::apiResource('hotels', HotelController::class);
    Route::apiResource('money-exchanges', MoneyExchangeController::class);

    Route::apiResource('orders', OrderController::class);

    Route::apiResource('price-list-hotels', PriceListHotelController::class);
    Route::apiResource('price-list-planes', PriceListPlaneController::class);

    Route::apiResource('routes', RouteController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('tours', TourController::class);

    Route::apiResource('transactions', TransactionController::class);

    Route::apiResource('transportations', TransportationController::class);
    Route::apiResource('transportation-orders', TransportationOrderController::class);

    Route::apiResource('travel-documents', TravelDocumentController::class);

    Route::apiResource('type-hotels', TypeHotelController::class);

    Route::apiResource('wakafs', WakafModelController::class);
    Route::apiResource('wakaf-orders', WakafOrderController::class);

    Route::apiResource('wheel-chairs', WheelChairController::class);
    Route::apiResource('wheel-chair-orders', WheelChairOrderController::class);
});
