<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left " wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4  h-[83vh] overflow-y-auto">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{$submit_form}}">

            <div class="mb-4">
                <label for="staff" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဝန်ထမ်းအမည်</label>
                <div class="relative">
                    <select
                        wire:model="staff_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ဝန်ထမ်းအမည်</option>
                        @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}"> {{ $staff->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="rank" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရာထူး</label>
                <div class="relative">
                    <select
                        wire:model="rank_name"
                        class="text-sm font-arial block w-full mb-4 p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ရာထူး</option>
                        @foreach ($ranks as $rank)
                            <option value="{{ $rank->id }}"> {{ $rank->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="salary_month" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">လအမည်</label>
                <x-date-picker wire:model="salary_month" id="salary_month"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"/>

                
           
                @error('salary_month') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="current_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">လက်ရှိလစာ</label>
                <input required type="number" wire:model="current_salary" id="current_salary" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('current_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="current_salary_day" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရက်ပေါင်း</label>
               


                <x-date-picker wire:model="current_salary_day" id="current_salary_day"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"/>


                @error('current_salary_day') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="previous_salary_before_increment" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">နှစ်တိုးမတိုးခင်လစာ</label>
                <input required type="number" wire:model="previous_salary_before_increment" id="previous_salary_before_increment" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('previous_salary_before_increment') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="previous_salary_before_increment_day" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရက်ပေါင်း</label>

                <x-date-picker wire:model="previous_salary_before_increment_day" id="previous_salary_before_increment_day"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"/>



                @error('previous_salary_before_increment_day') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="previous_salary_before_promotion" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရာထူးမတိုးခင်လစာ</label>
                <input required type="number" wire:model="previous_salary_before_promotion" id="previous_salary_before_promotion" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('previous_salary_before_promotion') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="previous_salary_before_promotion_day" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရက်ပေါင်း</label>

                <x-date-picker wire:model="previous_salary_before_promotion_day" id="previous_salary_before_promotion_day"  class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"/>



           
                @error('previous_salary_before_promotion_day') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="addition" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အခြား ချီးမြှင့်ငွေ</label>
                <input required type="number" wire:model="addition" id="addition" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('addition') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="addition_education" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဘွဲ့အလိုက် ချီးမြှင့်ငွေ</label>
                <input required type="number" wire:model="addition_education" id="addition_education" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('addition_education') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="addition_ration" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ရိက္ခာစရိတ်</label>
                <input required type="number" wire:model="addition_ration" id="addition_ration" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('addition_ration') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="deduction" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဖြတ်တောက်ငွေ</label>
                <input required type="number" wire:model="deduction" id="deduction" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('deduction') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="deduction_insurance" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဖြတ်တောက်ငွေ (အသက်အာမခံကြေး)</label>
                <input required type="number" wire:model="deduction_insurance" id="deduction_insurance" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('deduction_insurance') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="deduction_tax" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ဖြတ်တောက်ငွေ (၀င်ငွေခွန်)</label>
                <input required type="number" wire:model="deduction_tax" id="deduction_tax" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('deduction_tax') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="actual_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">အမှန်တကယ်လစာ</label>
                <input required type="number" wire:model="actual_salary" id="actual_salary" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                @error('actual_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
            <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
        </form>
    </div>
</div>
