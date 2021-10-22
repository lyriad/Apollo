<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->name}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->birthdate->format('m/d/Y')}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->age}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{ucfirst($row->gender)}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium ext-gray-700">
        {{$row->weight_kg}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->height_cm}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <a href="{{route('patients.update', [ 'hid' => $row->hid ])}}" class="bg-purple-100 text-purple-600 font-medium px-2 py-1 rounded-full hover:bg-purple-600 hover:text-purple-100">
        Manage
    </a>
</x-livewire-tables::table.cell>
