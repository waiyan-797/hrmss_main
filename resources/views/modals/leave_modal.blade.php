<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4 h-[83vh] overflow-y-auto">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">

            <div class="mb-4">
                <label for="leave_type" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ခွင့်အမျိုးအစား</label>
                <div class="relative">
                    <select
                        wire:model="leave_type_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option  value="" selected>ခွင့်အမျိုးအစားရွေးပါ</option>
                        @foreach ($leave_types as $leave_type)
                            <option value="{{ $leave_type->id }}"> {{ $leave_type->name }} </option>
                        @endforeach
                    </select>
                    @error('leave_type_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="current_division" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">လက်ရှိဌာန</label>
                <div class="relative">
                    <select
                        wire:model="current_division_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option  value="" selected>ခွင့်အမျိုးအစားရွေးပါ</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}"> {{ $division->name }} </option>
                        @endforeach
                    </select>
                    @error('current_division_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="from_date" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">မှ (ရက် ၊ လ ၊ နှစ်)
                </label>
                <x-date-picker wire:model="from_date" id="from_date" name="from_date" class="mt-1 block w-full"/>
                @error('from_date') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="to_date" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ထိ (ရက် ၊ လ ၊ နှစ်)
                </label>
                <x-date-picker wire:model="to_date" id="to_date" name="to_date" class="mt-1 block w-full"/>
                @error('to_date') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="qty" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အရေအတွက်
                </label>
                <input required type="number" wire:model="qty" id="qty" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('qty') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="order_no" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရုံးမိန့်
                </label>
                <input required type="text" wire:model="order_no" id="order_no" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('order_no') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="remark" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">မှတ်ချက်
                </label>
                <input required type="text" wire:model="remark" id="remark" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('remark') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>
