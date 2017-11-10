<?php

namespace App\Http\Controllers\Web;

use App\Models\Basket;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Notebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasketController extends Controller
{
    public function create()
    {
        $notebooks = Notebook::all();
        $customers = Customer::all();

        return response()->view('basket.create', [
            'notebooks' => $notebooks,
            'customers' => $customers,
        ]);
    }
}
