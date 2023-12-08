<?php

namespace App\Http\Controllers\Antiques\ProductFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TypeController extends Controller
{
    public function index() {

        return view('antiques.product_files.type.index');
    }

    public function edit() {

        return view('antiques.product_files.type.edit');
    }
}
