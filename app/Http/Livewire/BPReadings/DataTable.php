<?php

namespace App\Http\Livewire\BPReadings;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Repositories\PatientRepository;
use App\Models\BPReading;

class DataTable extends DataTableComponent
{
    public string $patient_hid;
    public string $primaryKey = 'hid';

    protected string $pageName = 'readings';
    protected string $tableName = 'readings';
    
    protected $listeners = [
        'refreshDatatable' => '$refresh',
        'bpreadings-table-reset' => 'resetAll'
    ];

    public function columns(): array
    {
        return [
            Column::make('Nurse', 'nurse.name')->searchable(),
            Column::make('Systolic', 'systolic'),
            Column::make('Diastolic', 'diastolic'),
            Column::make('Category', 'category'),
            Column::make('Date', 'created_at')
        ];
    }

    public function query(): Builder
    {
        $patient_id = PatientRepository::findIdByHid($this->patient_hid ?? '');
        return BPReading::query()
            ->when($this->patient_hid, fn ($query) => $query->where('patient_id', $patient_id));
    }

    
    public function rowView(): string
    {
        return 'bp_readings.data-table-row';
    }
}
