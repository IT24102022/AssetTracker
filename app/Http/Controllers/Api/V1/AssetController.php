<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with('category')
            ->where('status', 'Available')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Available assets retrieved successfully.',
            'data' => $assets->through(function ($asset) {
                return [
                    'asset_code' => $asset->asset_code,
                    'name' => $asset->name,
                    'category' => $asset->category->name,
                    'serial_number' => $asset->serial_number,
                    'status' => $asset->status,
                ];
            }),
            'pagination' => [
                'current_page' => $assets->currentPage(),
                'last_page' => $assets->lastPage(),
                'per_page' => $assets->perPage(),
                'total' => $assets->total(),
            ],
        ]);
    }
}