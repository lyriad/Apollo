@extends('app')
@section('slot')
    <div class="mt-10 sm:mt-0">
        <livewire:patients.form :patient_id="$patient_id" />
    </div>
@endsection
