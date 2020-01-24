<?php

namespace App\Http\Controllers;

use App\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelAPIController extends Controller
{
    //
    public function index()
    {
        $kategoriArtikels=KategoriArtikel::orderBy('id','desc')->get();

        return $kategoriArtikels;
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $kategoriArtikel=KategoriArtikel::create($input);

        return $kategoriArtikel;
    }

    public function show($id)
    {
        $kategoriArtikel=KategoriArtikel::find($id);
        return $kategoriArtikel;

    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $kategoriArtikel=KategoriArtikel::find($id);

        if(empty($kategoriArtikel)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }
        $kategoriArtikel->update($input);
        return response()->json($kategoriArtikel);
    }

    public function destroy($id)
    {
        $kategoriArtikel=KategoriArtikel::find($id);

        if(empty($kategoriArtikel)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }

        $kategoriArtikel->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }
}
