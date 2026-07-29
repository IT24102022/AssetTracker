<?php

namespace App\Exports;

use App\Models\AssetAssignment;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AssignmentHistoryExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles,
    WithEvents
{
    public function collection(): Collection
    {
        return AssetAssignment::with(['asset', 'employee'])->get();
    }

    public function headings(): array
    {
        return [
            'Asset Code',
            'Asset Name',
            'Employee',
            'Assigned Date',
            'Returned Date',
            'Notes',
        ];
    }

    public function map($assignment): array
    {
        return [
            $assignment->asset?->asset_code,
            $assignment->asset?->name,
            $assignment->employee?->name,
            $assignment->assigned_at,
            $assignment->returned_at ?? 'Not Returned',
            $assignment->notes,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '198754'],
                ],
            ],
        ];
    }
    public function registerEvents(): array
{
    return [
        AfterSheet::class => function (AfterSheet $event) {

            // Freeze the header row
            $event->sheet->freezePane('A2');

            // Enable Auto Filter
            $event->sheet->setAutoFilter(
                'A1:' . $event->sheet->getHighestColumn() . $event->sheet->getHighestRow()
            );

        },
    ];
}
}