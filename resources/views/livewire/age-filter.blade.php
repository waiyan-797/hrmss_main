<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-4 py-6">
            <!-- Buttons for PDF and Word export -->
            <div class="flex justify-center gap-x-4 mb-4">
                <x-primary-button type="button" wire:click="go_pdf()" class="w-32">PDF</x-primary-button>
                <x-primary-button type="button" wire:click="go_word()" class="w-32">WORD</x-primary-button>
            </div>

            <!-- Title Section -->
            <h1 class="font-bold text-center text-2xl mb-4 text-gray-800">Age Report</h1>

            <!-- Filter Section -->
            <div class="flex flex-wrap gap-4 justify-center mb-6">
                <!-- Age Input -->
                <div class="flex items-center">
                    <x-input-label value="အသက်" />
                    <x-text-input wire:model.live="age" class="!w-48 !border-2 rounded-md" />
                </div>
                မှ 

                <!-- Age Two Input -->
                <div class="flex items-center">
                    <x-text-input wire:model.live="ageTwo" class="!w-48 !border-2 rounded-md" />
                </div>
ထိ
                <!-- Sign Selector -->
                <div class="flex items-center">
                    <x-input-label value="Operator" />
                    <select wire:model.live="signID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                        
                        <option value="all">All</option>
                        <option value="between">Between</option>
                        
                        <option value=">">></option>
                        <option value="=">=</option>

                        <option value="<"><</option>
                    </select>
                </div>

                <!-- Division Selector -->
                <div class="flex items-center">
                    <x-select wire:model.live="division_id" :values="$divisions"
                    
                    placeholder="ဌာနခွဲရွေးပါ" class="!w-48 !border-2 rounded-md" />
                </div>

                <!-- Gender Selector -->
                <div class="flex items-center">
                    <x-select wire:model.live="gender_id" placeholder="ကျား/မရွေးပါ" :values="$genders" class="!w-48 !border-2 rounded-md" />
                </div>
            </div>

            <!-- Staff Table -->
            <div class="overflow-x-auto shadow-md rounded-lg bg-white">
                <table class="table-auto w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-black p-2 text-left">စဥ်</th>
                            <th class="border border-black p-2 text-left">အမည်</th>
                            <th class="border border-black p-2 text-left">ရာထူး</th>
                            <th class="border border-black p-2 text-left">မွေးသက္ကရာဇ်</th>
                            <th class="border border-black p-2 text-left">အသက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($staffs as $index => $staff)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-black p-2">{{ $index + 1 }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ $staff->currentRank?->name }}</td>
                            <td class="border border-black p-2">{{ $staff->dob }}</td>
                            <td class="border border-black p-2">{{ $staff->howOldAmI() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination / Additional Actions -->
            <div class="mt-4">
                <!-- You can add pagination here if required -->
            </div>
        </div>
    </div>
</div>
