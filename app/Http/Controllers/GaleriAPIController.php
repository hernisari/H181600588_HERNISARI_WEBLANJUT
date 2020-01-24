<?php

namespace App\Http\Controllers;

use App\Galeri;
use Illuminate\Http\Request;

class GaleriAPIController extends Controller
{
    //
    public function index()
    {
        $galeris=Galeri::orderBy('id','desc')->get();

        return $galeris;
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $galeri=Galeri::create($input);

        return $galeri;
    }

    public function show($id)
    {
        $galeri=Galeri::find($id);
        return $galeri;

    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $galeri=Galeri::find($id);

        if(empty($galeri)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }
        $galeri->update($input);
        return response()->json($galeri);
    }

    public function destroy($id)
    {
        $galeri=Galeri::find($id);

        if(empty($galeri)){
            return response()->json(['message'=>'data tidak di temukan'],404);
        }

        $galeri->delete();

        return response()->json(['message'=>'data telah dihapus']);
    }

}
