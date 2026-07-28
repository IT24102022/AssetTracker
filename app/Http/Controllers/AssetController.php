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
        ->latest()
        ->get();

    return view('assets.index', compact('assets'));
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
}
