<?php

namespace App\Http\Controllers;

use App\DeliveryCost\DeliveryCost;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(Request $request): void
    {
        $delivery1 = new DeliveryCost(2, 20, 10, 20);
        var_dump($delivery1->calculateDelivery(), $delivery1->getPriceType());
        $delivery2 = new DeliveryCost(8, 20, 10, 20);
        var_dump($delivery2->calculateDelivery(), $delivery2->getPriceType());
        $delivery3 = new DeliveryCost(2, 20, 10, 20, 300);
        var_dump($delivery3->calculateDelivery(), $delivery3->getPriceType());
        die();
    }
}
