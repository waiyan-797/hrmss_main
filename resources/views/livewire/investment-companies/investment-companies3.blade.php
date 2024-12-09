<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <h1 class="font-semibold text-base mb-2 text-center">ရင်နှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-semibold text-base mb-2 text-center">၂၀၂၄ခုနှစ်၊နိုဝင်ဘာလ ၃၀ ရက်နေ့ရှိ ဝန်ထမ်းအင်အားစာရင်း</h1>
            <br><br>
            <x-text-input
            class=" w-32"
            wire:model.live='year'
            />
            <div class="w-full mb-4">
              
                
                <div class="w-full rounded-lg">
                    <table class="w-full text-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border border-black">စဥ်</th>
                                <th class="p-2 border border-black">ရာထူးအမည်</th>
                                <th class="p-2 border border-black">လစာနှုန်း (ကျပ်)</th>
                                <th class="p-2 border border-black">ခွင့်ပြုအင်အား</th>
                                <th class="p-2 border border-black">ခန့်ပြီးအင်အား</th>
                                <th class="p-2 border border-black">လစ်လပ်အင်အား</th>
                            </tr>
                        </thead>
                        <tbody class="text-center h-8 p-2">
                            @foreach ($first_ranks as $rank)
                            <tr>
                                <td class="border border-black p-2">{{en2mm($loop->index + 1)}}</td>
                                <td class="border border-black p-2">{{$rank->name}}</td>
                                <td class="border border-black p-2">{{$rank->payscale->name}}</td>
                                <td class="border border-black p-2">{{en2mm($rank->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($rank->StaffCountInRankByYear($year))}}</td>
                                <td class="border border-black p-2">{{en2mm($rank->allowed_qty -$rank->StaffCountInRankByYear($year))}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="3">{{$first_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum(fn($rank) => $rank->StaffCountInRankByYear($year))) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum('allowed_qty') - $first_ranks->sum(fn($rank) => $rank->StaffCountInRankByYear($year))) }}</td>
                            </tr>
                            @foreach ($second_ranks as $rank)
                                <tr>
                                    <td class="border border-black p-2">{{en2mm($loop->index + 1)}}</td>
                                    <td class="border border-black p-2">{{$rank->name}}</td>
                                    <td class="border border-black p-2">{{$rank->payscale->name}}</td>
                                    <td class="border border-black p-2">{{en2mm($rank->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($rank->StaffCountInRankByYear($year))}}</td>
                                    <td class="border border-black p-2">{{en2mm($rank->allowed_qty - $rank->StaffCountInRankByYear($year))}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="3">{{$second_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_ranks->sum(fn($rank) => $rank->StaffCountInRankByYear($year))) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_ranks->sum('allowed_qty') - $second_ranks->sum(fn($rank) => $rank->StaffCountInRankByYear($year))) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
