<?php

namespace App\Exports;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AssetsExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles,
    WithEvents,
    WithColumnFormatting
{
    public function collection(): Collection
    {
        return Asset::with('category')->get();
    }

    public function headings(): array
    {
        return [
            'Asset Code',
            'Asset Name',
            'Category',
            'Serial Number',
            'Purchase Date',
            'Cost',
            'Status',
        ];
    }

    public function map($asset): array
    {
        return [
            $asset->asset_code,
            $asset->name,
            $asset->category?->name,
            $asset->serial_number,
            $asset->purchase_date,
            $asset->cost,
            ucfirst($asset->status),
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
            $event->sheet->setAutoFilter('A1:G' . $event->sheet->getHighestRow());

        },
    ];
}
public function columnFormats(): array
{
    return [
        'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
    ];
}
}
