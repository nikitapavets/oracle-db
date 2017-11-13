<?php

namespace App\Http\Controllers\Web;

use App\Models\City;
use App\Models\Notebook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function create()
    {
        $cities = City::all();
        $notebooks = Notebook::all();

        return response()->view('basket.create', [
            'notebooks' => $notebooks,
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            DB::insert('
                INSERT INTO customers(
                  first_name,
                  last_name,
                  email,
                  password,
                  city_id)
                VALUES(?, ?, ?, ?, ?)
            ', [
                $request->customer_first_name,
                $request->customer_last_name,
                $request->customer_email,
                bcrypt($request->customer_password),
                $request->customer_city_id,
            ]);
            DB::insert('
                INSERT INTO baskets(
                  customer_id,
                  notebook_id,
                  quantity,
                  discount,
                  created_at,
                  updated_at)
                VALUES((SELECT MAX(id) FROM customers), ?, ?, 0, ?, ?)
            ', [
                $request->product_notebook_id,
                $request->product_quantity,
                Carbon::now(),
                Carbon::now(),
            ]);
        }, 5);

        return redirect()->route('statistics');
    }
}
