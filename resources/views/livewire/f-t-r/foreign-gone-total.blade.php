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
            အသက် ၄၅ နှစ်အောက် ညွှန်ကြားရေးမှူးများ၏အမည်စာရင်း
            </h1>

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
                        {{-- <th class="border border-black text-center p-2">သွားရောက်သည့်နိုင်ငံ</th>
                        <th class="border border-black text-center p-2">သင်တန်း</th>
                        <th class="border border-black text-center p-2">အခြား</th> --}}
                        <th class="border border-black text-center p-2">အကြိမ်ရေ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
        @php
            // Get unique countries from both trainings and abroads
            $allCountries = $staff->abroads->pluck('country_id')
                ->merge($staff->trainings->pluck('country_id'))
                ->unique();

            // Calculate total counts
            $totalTrainings = $staff->trainings->count();
            $totalAbroads = $staff->abroads->count();
            $totalOverall = $totalTrainings + $totalAbroads;

            // Fetch the most recent abroad and training details
            $lastAbroad = $staff->abroads->sortByDesc('to_date')->first();
            $lastTraining = $staff->trainings->sortByDesc('to_date')->first();
        @endphp

        @foreach($allCountries as $index => $countryId)
            <tr>
                @if($index == 0)
                    <!-- Merge the first columns for each staff -->
                    <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">
                        {{ $loop->parent->iteration }}
                    </td>
                    <td class="border border-black text-left p-2" rowspan="{{ $allCountries->count() }}">
                        {{ $staff->name }} / {{ $staff->currentRank?->name }}
                    </td>
                    <td class="border border-black text-left p-2" rowspan="{{ $allCountries->count() }}">
                        {{ $staff->current_division?->name }}
                    </td>
                    <td class="border border-black text-left p-2" rowspan="{{ $allCountries->count() }}">
                        {{ formatDMYmm($staff->dob) }}
                    </td>
                    <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">
                        {{ formatDMYmm($staff->join_date) }}
                    </td>
                    <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">
                        {{ formatDMYmm($staff->current_rank_date) }}
                    </td>
                @endif

                <td class="border border-black text-center p-2">
                    {{ $lastAbroad?->country?->name ?? ($lastTraining?->country?->name ?? 'N/A') }}
                </td>
                <td class="border border-black text-center p-2">
                    @if($lastAbroad)
                        {{ formatDMYmm($lastAbroad->from_date) }} မှ {{ formatDMYmm($lastAbroad->to_date) }}ထိ 
                    @elseif($lastTraining)
                        {{ formatDMYmm($lastTraining->from_date) }} - {{ formatDMYmm($lastTraining->to_date) }}
                    @else
                        N/A
                    @endif
                </td>

                @if($index == 0)
                    <td class="border border-black text-center p-2" rowspan="{{ $allCountries->count() }}">
                        {{ en2mm($totalOverall) }}
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