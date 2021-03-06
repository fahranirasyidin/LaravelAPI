<?php

namespace App\Http\Controllers;

use App\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriberita=KategoriBerita::all();

        return $kategoriberita;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->orderBy('id','desc')->get();

        $kategoriberita=KategoriBerita::create($input);

        return $kategoriberita;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoriberita=KategoriBerita::find($id);

        return $kategoriberita;
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
        $input=$request->all();

        $kategoriberita=KategoriBerita::find($id);

        if(empty($kategoriberita)){
            return response()->json(['message'=>'data tidak ditemukan'], 404);
        }
            $kategoriberita->update($input);

            return response()->json($kategoriberita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriberita=KategoriBerita::find($id);

        if(empty($kategoriberita)){
            return response()->json(['message'=>'data tidak ditemukan'], 404);
        }
        $kategoriberita->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }
}
