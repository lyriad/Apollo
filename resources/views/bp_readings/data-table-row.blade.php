<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->nurse->name}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->systolic}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{ucfirst($row->diastolic)}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium">
        <x-bp-reading-category :category="$row->category"/>
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="whitespace-nowrap font-medium text-gray-700">
        {{$row->created_at->format('m/d/Y')}}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <button wire:click="$emit('bpreading-form-open', '{{$row->hid}}')" class="bg-purple-100 text-purple-600 font-medium px-2 py-1 rounded-full hover:bg-purple-600 hover:text-purple-100">
        Manage
    </button>
</x-livewire-tables::table.cell>
