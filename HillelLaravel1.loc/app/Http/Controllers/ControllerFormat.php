<?php

namespace App\Http\Controllers;

use App\FormatData\Context;
use App\FormatData\FormatDataStrategyOne;
use App\FormatData\FormatDataStrategyTwo;
use Illuminate\Http\Request;
class ControllerFormat
{
    public function index(Request $request): void
    {
        $cars = [
            (object) ['brandName' => 'Ford', 'model' => 'Mustang', 'modelDetails' => 'GT rest 2', 'modelYear' => 2014, 'productionYear' => 2013, 'color' => 'Oxford White'],
            (object) ['brandName' => 'BMW', 'model' => '520i', 'modelDetails' => 'rest', 'modelYear' => 2001, 'productionYear' => 2001, 'color' => 'Green'],
            (object) ['brandName' => 'Opel', 'model' => 'GrandLand', 'modelDetails' => 'GS Pack', 'modelYear' => 2017, 'productionYear' => 2023, 'color' => 'Silver'],
            (object) ['brandName' => 'Mazda', 'model' => 'Mazda2', 'modelDetails' => 'Demio', 'modelYear' => 2019, 'productionYear' => 2023, 'color' => 'Yellow'],
        ];

        $context = new Context(new FormatDataStrategyOne(), $cars);
        $resultOne = $context->executeStrategy();

        $context = new Context(new FormatDataStrategyTwo(), $cars);
        $resultTwo = $context->executeStrategy();

        var_dump($resultOne, $resultTwo);
    }
}
