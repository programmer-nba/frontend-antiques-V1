<?php

namespace App\Http\Controllers\Antiques\ProductFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get(env('DEV_API').'/v1/antiques/get');
        $categorys = $response->json()["data"];

       return view('antiques.product_files.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $response = Http::post(env('DEV_API').'/v1/antiques/CreateCategory', [
            'category_name_th' => $request->get('category_name_th'),
            'category_name_en' => $request->get('category_name_en'),
        ]);

        // dd($response->json());

        return redirect()->route('product_files.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $response = Http::get(env('DEV_API').'/v1/antiques/getbyid', [




        //     '_id' => $id,
        // ]);
        $param['_id']   = $id;

        $response = Http::withBody(json_encode($param),'application/json')->get(env('DEV_API').'/v1/antiques/getbyid');

        $categorys = $response->json()["data"];

       return view('antiques.product_files.category.edit', compact('categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = Http::put(env('DEV_API').'/v1/antiques/update', [
            'category_id' => $id,
            'category_name_en' => $request->get('category_name_en'),
            'category_name_th' => $request->get('category_name_th'),
        ]);


        return redirect()->route('product_files.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete(env('DEV_API').'/v1/antiques/delete', [
            '_id' => $id
        ]);


        return redirect()->route('product_files.index');
    }
}
