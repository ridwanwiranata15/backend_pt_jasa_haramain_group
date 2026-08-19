<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Post;
use App\Models\Product;
use App\Models\Aparatur;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Badal;
use App\Models\Content;
use App\Models\ContentOrder;
use App\Models\Customer;
use App\Models\Document;
use App\Models\DocumentDetail;
use App\Models\DocumentOrder;
use App\Models\Food;
use App\Models\FoodOrder;
use App\Models\GuideOrder;
use App\Models\HandlingHotel;
use App\Models\HandlingPlane;
use App\Models\Hotel;
use App\Models\MoneyExchange;
use App\Models\Order;
use App\Models\PriceListHotel;
use App\Models\PriceListPlane;
use App\Models\Route;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Transaction;
use App\Models\Transportation;
use App\Models\TransportationOrder;
use App\Models\TravelDocument;
use App\Models\TypeHotel;
use App\Models\User;
use App\Models\wakafmodel;
use App\Models\WheelChair;
use App\Models\WheelChairOrder;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       return response()->json([
            'success'   => true,
            'message'   => 'List Data on Dashboard',
            'data'      => [
               'badals' => Badal::count(),
               'contents' => Content::count(),
               'content_orders' => ContentOrder::count(),
               'customers' => Customer::count(),
               'documents' => Document::count(),
               'document_details' => DocumentDetail::count(),
               'document_order' => DocumentOrder::count(),
               'foods' => Food::count(),
               'food_orders' => FoodOrder::count(),
               'guides' => Guide::count(),
               'guide_orders' => GuideOrder::count(),
               'Handling_hotels' => HandlingHotel::count(),
               'handling_planes' => HandlingPlane::count(),
               'hotels' => Hotel::count(),
               'money_exchanges' => MoneyExchange::count(),
               'orders' => Order::count(),
               'price_list_hotels' => PriceListHotel::count(),
               'price_list_plane' => PriceListPlane::count(),
               'route' => Route::count(),
               'services' => Service::count(),
               'tours' => Tour::count(),
               'transactions' => Transaction::count(),
               'transportations' => Transportation::count(),
               'transportation_orders' => TransportationOrder::count(),
               'travel_document' => TravelDocument::count(),
               'type_hotel' => TypeHotel::count(),
               'users' => User::count(),
               'wakafs' => wakafmodel::count(),
               'wheel_chairs' => WheelChair::count(),
               'wheel_chair_orders' => WheelChairOrder::count()
            ]
        ]);
    }
}
