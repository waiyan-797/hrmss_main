<div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto text-left bg-gray-900 bg-opacity-20" wire:ignore.self>
    <!-- Modal Content -->
    <div class="p-4 bg-white rounded-lg shadow-xl dark:bg-gray-800 w-96">
        <!-- Modal Content -->
        <h2 class="mb-4 text-lg font-semibold text-gray-500 uppercase dark:text-white font-arial">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{ $submit_form }}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပညာအရည်အချင်း</label>
                <input required type="text" wire:model="education_name" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('education_name') <span class="mt-1 text-xs font-semibold text-red-500 font-arial">{{ $message }}</span> @enderror
            </div>
            

            


            
            </div>



            <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800 font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="px-4 py-2 text-white bg-gray-500 rounded font-arial hover:bg-gray-600">ထွက်ရန်</button>
        </form>
    </div>
</div>
