<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Spot;

class SpotController extends Controller
{
    public function list()
    {
        $spots = Spot::all();
        return view('front.travel_list', compact('spots'));
    }

    public function detail(int $id)
    {
        $spot = Spot::find($id);
        return view('front.travel_list_detail', compact('spot'));
    }

    public function adminList()
    {
        $spots = Spot::all();

        return view('admin.spots.list', compact('spots'));
    }

    public function create()
    {
        return view('admin.spots.create');
    }

    public function store(Request $req)
    {
        Favorite::create([
            'spotId' => $req->spotId
        ]);

        return response()->json([
            'success' => true,
            'message' => '收藏成功！'
        ]);
    }
    public function edit($id)
    {
        $spot = Spot::find($id);

        return view('admin.spots.edit', compact('spot'));
    }

    public function update(Request $request, $id)
    {
        $spot = Spot::find($id);

        $spot->update($request->all());

        return redirect('/admin/spots');
    }

    public function destroy($id)
    {
        $spot = Spot::find($id);

        $spot->delete();

        return redirect('/admin/spots');
    }
}
