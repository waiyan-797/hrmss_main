<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black p-2">ဦစီးဌာန</th>
                        <th colspan="3" class="border border-black p-2">အမြဲတမ်းအတွင်းဝန်/<br>ညွှန်ကြားရေးမှူးချုပ်</th>
                        <th colspan="3" class="border border-black p-2">
                            ဒုတိယအမြဲတမ်းအတွင်းဝန်/<br>ဒုတိယညွှန်ကြားရေးမှူးချုပ်</th>
                        <th colspan="3" class="border border-black p-2">လက်ထောက်အတွင်းဝန်/<br>ညွှန်ကြားရေးမှူး</th>
                        <th colspan="3" class="border border-black p-2">ဒုတိယညွှန်ကြားရေးမှူး</th>
                        <th colspan="3" class="border border-black p-2">လက်ထောက်<br>ညွှန်ကြားရေးမှူး</th>
                        <th colspan="3" class="border border-black p-2">ဦးစီးအရာရှိ</th>
                        <th colspan="3" class="border border-black p-2">အရာရှိပေါင်း</th>
                        <th colspan="3" class="border border-black p-2">အမှုထမ်းပေါင်း</th>
                        <th colspan="3" class="border border-black p-2">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                        <th class="border border-black p-1">ခွင့်ပြု</th>
                        <th class="border border-black p-1">ခန့်အပ်</th>
                        <th class="border border-black p-1">ပို/လို</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-2 text-right">၁</td>
                        <td class="border border-black p-2 text-center">ရင်းနှီးမြှပ်နှံမှုနှင့်<br>ကုမ္ပဏီများ<br>ညွှန်ကြားမှုဦးစီးဌာန</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($first_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($second_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($all_ranks->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2 text-right"></td>
                        <td class="border border-black p-2 text-center">စုစုပေါင်း</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 1)->first())->allowed_qty - ($first_ranks->where('id', 1)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 2)->first())->allowed_qty - ($first_ranks->where('id', 2)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 3)->first())->allowed_qty - ($first_ranks->where('id', 3)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 4)->first())->allowed_qty - ($first_ranks->where('id', 4)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 5)->first())->allowed_qty - ($first_ranks->where('id', 5)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->where('id', 6)->first())->allowed_qty - ($first_ranks->where('id', 6)->first())->staffs->count()) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($first_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($first_ranks->sum('allowed_qty')) - $first_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($second_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($second_ranks->sum('allowed_qty')) - $second_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($all_ranks->sum('allowed_qty')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm($all_ranks->sum('staffs_count')) }}</td>
                        <td class="border border-black p-2 text-right">{{ en2mm(($all_ranks->sum('allowed_qty')) - $all_ranks->sum('staffs_count')) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
