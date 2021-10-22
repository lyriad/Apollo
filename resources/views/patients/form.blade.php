@extends('app')
@section('slot')
    <div class="p-0 md:p-30 sm:p-10">
        <livewire:patients.form :patient_hid="$patient_hid" />
        <div id="patients-table-container" class="mt-10">
            <div class="mb-3 flex justify-between">
                <h2 class="text-2xl font-bold">Blood pressure readings</h2>
                <a href="{{route('patients.create')}}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add new
                  </a>
            </div>
            <livewire:data-tables.b-p-reading-table :patient_hid="$patient_hid" />
        </div>
    </div>
@endsection
