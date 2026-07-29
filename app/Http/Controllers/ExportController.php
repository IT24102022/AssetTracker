<?php

namespace App\Http\Controllers;

use App\Exports\AssetsExport;
use App\Exports\AssignmentHistoryExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function assets()
    {
        return Excel::download(
            new AssetsExport(),
            'Assets_Report_' . now()->format('Y-m-d_H-i-s') . '.xlsx'
        );
    }

    public function assignmentHistory()
    {
        return Excel::download(
            new AssignmentHistoryExport(),
            'Assignment_History_' . now()->format('Y-m-d_H-i-s') . '.xlsx'
        );
    }
}