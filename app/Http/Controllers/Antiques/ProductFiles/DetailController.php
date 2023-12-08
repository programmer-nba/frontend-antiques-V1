<?php

namespace App\Http\Controllers\Antiques\ProductFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailController extends Controller
{
    public function index(){

        return view('antiques.product_files.detail.index');
    }

    public function edit() {

        return view('antiques.product_files.detail.edit');
    }
}
