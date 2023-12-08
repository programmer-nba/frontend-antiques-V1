<?php

namespace App\Http\Controllers\Antiques\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CashierController extends Controller
{
    public function index() {
        $response = Http::get(env('DEV_API').'/v1/antiques/get');
        $categorys = $response->json()["data"];

        return view('antiques_cashier.index', compact('categorys'));
    }
}
