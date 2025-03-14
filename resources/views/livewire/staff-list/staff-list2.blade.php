<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2 w-16">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2 w-1/4">အမည်/ရာထူး/ဌာန</th>
                        <th class="border border-black text-center p-2">လက်ရှိရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">၁</th>
                        <th class="border border-black text-center p-2">၂</th>
                        <th class="border border-black text-center p-2">၃</th>
                        <th class="border border-black text-center p-2">၄</th>
                        <th class="border border-black text-center p-2">၇</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rank Names Row -->
                    <tr>
                        <td class="border border-black text-center p-2">{{ en2mm(1) }}</td>
                        <td class="border border-black p-2">
                            <div class="text-left">
                                <div class="text-base">{{ $staff->name }}</div>
                                <div class="text-base">{{ $staff->currentRank->name }}</div>
                                <div class="text-base">{{ $staff->current_department->name }}</div>
                            </div>
                        </td>
                        <td class="border border-black p-2">
                            @if($first_promotion)
                                <div class="text-base">{{ $first_promotion->rank->name }}</div>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            @if($second_promotion)
                                <div class="text-base">{{ $second_promotion->rank->name }}</div>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            @if($third_promotion)
                                <div class="text-base">{{ $third_promotion->rank->name }}</div>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            @if($fourth_promotion)
                                <div class="text-base">{{ $fourth_promotion->rank->name }}</div>
                            @endif
                        </td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <!-- Date Ranges and Duration Row -->
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black p-2">
                            @if($first_promotion)
                                <div class="text-base">{{ en2mm(formatDMYmm($first_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm($today)) .' ထိ ' }}</div>
                                <div class="text-base">{{ dateDiffYMD($first_promotion->promotion_date, $today) }}</div>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            @if($second_promotion)
                                <div class="text-base">{{ en2mm(formatDMYmm($second_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) .' ထိ ' }}</div>
                                <div class="text-base">{{ dateDiffYMD($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay()) }}</div>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            @if($third_promotion)
                                <div class="text-base">{{ en2mm(formatDMYmm($third_promotion->promotion_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) .' ထိ ' }}</div>
                                <div class="text-base">{{ dateDiffYMD($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay()) }}</div>
                            @endif
                        </td>
                        <td class="border border-black p-2">
                            @if($fourth_promotion)
                                <div class="text-base">{{ en2mm(formatDMYmm($staff->government_staff_started_date)) .' မှ '. en2mm(formatDMYmm(\Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) .' ထိ ' }}</div>
                                <div class="text-base">{{ dateDiffYMD($staff->government_staff_started_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay()) }}</div>
                            @endif
                        </td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <!-- Points Row -->
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2 font-bold text-base">ပေါင်း</td>
                        <td class="border border-black text-center p-2 font-bold text-base">{{ en2mm($first_promotion_points * 3) }}</td>
                        <td class="border border-black text-center p-2 font-bold text-base">{{ en2mm($second_promotion_points*2) }}</td>
                        <td class="border border-black text-center p-2 font-bold text-base">{{ en2mm($third_promotion_points*1) }}</td>
                        <td class="border border-black text-center p-2 font-bold text-base">{{ en2mm($fourth_promotion_points*0.5) }}</td>
                        <td class="border border-black text-center p-2 font-bold text-base">{{ en2mm($total_points) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
