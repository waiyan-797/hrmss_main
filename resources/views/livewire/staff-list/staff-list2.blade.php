<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်/ရာထူး/ဌာန</th>
                        <th class="border border-black text-center p-2">လက်ရှိရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">တစ်ဆင့်နိမ့်ရာထူး</th>
                        <th class="border border-black text-center p-2">စူစုပေါင်း</th>
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
                    <tr>
                        <td class="border border-black text-center p-2">{{ en2mm(1) }}</td>
                        <td class="border border-black text-center p-2">{{ $staff->name }}</td>
                        <td class="border border-black text-center p-2">{{ $first_promotion ? $first_promotion->rank->name : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $second_promotion ? $second_promotion->rank->name : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $third_promotion ? $third_promotion->rank->name : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $fourth_promotion ? $fourth_promotion->rank->name : '' }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">{{ $staff->currentRank->name }}</td>
                        <td class="border border-black text-center p-2">{{ $first_promotion ? en2mm(formatDMY($first_promotion->promotion_date)) .' မှ '. en2mm(formatDMY($today)) .' ထိ ' : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $second_promotion ? en2mm(formatDMY($second_promotion->promotion_date)) .' မှ '. en2mm(formatDMY(\Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) .' ထိ ' : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $third_promotion ? en2mm(formatDMY($third_promotion->promotion_date)) .' မှ '. en2mm(formatDMY(\Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) .' ထိ ' : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $fourth_promotion ? en2mm(formatDMY($fourth_promotion->promotion_date)) .' မှ '. en2mm(formatDMY(\Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) .' ထိ ' : '' }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">{{ $staff->current_department->name }}</td>
                        <td class="border border-black text-center p-2">{{ $first_promotion ? dateDiffYMD($first_promotion->promotion_date, $today) : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $second_promotion ? dateDiffYMD($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay()) : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $third_promotion ? dateDiffYMD($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay()) : '' }}</td>
                        <td class="border border-black text-center p-2">{{ $fourth_promotion ? dateDiffYMD($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay()) : '' }}</td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">{{ en2mm($first_promotion_points * 3) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($second_promotion_points*2) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($third_promotion_points*1) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($fourth_promotion_points*0.5) }}</td>
                        <td class="border border-black text-center p-2">{{ en2mm($total_points) }}</td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
