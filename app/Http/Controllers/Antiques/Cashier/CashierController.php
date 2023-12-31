<?php

namespace App\Http\Controllers\Antiques\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CashierController extends Controller
{
    public function index() {
        $response = Http::withOptions(["verify"=>false])->get(env('DEV_API').'/get');
        $categorys = $response->json()["data"];

        return view('antiques_cashier.index', compact('categorys'));
    }
}
