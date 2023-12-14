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
        $data  = [];

        if(!empty(request()->datestart) && !empty(request()->datestop)){
            $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/purchasesummary', [
                'StartDate' =>request()->datestart,
                'EndDate' =>request()->datestop
            ]);

            $data = $response->json()["data"];
        }
        dd($data);

        return view('DASHBOARD_ADMIN.purchasesummary.index', compact('data'));
    }


    public function summaryreportbydate (){

        $data  = [];

            $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/ordersummaryreportbydate', [
                'StartDate' =>request()->datestart ?? "",
                'EndDate' =>request()->datestop ?? ""
            ]);

            $data = $response->json()["data"];




        // dd($data);


        return view('DASHBOARD_ADMIN.ordersummaryreportbydate.index', compact('data'));
    }

    public function ordersummaryreportbynumber(){
        $data  = [];

        return view('DASHBOARD_ADMIN.ordersummaryreportbynumber.index', compact('data'));

    }

    public function summaryReportByProduct(){
        $data  = [];

            $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/purchasesummary', [
                'StartDate' =>request()->datestart ?? "",
                'EndDate' =>request()->datestop ?? ""
            ]);

            $data = $response->json()["data"];


        return view('DASHBOARD_ADMIN.summaryreportbyproduct.index', compact('data'));

    }

    public function dashboard(){

        return view('DASHBOARD_ADMIN.dashboard.index');
    }
}
