<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotApiController extends Controller
{
    // GET /api/spots
    // 查詢所有景點
    public function index()
    {
        $spots = Spot::all();

        return response()->json([
            'status' => 'success',
            'message' => '景點查詢成功',
            'data' => $spots
        ], 200);
    }

    // POST /api/spots
    // 新增景點
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        $spot = Spot::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => '景點新增成功',
            'data' => $spot
        ], 201);
    }

    // PUT /api/spots/{id}
    // 修改景點
    public function update(Request $request, $id)
    {
        $spot = Spot::find($id);

        if (!$spot) {
            return response()->json([
                'status' => 'error',
                'message' => '找不到此景點'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'subtitle' => 'nullable|string',
            'summary' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        $spot->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => '景點修改成功',
            'data' => $spot
        ], 200);
    }

    // DELETE /api/spots/{id}
    // 刪除景點
    public function destroy($id)
    {
        $spot = Spot::find($id);

        if (!$spot) {
            return response()->json([
                'status' => 'error',
                'message' => '找不到此景點'
            ], 404);
        }

        $spot->delete();

        return response()->json([
            'status' => 'success',
            'message' => '景點刪除成功'
        ], 200);
    }
}
