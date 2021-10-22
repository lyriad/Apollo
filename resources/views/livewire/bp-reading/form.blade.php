<div class="{{ $is_open ? '' : 'hidden' }} fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="px-4 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="py-3">
                <h3 class="text-2xl font-normal">Add blood pressure reading for patient: {{$patient_name}}</h3>
            </div>
            <div class="py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="systolic" class="block text-sm font-medium text-gray-700">Systolic value</label>
                        <input type="number" name="systolic" id="systolic" wire:model.debounce.250ms="systolic" min="0"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('systolic') ring-2 ring-offset-0 ring-red-500 @enderror">
                        @error('systolic') <x-error-msg :message="$message"></x-error-msg> @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="diastolic" class="block text-sm font-medium text-gray-700">Diastolic value</label>
                        <input type="number" name="diastolic" id="diastolic" wire:model.debounce.250ms="diastolic" min="0"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('diastolic') ring-2 ring-offset-0 ring-red-500 @enderror">
                        @error('diastolic') <x-error-msg :message="$message"></x-error-msg> @enderror
                    </div>
                    <div class="col-span-6">
                        <x-bpreading-category :category="$category" :size="'lg'" />
                    </div>
                    <div class="col-span-6">
                        <p class="font-medium text-center">Taken {{$date->format('M d, Y');}}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 py-3 sm:px-6 sm:flex sm:justify-end">
                <button wire:click="save"
                    class="mt-3 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 bg-indigo-500 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button wire:click="closeModal"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>