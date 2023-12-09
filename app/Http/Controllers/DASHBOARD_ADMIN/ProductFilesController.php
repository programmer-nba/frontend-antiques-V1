<?php

namespace App\Http\Controllers\DASHBOARD_ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductFilesController extends Controller
{

    public function index(){

        return view('DASHBOARD_ADMIN.product_files.index');
    }

    public function purchasesummary(){

        return view('DASHBOARD_ADMIN.purchasesummary.index');
    }


    public function ordersummaryreportbydate(){

        return view('DASHBOARD_ADMIN.ordersummaryreportbydate.index');
    }
}
