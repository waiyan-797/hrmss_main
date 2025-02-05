<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left " wire:ignore.self>
    <div class="bg-white w-1/2 dark:bg-gray-800 rounded-lg shadow-xl p-4 h-auto overflow-y-auto">
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}</h2>
        <form wire:submit.prevent="{{ $submit_form }}">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="mb-4">
                    <label for="retirementType" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပြုန်းတီးအမျိုးအစား</label>
                    <select wire:model.change="retire_type_id" id="retirementType" class="text-sm font-arial block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="" selected>ပြုန်းတီးအမျိုးအစား</option>
                        @foreach ($retirementTypes as $retirementType)
                            <option value="{{ $retirementType->id }}">{{ $retirementType->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($retire_type_id == 5)
                    <div class="mb-4">
                        <label for="pensionType" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပင်စင်အမျိုးအစား</label>
                        <select wire:model="pension_type_id" id="pensionType" class="text-sm font-arial block w-full p-2.5 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                            <option value="" selected>ပင်စင်အမျိုးအစား</option>
                            @foreach ($pensionTypes as $pensionType)
                                <option value="{{ $pensionType->id }}">{{ $pensionType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="mb-4">
                    <label for="retire_date" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပြုန်းတီးသည့်နေ့ (လ ၊ ရက် ၊ နှစ်)</label>
                    <x-text-input wire:model="retire_date" id="retire_date" name="retire_date" type="date" class="mt-1 block w-full"/>
                    @error('retire_date') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="lost_contact_from_date" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ထုတ်ပယ်သည့်နေ့ (လ ၊ ရက် ၊ နှစ်)</label>
                    <x-text-input wire:model="lost_contact_from_date" id="lost_contact_from_date" name="lost_contact_from_date" type="date" class="mt-1 block w-full"/>
                    @error('lost_contact_from_date') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="retire_remark" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">မှတ်ချက်</label>
                    <input required type="text" wire:model="retire_remark" id="retire_remark" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    @error('retire_remark') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="pension_salary" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပင်စင်လစာ</label>
                    <input required type="number" wire:model="pension_salary" id="pension_salary" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    @error('pension_salary') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="gratuity" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ကြေး</label>
                    <input required type="number" wire:model="gratuity" id="gratuity" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    @error('gratuity') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="pension_bank" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပင်စင်ဘဏ်</label>
                    <input required type="text" wire:model="pension_bank" id="pension_bank" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    @error('pension_bank') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="pension_office_order" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">ပင်စင်ဦးစီးမှူး အမိန့်</label>
                    <input required type="text" wire:model="pension_office_order" id="pension_office_order" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    @error('pension_office_order') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="date_of_death" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">သေဆုံးသည့်ရက်စွဲ (လ ၊ ရက် ၊ နှစ်)</label>
                    <x-text-input wire:model="date_of_death" id="date_of_death" name="date_of_death" type="date" class="mt-1 block w-full"/>
                    @error('date_of_death') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="family_pension_inheritor" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">မိသားစုပင်စင်ဆက်ခံသူ</label>
                    <input required type="text" wire:model="family_pension_inheritor" id="family_pension_inheritor" class="font-arial bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    @error('family_pension_inheritor') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="family_pension_date" class="block mb-1 text-gray-600 dark:text-green-500 font-arial">မိသားစုပင်စင်ရက်စွဲ (လ ၊ ရက် ၊ နှစ်)</label>
                    <x-text-input wire:model="family_pension_date" id="family_pension_date" name="family_pension_date" type="date" class="mt-1 block w-full"/>
                    @error('family_pension_date') <span class="mt-1 text-red-500 text-xs font-arial font-semibold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded font-arial">{{ $submit_button_text }}</button>
                <button type="button" wire:click="{{ $cancel_action }}" class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">ထွက်ရန်</button>
            </div>
        </form>
    </div>
</div>
