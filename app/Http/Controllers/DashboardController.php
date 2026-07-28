<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\Category;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAssets = Asset::count();

        $availableAssets = Asset::where('status', 'Available')->count();

        $assignedAssets = Asset::where('status', 'Assigned')->count();

        $maintenanceAssets = Asset::where('status', 'Maintenance')->count();

        $totalEmployees = Employee::count();

        $totalCategories = Category::count();

        $recentAssignments = AssetAssignment::with(['asset', 'employee'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalAssets',
            'availableAssets',
            'assignedAssets',
            'maintenanceAssets',
            'totalEmployees',
            'totalCategories',
            'recentAssignments'
        ));
    }
}