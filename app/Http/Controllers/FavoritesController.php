<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('spot')->get();

        return view('front.my_favorite', compact('favorites'));
    }


    public function store(Request $req)
    {
        $favorite = Favorite::where('spotId', $req->spotId)->first();

        if ($favorite) {
            return response()->json([
                'success' => false,
                'message' => '這個景點已經收藏過了！'
            ]);
        }

        Favorite::create([
            'spotId' => $req->spotId
        ]);

        return response()->json([
            'success' => true,
            'message' => '收藏成功！'
        ]);
    }
    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);

        $favorite->delete();

        return redirect()->back();
    }
}
