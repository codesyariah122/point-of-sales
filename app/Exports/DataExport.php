<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DataExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMapping
{
    use Exportable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Penjualan',
            'Pembelian',
            'Pengeluaran',
            'Pendapatan',
        ];
    }

    public function map($row): array
    {
        return [
            $row['DT_RowIndex'],
            $row['tanggal'],
            'Rp ' . number_format((float)$row['penjualan'], 2, ',', '.'),
            'Rp ' . number_format((float)$row['pembelian'], 2, ',', '.'),
            'Rp ' . number_format((float)$row['pengeluaran'], 2, ',', '.'),
            'Rp ' . number_format((float)$row['pendapatan'], 2, ',', '.'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}