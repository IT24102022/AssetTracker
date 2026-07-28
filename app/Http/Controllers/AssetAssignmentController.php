<?php

namespace App\Http\Controllers;

use App\Models\AssetAssignment;
use App\Models\Asset;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssetAssignmentRequest;

class AssetAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $assignments = AssetAssignment::with(['asset', 'employee'])
        ->latest()
        ->get();

    return view('asset_assignments.index', compact('assignments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $assets = Asset::where('status', 'Available')
        ->orderBy('name')
        ->get();

    $employees = Employee::where('is_active', true)
        ->orderBy('name')
        ->get();

    return view('asset_assignments.create', compact('assets', 'employees'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssetAssignmentRequest $request)
{
    $asset = Asset::findOrFail($request->asset_id);

    if ($asset->status != 'Available') {

        return back()
            ->withErrors([
                'asset_id' => 'This asset cannot be assigned.'
            ]);
    }

    $employee = Employee::findOrFail($request->employee_id);

    if (!$employee->is_active) {

        return back()
            ->withErrors([
                'employee_id' => 'Employee is inactive.'
            ]);
    }

    AssetAssignment::create([

        'asset_id'=>$asset->id,

        'employee_id'=>$employee->id,

        'assigned_at'=>$request->assigned_at,

        'notes'=>$request->notes,

        'created_by'=>auth()->id(),

    ]);

    $asset->update([

        'status'=>'Assigned'

    ]);

    return redirect()
        ->route('asset-assignments.index')
        ->with('success','Asset assigned successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(AssetAssignment $assetAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetAssignment $assetAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetAssignment $assetAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetAssignment $assetAssignment)
    {
        //
    }
public function return(AssetAssignment $asset_assignment)
{
    if ($asset_assignment->returned_at) {

        return back()->withErrors([
            'assignment' => 'This asset has already been returned.'
        ]);
    }

    $asset_assignment->update([

        'returned_at' => now()

    ]);

    $asset_assignment->asset->update([

        'status' => 'Available'

    ]);

    return redirect()
        ->route('asset-assignments.index')
        ->with('success', 'Asset returned successfully.');
}

public function history()
{
    $assignments = AssetAssignment::with([
            'asset',
            'employee'
        ])
        ->latest()
        ->paginate(10);

    return view(
        'asset_assignments.history',
        compact('assignments')
    );
}
    
}
