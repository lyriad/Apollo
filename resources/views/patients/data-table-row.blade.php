<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->name}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{is_null($row->birthdate) ? '-' : $row->birthdate->format('m/d/Y')}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{is_null($row->birthdate) ? '-' : $row->age}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{ucfirst($row->gender)}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium ext-gray-700">
        {{$row->weight_kg <= 0 ? '-' : $row->weight_kg}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->height_cm <= 0 ? '-' : $row->height_cm}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        @if($row->bpReadings()->exists())
        <x-bpreading-category :category="$row->bpReadings()->latest()->first()->category" />
        @endif
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <a href="{{route('patients.update', [ 'hid' => $row->hid ])}}" class="bg-purple-100 text-purple-600 font-medium px-2 py-1 rounded-full hover:bg-purple-600 hover:text-purple-100">
        Manage
    </a>
</x-livewire-tables::table.cell>
