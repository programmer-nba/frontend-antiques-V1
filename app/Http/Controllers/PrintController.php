<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Http;

class PrintController extends Controller
{
    public function index(){
        //
        // $response = Http::post(env('DEV_API').'/v1/report/receiptorder', [
        //     'orderId' =>request()->id
        // ]);

        // $data = $response->json()["data"];
        $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/receiptorder', [
            'orderId' =>request()->id
        ]);
        $data = $response->json()["data"];

        // dd($data);
        return view('antiques_user.print.report', compact('data'));
    }
    public function generate()
    {
        $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/v1/report/receiptorder', [
            'orderId' =>request()->id
        ]);

        $data = $response->json()["data"];
        $pdf = PDF::loadView('antiques_user.print.report', $data);
        return  $pdf->stream();

        // $response = Http::post(env('DEV_API').'/v1/report/receiptorder', [
        //     'orderId' =>request()->id
        // ]);


        // $pdf = PDF::loadView('antiques_user.print.report', ['data' => $response->json()]);
        // return $pdf->download('demo.pdf');
    }

    public function queue(){
        $pdf = PDF::loadView('antiques_user.print.queue');
        return $pdf->stream();

    }

    public function receiptCashBill(){



        $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/receiptcashbill', [
            'orderId' =>request()->id
        ]);


        $data = $response->json()["data"];

        // $data = [
        //     [
        //         'quantity' => 1,
        //         'description' => '1 Year Subscription',
        //         'price' => '129.00'
        //     ]
        // ];
        return view('print.reciept_cash_bill', ['data' => $data]);

        $pdf = PDF::loadView('print.reciept_cash_bill', ['data' => $data])->setOption('fontDir', public_path('/fonts'));


        return $pdf->stream();
    }

    public function summaryreportbyproduct(){

        $data  = [];

        if(!empty(request()->datestart) && !empty(request()->datestop)){
            $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/purchasesummary', [
                'StartDate' =>request()->datestart,
                'EndDate' =>request()->datestop
            ]);

            $data = $response->json()["data"];
        }



        return view('print.purchase_summary', compact('data'));

    }

    public function orderSummaryReportByDate(){

        $data  = [];

        if(!empty(request()->datestart) && !empty(request()->datestop)){
            $response = Http::withOptions(["verify"=>false])->post(env('DEV_API').'/report/ordersummaryreportbydate', [
                'StartDate' =>request()->datestart,
                'EndDate' =>request()->datestop
            ]);

            $data = $response->json()["data"];
        }


        return view('print.ordersummaryreportbydate',compact('data'));
    }
}
