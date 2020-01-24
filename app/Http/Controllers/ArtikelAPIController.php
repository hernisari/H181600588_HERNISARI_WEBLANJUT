<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelAPIController extends Controller
{
    public function index()
    {
        $artikels=Artikel::orderBy('id','desc')->get();

        return $artikels;
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $artikel=Artikel::create($input);

        return $artikel;
    }

    public function show($id)
    {
        $artikel=Artikel::find($id);
        return $artikel;

    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $artikel=Artikel::find($id);

        if(empty($artikel)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }
        $artikel->update($input);
        return response()->json($artikel);
    }

    public function destroy($id)
    {
        $artikel=Artikel::find($id);

        if(empty($artikel)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }

        $artikel->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }

}
