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
                    <select wire:model.live="signID"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">

                        <option value="all">အားလုံး</option>
                        <option value="between">Between</option>

                        <option value=">">></option>
                        <option value="=">=</option>

                        <option value="<"> </option>
                    </select>
                </div>

                <!-- Division Selector -->
                <div class="flex items-center">
                    <x-select wire:model.live="division_id" :values="$divisions" placeholder="ဌာနခွဲများအားလုံး"
                        class="!w-48 !border-2 rounded-md" />
                </div>

                <!-- Gender Selector -->
                <div class="flex items-center">
                    <x-select wire:model.live="gender_id" placeholder="ကျား/မ အားလုံး" :values="$genders"
                        class="!w-48 !border-2 rounded-md" />
                </div>
                <x-select wire:model.live="selectedRankId" :values="$ranks" placeholder='ရာထူးများအားလုံး' />
            </div>


            <!-- Staff Table -->
            <div class="overflow-x-auto shadow-md rounded-lg bg-white">
                <table class="table-auto w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th rowspan="2" class="border border-black p-2 text-center">စဉ်</th>
                            <th rowspan="2" class="border border-black p-2 text-center">အမည်</th>
                            <th rowspan="2" class="border border-black p-2 text-center">ရာထူး</th>
                            <th rowspan="2" class="border border-black p-2 text-center">မွေးသက္ကရာဇ်</th>
                            <th rowspan="2" class="border border-black p-2 text-center">အသက်</th>
                            <th colspan="2" class="border border-black p-2 text-center">အသက်</th>                       
                            <th rowspan="2" class="border border-black p-2 text-center">မှတ်ချက်</th>

                        </tr>
                        <tr>
                            <th class="border border-black p-1 text-center">ကျား</th>
                            <th class="border border-black p-2 text-center">မ</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @php $i = 0;
                        // dd($staffs);
                         @endphp
                        @foreach($staffs as $index => $staff)
                        
                            <tr class="hover:bg-gray-50">
                                <td class="border border-black p-2">{{ en2mm($index + 1) }}</td>
                                <td class="border border-black p-2">{{ $staff->name }}</td>
                                <td class="border border-black p-2">{{ $staff->currentRank?->name }}</td>
                                <td class="border border-black p-2 text-center">{{ en2mm($staff->dob) }}</td>
                                <td class="border border-black p-2 text-center">{{ $staff->howOldAmI() }}</td>
                                @if($staff->gender_id == 1)
                                <td class="border border-black p-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                    </svg>
                                </td>
                                <td class="border border-black p-2"></td>

                                @elseif($staff->gender_id == 2)
                                <td class="border border-black p-1"></td>
                                <td class="border border-black p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                    </svg>
                                </td>
                                @endif
                                <td class="border border-black p-2"></td>
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