@extends('app')
@section('slot')
    <div id="patients-table-container" class="py-8 px-6">
        <livewire:data-tables.patients-table />
    </div>
@endsection