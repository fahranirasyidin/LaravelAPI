<?php

namespace App\Http\Controllers;

use App\KategoriPengumuman;
use Illuminate\Http\Request;

class KategoriPengumumanAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoripengumuman=KategoriPengumuman::all();

        return $kategoripengumuman;
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

        $kategoripengumuman=KategoriPengumuman::create($input);

        return $kategoripengumuman;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoripengumuman=KategoriPengumuman::find($id);

        return $kategoripengumuman;
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

        $kategoripengumuman=KategoriPengumuman::find($id);

        if(empty($kategoripengumuman)){
            return response()->json(['message'=>'data tidak ditemukan'], 404);
        }
            $kategoripengumuman->update($input);

            return response()->json($kategoripengumuman);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoripengumuman=KategoriPengumuman::find($id);

        if(empty($kategoripengumuman)){
            return response()->json(['message'=>'data tidak ditemukan'], 404);
        }
        $kategoripengumuman->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }
}
