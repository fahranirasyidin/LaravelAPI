<?php

namespace App\Http\Controllers;

use App\KategoriGaleri;
use Illuminate\Http\Request;

class KategoriGaleriAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorigaleri=KategoriGaleri::all();

        return $kategorigaleri;
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

        $kategorigaleri=KategoriGaleri::create($input);

        return $kategorigaleri;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategorigaleri=KategoriGaleri::find($id);

        return $kategorigaleri;
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

        $kategorigaleri=KategoriGaleri::find($id);

        if(empty($kategorigaleri)){
            return response()->json(['message'=>'data tidak ditemukan'], 404);
        }
            $kategorigaleri->update($input);

            return response()->json($kategorigaleri);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategorigaleri=KategoriGaleri::find($id);

        if(empty($kategorigaleri)){
            return response()->json(['message'=>'data tidak ditemukan'], 404);
        }
        $kategorigaleri->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }
}
