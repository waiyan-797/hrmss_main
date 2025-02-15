<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-2">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
            </h1>
            <h1 class="font-bold text-center text-base mb-2">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </h1>
             <h1 class="font-bold text-center text-base mb-2">
                အသက် {{ en2mm($age ?? '') }}
                @switch($signID)
                    @case('all') အားလုံး @break
                    @case('between') နှစ်ကြား @break
                    @case('>') နှစ်အထက် @break
                    @case('=') နှစ် @break
                    @case('<') နှစ်အောက် @break
                    @default ရာထူးအားလုံး
                @endswitch
                {{ $selectedRankName ?? '' }} များ၏အမည်စာရင်း
            </h1>
            

            <div class="flex flex-wrap gap-4 justify-center mb-6">
                <x-select wire:model.live="selectedRankId" :values="$ranks" placeholder='ရာထူးများအားလုံး' />

                <div class="flex items-center">
                    <x-input-label value="အသက်" />
                    <x-text-input wire:model.live="age" class="!w-48 !border-2 rounded-md" />
                </div>
                မှ
                <div class="flex items-center">
                    <x-text-input wire:model.live="ageTwo" class="!w-48 !border-2 rounded-md" />
                </div>
                ထိ
                <div class="flex items-center">
                    <x-input-label value="အသက်အပိုင်းအခြားရွေးပါ" />
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

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">အမည်/ရာထူး</th>
                        <th class="border border-black text-center p-2">ဌာနခွဲ</th>
                        <th class="border border-black text-center p-2">မွေးသက္ကရာဇ်</th>
                        <th class="border border-black text-center p-2">အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ
                        </th>
                        <th class="border border-black text-center p-2">လက်ရှိအဆင့်ရရက်စွဲ
                        </th>

                        <th class="border border-black text-center p-2">နောက်ဆုံးသွားရောက်ခဲ့
                            သည့်နိုင်ငံ/မြို့
                        </th>
                        <th class="border border-black text-center p-2">
                            နောက်ဆုံးသွားရောက်ခဲ့သည့်
                            အကြောင်းအရာ
                            ကာလ (မှ-ထိ)
                        </th>
                        <th class="border border-black text-center p-2">အကြိမ်ရေ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                         @php
                            $allCountries = $staff->abroads
                                ->pluck('country_id')
                                ->merge($staff->abroads->pluck('country_id'))
                                ->unique();
                            $totalAbroads = $staff->abroads->count();
                            $lastAbroad = $staff->abroads->sortByDesc('to_date')->first(); 
                        @endphp 

                        @foreach ($allCountries as $index => $countryId)
                            <tr>
                                @if ($index == 0)
                                    <td class="border border-black text-center p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ en2mm($loop->parent->iteration) }}
                                    </td>
                                    <td class="border border-black text-left p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ $staff->name }} / {{ $staff->currentRank?->name }}
                                    </td>
                                    <td class="border border-black text-left p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ $staff->current_division?->name }}
                                    </td>
                                    @php
                                        $dob = \Carbon\Carbon::parse($staff->dob);
                                        $diff = $dob->diff(\Carbon\Carbon::now());
                                        $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                                    @endphp
                                    <td class="border border-black text-left p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ ' (' . en2mm($dob->format('d-m-Y')) . ')' . en2mm($age) }}
                                    </td>
                                    <td class="border border-black text-center p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ formatDMYmm($staff->join_date) }}
                                    </td>
                                    <td class="border border-black text-center p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ formatDMYmm($staff->current_rank_date) }}
                                    </td>
                                    @php
                                    $lastAbroad = $staff->abroads->sortByDesc('to_date')->first();
                                @endphp 

                                    <td class="border border-black text-center p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{$lastAbroad->countries->pluck('name')->unique()->join(', ')}}
                                    </td>
                                    <td class="border border-black text-center p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        @if ($lastAbroad)
                                        {{ $lastAbroad->particular}}
                                            {{ formatDMYmm($lastAbroad->from_date) }} မှ
                                            {{ formatDMYmm($lastAbroad->to_date) }}ထိ
                                        @endif
                                    </td>
                                    <td class="border border-black text-center p-2"
                                        rowspan="{{ $allCountries->count() }}">
                                        {{ en2mm( $totalAbroads) }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
