<?php

namespace App\Http\Controllers\Web;

use App\Models\Basket;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function statistics(Request $request)
    {
        $start_at = $request->start_at;
        $end_at = $request->end_at;

        $baskets = DB::select('
            SELECT brands.id AS brand_id
            FROM baskets
            INNER JOIN notebooks ON notebooks.id = baskets.notebook_id
            INNER JOIN brands ON brands.id = notebooks.brand_id
            WHERE baskets.created_at BETWEEN ? AND ?
        ', [$start_at, $end_at]);

        $statistics = [];
        $resultStatistics = [];
        $resultBrands = [];

        foreach ($baskets as $basket) {
            $statistics[$basket->brand_id][] = 1;
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
