<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left " wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4  h-[83vh] overflow-y-auto">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">



            <div class="mb-4">
                {{-- <label for="increment_rank" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရာထူး</label> --}}
                {{-- <div class="relative">
                    <select
                        wire:model="increment_rank_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ရာထူး</option>
                        @foreach ($ranks as $rank)
                            <option value="{{ $rank->id }}"> {{ $rank->name }} </option>
                        @endforeach
                    </select>
                </div> --}}
            </div>

            <div class="mb-4">
                <label for="min_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အနိမ့်ဆုံးလစာ</label>

                <input  readonly required type="text" wire:model="min_salary" id="min_salary" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('min_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="increment" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">နှစ်တိုး</label>
                <input  readonly required type="text" wire:model="increment" id="increment" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('increment') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="max_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အမြင့်ဆုံးလစာ</label>
                <input readonly required type="text" wire:model="max_salary" id="max_salary" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('max_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="increment_date" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">နှစ်တိုးတိုးသည့်နေ့ (ရက် ၊ လ ၊ နှစ်)</label>
                <x-date-picker wire:model="increment_date" id="increment_date" name="increment_date" class="mt-1 block w-full"/>
                @error('increment_date') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="increment_time" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">နှစ်တိုးတိုးသည့်အကြိမ်အရေအတွက်</label>
                <input required type="number" wire:model="increment_time" id="increment_time" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('increment_time') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="order_no" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အမိန့်အမှတ်</label>
                <input required type="text" wire:model="order_no" id="order_no" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('order_no') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="remark" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">မှတ်ချက် </label>
                <input required type="text" wire:model="remark" id="remark" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('remark') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>
