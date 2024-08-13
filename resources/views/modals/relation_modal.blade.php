<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-blue-500 font-arial">Name</label>
                <input required type="text" wire:model="relation_name" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('relation_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancel</button>
        </form>
    </div>
</div>
