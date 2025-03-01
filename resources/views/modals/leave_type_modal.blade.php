<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ခွင့်အမျိုးအစား</label>
                <input required type="text" wire:model="leave_type_name" id="leave_type_name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('leave_type_name') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="allowed" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ခွင့်</label>
                <input required type="number" wire:model="allowed" id="allowed" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('allowed') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="day_or_month" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">နေ့(သို့မဟုတ်)လ</label>
                <div class="relative">
                    <select
                        wire:model="day_or_month_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>နေ့(သို့မဟုတ်)လရွေးပါ</option>
                         @foreach ($dayOrMonths as $dayOrMonth)
                            <option value="{{ $dayOrMonth->id }}"> {{ $dayOrMonth->name }} </option>
                        @endforeach 
                       
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="sort_no" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">SortNo</label>
                <input required type="number" wire:model="sort_no" id="sort_no" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('sort_no') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            
                <div class="w-full ml-5">
                    {{-- safdsf --}}
                    <div>
                        <h6 class="mb-2">နှစ်စဉ်</h6>
                        <div class="flex items-center space-x-4">

                            <div class="flex items-center">
                                <input type="radio" wire:model="is_yearly" value="1" name="is_yearly"
                                    class="form-radio h-4 w-4 text-indigo-500" id="is_yearly_yes">
                                <label for="is_yearly_yes" class="ml-2 text-gray-500">ရှိ</label>
                            </div>

                            <div class="flex items-center">
                                <input type="radio" wire:model="is_yearly" value="0" name='is_yearly'
                                    class="form-radio h-4 w-4 text-indigo-500" id="is_yearly_no">
                                <label for="is_yearly_no" class="ml-2 text-gray-500">မရှိ</label>
                            </div>
                        </div>
                    </div>
                </div>
            <br>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>















{{-- <div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left" wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ခွင့်အမျိုးအစား
                </label>
                <input required type="text" wire:model="leave_type" id="name" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('leave_type') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <label for="allowed" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ခွင့်
            </label>
            <input required type="number" wire:model="allowed" id="allowed" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
            @error('allowed') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            <br>

            <div class="relative">
                <select
                    wire:model="day_or_month_name"
                    class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    <option value="" selected>နေ့(သို့မဟုတ်)လရွေးပါ</option>
                    @foreach ($dayOrMonths as $dayOrMonth)
                        <option value="{{ $dayOrMonth->id }}"> {{ $dayOrMonth->name }} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <label for="sort_no" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">SortNo
            </label>
            <input required type="number" wire:model="sort_no" id="sort_no" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
            @error('sort_no') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            <br>

            <div>
                <label for="is_yearly" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">နှစ်စဉ်
                </label>
                <x-radio-input id1="is_yearly_1" id2="is_yearly_2" wire="is_yearly" />
                <x-input-error class="mt-2" :messages="$errors->get('is_yearly')" />
            </div>
            <br>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div> --}}
