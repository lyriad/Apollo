<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PatientsExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Patient::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Birthdate',
            'Gender',
            'Weight (Kg)',
            'Height (Cm)',
            'Register date'
        ];
    }

    public function map($patient): array
    {
        return [
            $patient->id,
            $patient->name,
            Date::dateTimeToExcel($patient->birthdate),
            ucfirst($patient->gender),
            $patient->weight_kg,
            $patient->height_cm,
            Date::dateTimeToExcel($patient->created_at),
        ];
    }   
}
