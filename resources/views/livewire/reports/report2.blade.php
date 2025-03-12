<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <h1 class="text-center font-bold text-sm"> ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
            </h1>
            <h1 class="text-center font-bold text-sm"> ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="text-center font-bold text-sm">Report - 2</h1>

            <div class="flex justify-center items-center space-x-4 mb-3 mt-2">
                <!-- Rank Filter -->
                <div class="w-1/5">
                    <select wire:model.live="selectedRankId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">ရာထူးများအားလုံး</option>
                        @foreach ($ranks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="w-1/5">
                    <select wire:model.live="selectedEthnicId" id="ethnic-select"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">လူမျိုး</option>
                        @foreach ($ethnics as $ethnic)
                            <option value="{{ $ethnic->id }}">{{ $ethnic->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/5">
                    <select wire:model.live="selectedReligionId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">ကိုးကွယ်သည့်ဘာသာ</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/5">
                    <select wire:model.live="selectedGenderId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">ကျား/မ</option>
                        <option value="1">ကျား</option>
                        <option value="2">မ</option>
                    </select>
                </div>
                <div class="w-1/5">
                    <select wire:model.live="selectedMaritalId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">အိမ်ထောင် (ရှိ/မရှိ)</option>
                        <option value="1">ရှိ</option>
                        <option value="2">မရှိ</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap gap-4 justify-center mb-2">
                    <div class="flex items-center mr-6">
                        <x-input-label value="လက်ရှိရာထူးရသောလုပ်သက်" />
                        <x-text-input wire:model.live="age" class="!w-48 !border-2 rounded-md" />
                    </div>
                    မှ
                    <div class="flex items-center">
                        <x-text-input wire:model.live="ageTwo" class="!w-48 !border-2 rounded-md" />
                    </div>
                    ထိ
                    <div class="flex items-center">
                        <x-input-label value="လက်ရှိရာထူးရသောလုပ်သက်အပိုင်းအခြားရွေးပါ" />
                        <select wire:model.live="signID"
                            class="ml-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">

                            <option value="all">အားလုံး</option>
                            <option value="between">နှစ်ကြား</option>

                            <option value=">">နှစ်အထက်</option>
                            <option value="=">နှစ်</option>

                            <option value="<">နှစ်အောက်</option>
                        </select>
                    </div>
                </div>

            <div class="flex justify-end">
                {{ mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}
            </div>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">အသက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လက်ရှိရာထူးရသောလုပ်သက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လူမျိုး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကိုးကွယ်သည့်ဘာသာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ
                        </th>
                        <th rowspan="2" class="border border-black text-center p-2">ကျား/မ</th>
                        <th colspan="2" class="border border-black text-center p-2">သားသမီးအရေအတွက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အိမ်ထောင် (ရှိ/မရှိ)</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျား</th>
                        <th class="border border-black text-center p-2">မ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                                        <tr>
                                            <td class="border border-black text-center p-2">{{ en2mm($loop?->index + 1) }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff?->name }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff?->current_rank?->name }}</td>
                                            @php
                                                $dob = \Carbon\Carbon::parse($staff->dob);
                                                $diff = $dob->diff(\Carbon\Carbon::now());
                                                $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                                            @endphp
                                            <td class="border border-black text-center p-2">
                                                {{ ' (' . en2mm($dob->format('d-m-Y')) . ')' . en2mm($age) }}</td>
                                            @php
                                                $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                                                $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                                                $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                                            @endphp
                                            <td class="border border-black text-center p-2">
                                                {{  ' (' . en2mm($current_rank_date->format('d-m-Y')) . ')' . en2mm($age)  }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff?->ethnic?->name }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff?->religion?->name }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ $staff->current_address_house_no . '၊' . $staff?->current_address_street . '၊' . $staff?->current_address_ward . '၊' . $staff?->current_address_region?->name . '၊' . $staff?->current_address_township_or_town?->name }}
                                            </td>
                                            <td class="border border-black text-center p-2">
                                                {{$staff->permanent_address_house_no . '၊' . $staff?->permanent_address_street . '၊' . $staff?->permanent_address_ward . '၊' . $staff?->permanent_address_region?->name . '၊' . $staff?->permanent_address_township_or_town?->name }}
                                            </td>
                                            <td class="border border-black text-center p-2">{{ $staff?->gender?->name }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($staff?->children?->where('gender_id', 1)?->count()) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($staff?->children?->where('gender_id', 2)?->count()) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ $staff?->spouse_name != null ? 'ရှိ' : 'မရှိ'}}</td>
                                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            initTomSelect();
        });

        // Reinitialize when Livewire updates
        document.addEventListener('livewire:navigated', () => {
            initTomSelect();
        });

        function initTomSelect() {
            // Destroy existing instance if it exists
            if (window.ethnicSelect) {
                window.ethnicSelect.destroy();
            }

            // Initialize new instance
            window.ethnicSelect = new TomSelect('#ethnic-select', {
                placeholder: 'လူမျိုး ရှာရန်',
                allowEmptyOption: true,
                plugins: ['dropdown_input'],
                create: false,
            });

            // Update Livewire when TomSelect changes
            window.ethnicSelect.on('change', function(value) {
                Livewire.dispatch('set-ethnic', { value: value });
            });
        }
    </script>
@endpush