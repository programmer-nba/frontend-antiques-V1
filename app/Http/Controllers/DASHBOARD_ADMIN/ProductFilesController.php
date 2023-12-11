<?php

namespace App\Http\Controllers\DASHBOARD_ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductFilesController extends Controller
{

    public function index(){

        return view('DASHBOARD_ADMIN.product_files.index');
    }

    public function purchasesummary(){

        $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/receiptcashbill', [
            'orderId' =>request()->id
        ]);


        $data = $response->json()["data"];

        dd($data);

        return view('DASHBOARD_ADMIN.purchasesummary.index');
    }


    public function ordersummaryreportbydate(){

        return view('DASHBOARD_ADMIN.ordersummaryreportbydate.index');
    }
}
