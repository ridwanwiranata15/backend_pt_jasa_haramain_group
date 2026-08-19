<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        "customer_id",
        "tanggal_keberangkatan",
        "tanggal_kepulangan",
        "total_jamaah",
        "status",
        "keterangan",
        "unique_code"
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function contentOrders(){
        return $this->hasMany(ContentOrder::class);
    }
    public function orderDocuments()
    {
        return $this->hasMany(DocumentOrder::class);
    }

    public function OrderFoods()
    {
        return $this->hasMany(FoodOrder::class);
    }
    public function GuideOrders()
    {
        return $this->hasMany(GuideOrder::class);
    }
    public function HandlingHotels()
    {
        return $this->hasMany(HandlingHotel::class);
    }
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function moneyExchanges()
    {
        return $this->hasMany(MoneyExchange::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function TransportationOrders()
    {
        return $this->hasMany(TransportationOrder::class);
    }
    public function TravelDocuments()
    {
        return $this->hasMany(TravelDocument::class);
    }
    public function WakafOrders(){
        return $this->hasMany(WakafOrder::class);
    }
    public function wheelChairOrder()
    {
        return $this->HasMany(WheelChairOrder::class);
    }
}
