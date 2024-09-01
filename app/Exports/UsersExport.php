<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Email',
            'Departments',
            'Last Update',
            'Date Created',
        ];
    }
    public function map($user): array
        {
            return [
                $user->id,
                $user->name,
                $user->email,
                $user->department ? $user->department->name : 'N/A', // Assuming department relationship
                $user->updated_at ? $user->updated_at->format('Y-m-d H:i:s') : 'N/A',
                $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : 'N/A',
            ];
        }

        public function styles(Worksheet $sheet)
    {
        // Set header row background color to green and text to white
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'], // White color for text
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF00FF00'], // Green color for background
            ],
        ];
        $sheet->getStyle('1:1')->applyFromArray($headerStyle);

        // Set body rows background color to green and text to white
        $bodyStyle = [
            'font' => [
                'color' => ['argb' => 'FFFFFFFF'], // White color for text
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF00FF00'], // Green color for background
            ],
        ];
        $sheet->getStyle('A2:F' . $sheet->getHighestRow())->applyFromArray($bodyStyle);

        // Optional: Set column widths for better readability
        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);

        return [
            // Optional: Set default cell alignment if needed
            'A:F' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }

}
