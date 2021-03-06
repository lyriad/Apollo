<div class="md:col-span-2" x-data="{toggleWeight: false}">
    <div class="mb-3 flex justify-between">
        <h3 class="text-2xl font-bold">{!!isset($patient) ? "Patient Id: <span class=\"font-normal\">{$patient->hid}</span>" : 'Add new patient'!!}</h3>
    </div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input wire:model="name" id="name" name="name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') ring-2 ring-offset-0 ring-red-500 @enderror">
                    @error('name') <x-error-msg :message="$message"></x-error-msg> @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                    <input wire:model="birthdate" id="birthdate" name="birthdate" type="date"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('birthdate') ring-2 ring-offset-0 ring-red-500 @enderror">
                    @error('birthdate') <x-error-msg :message="$message"></x-error-msg> @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select wire:model="gender" id="gender" name="gender"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('gender') ring-2 ring-offset-0 ring-red-500 @enderror">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender') <x-error-msg :message="$message"></x-error-msg> @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                    <div class="flex">
                        <input wire:model="weight" id="weight" name="weight" type="number" min="0.00" step="0.01"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 inline-block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('weight') ring-2 ring-offset-0 ring-red-500 @enderror">
                        <div class="flex justify-center items-center" wire:click="toggleWeightUnit">
                            <div class="w-20 h-9 flex items-center bg-blue-700 rounded-md mx-3 px-1">
                                <div class="bg-white w-8 h-7 rounded-md shadow-md transition transform text-center items-center {{$weight_unit == 'lb' ? 'translate-x-10' : ''}}">
                                    <span class="text-sm font-medium text-gray-600">{{$weight_unit == 'lb' ? 'Lb' : 'Kg'}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('weight') <x-error-msg :message="$message"></x-error-msg> @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="height" class="block text-sm font-medium text-gray-700">Height (Cm)</label>
                    <input wire:model="height" id="height" name="height" type="number" min="0.00" step="0.01"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('height') ring-2 ring-offset-0 ring-red-500 @enderror">
                    @error('height') <x-error-msg :message="$message"></x-error-msg> @enderror
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <label for="observations" class="block text-sm font-medium text-gray-700">Observations</label>
                    <textarea wire:model="observations" id="observations" name="observations" rows="5" class="shadow-sm resize-none focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md @error('observations') ring-2 ring-offset-0 ring-red-500 @enderror"></textarea>
                    @error('observations') <x-error-msg :message="$message"></x-error-msg> @enderror
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button wire:click="save" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                Save
            </button>
        </div>
    </div>
</div>