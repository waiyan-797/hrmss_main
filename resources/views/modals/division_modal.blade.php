<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဌာနခွဲ</label>
                <input required type="text" wire:model="division_name" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('division_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="nick_name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဌာနခွဲအတိုကောက်</label>
                <input required type="text" wire:model="nick_name" id="nick_name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('nick_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="division_type" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဌာနခွဲအမျိုးအစား</label>
                <div class="relative">
                    <select
                        wire:model="division_type_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ဌာနခွဲအမျိုးအစားရွေးပါ</option>
                        @foreach ($division_types as $division_type)
                            <option value="{{ $division_type->id }}"> {{ $division_type->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="department" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဌာနအမျိုးအစား</label>
                <div class="relative">
                    <select
                        wire:model="department_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ဌာနအမျိုးအစားရွေးပါ</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"> {{ $department->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="difficulty_level" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အခက်အခဲအဆင့်</label>
                <div class="relative">
                    <select
                        wire:model="difficulty_level_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>အခက်အခဲအဆင့်ရွေးပါ</option>
                        @foreach ($difficulty_levels as $difficulty)
                            <option value="{{ $difficulty->id }}"> {{ $difficulty->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>
