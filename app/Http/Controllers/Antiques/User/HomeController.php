<?php

namespace App\Http\Controllers\Antiques\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        $response = Http::get(env('DEV_API').'/v1/antiques/get');
        $categorys = $response->json()["data"];

        return view('antiques_user.index', compact('categorys'));


    }
}
