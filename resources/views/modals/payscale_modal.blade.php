<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">လစာနှုန်း</label>
                <input required type="text" wire:model="payscale_name" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('payscale_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="min_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အနိမ့်ဆုံးလစာ</label>
                <input required type="text" wire:model="payscale_min_salary" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('payscale_min_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="increment" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အတိုးနှုန်း</label>
                <input required type="text" wire:model="payscale_increment" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('payscale_increment') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="max_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အမြင့်ဆုံးလစာ</label>
                <input required type="text" wire:model="payscale_max_salary" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('payscale_max_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
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
            <div class="mb-4">
                <label for="allowed_qty" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ခွင့်ပြုသည့်အရေအတွက်</label>
                <input required type="number" wire:model="allowed_qty" id="number" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('allowed_qty') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="supply" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အထောက်အပံ့</label>
                <input required type="number" wire:model="supply" id="supply" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('supply') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>
