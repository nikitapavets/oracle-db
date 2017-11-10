<?php

namespace App\Http\Controllers\Web;

use App\Models\Basket;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function statistics()
    {
        $baskets = Basket::all();
        $statistics = [];
        $resultStatistics = [];
        $resultBrands = [];

        foreach ($baskets as $basket) {
            $statistics[$basket->notebook->brand->id][] = 1;
        }

        foreach ($statistics as $brandId => $notebooks) {
            $resultStatistics[] = [
                'x' => $brandId,
                'y' => count($notebooks),
            ];
            $resultBrands[] = Brand::find($brandId)->title;
        }

        return response()->view('statistics', [
            'statistics' => $resultStatistics,
            'brands' => $resultBrands,
        ]);
    }
}
