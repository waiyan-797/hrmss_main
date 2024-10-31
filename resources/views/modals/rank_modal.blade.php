<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရာထူး</label>
                <input required type="text" wire:model="rank_name" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('rank_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="payscale" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">လစာနှုန်း</label>
                <div class="relative">
                    <select
                        wire:model="payscale_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>လစာနှုန်းရွေးပါ</option>
                        @foreach ($payscales as $payscale)
                            <option value="{{ $payscale->id }}"> {{ $payscale->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="staff_type" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဝန်ထမ်းအမျိုးအစား</label>
                <div class="relative">
                    <select
                        wire:model="staff_type_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ဝန်ထမ်းအမျိုးအစားရွေးပါ</option>
                        @foreach ($staff_types as $staff_type)
                            <option value="{{ $staff_type->id }}"> {{ $staff_type->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>
