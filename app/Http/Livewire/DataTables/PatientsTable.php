<?php

namespace App\Http\Livewire\DataTables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use App\Exports\PatientsExport;
use Maatwebsite\Excel\Excel;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;

class PatientsTable extends DataTableComponent
{
    public string $primaryKey = 'hid';

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    protected string $pageName = 'patients';
    protected string $tableName = 'patients';

    public function exportSelected()
    {
        return (new PatientsExport)->download('patients.csv', Excel::CSV);
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')->searchable()->sortable(),
            Column::make('Birthdate', 'birthdate')->format(fn ($value) => $value->format('m/d/Y')),
            Column::make('Age', 'age'),
            Column::make('Gender', 'gender')->format(fn ($value) => ucfirst($value)),
            Column::make('Weight (Kg)', 'weight_kg')->sortable(),
            Column::make('Height (Cm)', 'height_cm')->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Patient::query();
    }
}
