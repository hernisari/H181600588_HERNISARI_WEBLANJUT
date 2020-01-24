<?php

namespace App\Http\Controllers;

use App\KategoriPengumuman;
use Illuminate\Http\Request;

class KategoriPengumumanAPIController extends Controller
{
    //
    public function index()
    {
        $kategoriPengumumans=KategoriPengumuman::orderBy('id','desc')->get();

        return $kategoriPengumumans;
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $kategoriPengumuman=KategoriPengumuman::create($input);

        return $kategoriPengumuman;
    }

    public function show($id)
    {
        $kategoriPengumuman=KategoriPengumuman::find($id);
        return $kategoriPengumuman;

    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $kategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($kategoriPengumuman)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }
        $kategoriPengumuman->update($input);
        return response()->json($kategoriPengumuman);
    }

    public function destroy($id)
    {
        $kategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($kategoriPengumuman)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }

        $kategoriPengumumansss->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }
}
