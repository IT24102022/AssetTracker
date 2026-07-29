<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;


class AssetController extends Controller
{
    public function index()
{
    $assets = Asset::with('category')
        ->when(request('search'), function ($query) {
            $query->where('asset_code', 'like', '%' . request('search') . '%')
                  ->orWhere('name', 'like', '%' . request('search') . '%')
                  ->orWhere('serial_number', 'like', '%' . request('search') . '%');
        })
        ->when(request('category'), function ($query) {
            $query->where('category_id', request('category'));
        })
        ->when(request('status'), function ($query) {
            $query->where('status', request('status'));
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $categories = Category::orderBy('name')->get();

    return view('assets.index', compact('assets', 'categories'));
}

public function create()
{
    $categories = Category::orderBy('name')->get();

    return view('assets.create', compact('categories'));
}

public function store(StoreAssetRequest $request)
{
    Asset::create($request->validated());

    return redirect()
        ->route('assets.index')
        ->with('success', 'Asset created successfully.');
}

public function edit(Asset $asset)
{
    $categories = Category::orderBy('name')->get();

    return view('assets.edit', compact('asset', 'categories'));
}

public function update(UpdateAssetRequest $request, Asset $asset)
{
    $asset->update($request->validated());

    return redirect()
        ->route('assets.index')
        ->with('success', 'Asset updated successfully.');
}

public function destroy(Asset $asset)
{
    $asset->delete();

    return redirect()
        ->route('assets.index')
        ->with('success', 'Asset deleted successfully.');
}

public function publicShow(\App\Models\Asset $asset)
{
    $asset->load('category');

    return view('assets.public-show', compact('asset'));
}

}
