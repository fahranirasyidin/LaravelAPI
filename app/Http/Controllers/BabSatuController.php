<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Artikel;
use App\Pengumuman;

class BabSatuController extends Controller
{
    public function a1(){
        $artikel=Artikel::where('id',1)->where('users_id',3)->get();

        return $artikel;
  }
    public function a2(){
        $artikel=Artikel::where('id',2)->where('users_id',5)->get();

        return $artikel;
    }

    public function a3(){
        $artikel=Artikel::where('id',3)->whereHas('user',function($query){
            $query->where('name','rani');
        })->with('user')->get();

        return $artikel;
    }

    public function a4(){
        $artikel=Pengumuman::whereHas('user',function($query){
            $query->where('galeri',function($query){
                $query->where('id',2);
            });
        })->with('user')->get();

        return $pengumuman;
    }
}
