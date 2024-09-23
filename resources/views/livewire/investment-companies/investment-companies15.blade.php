<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <br><br>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th colspan="3" class="border border-black text-center p-2">ရန်ကုန်</th>
                        <th colspan="3" class="border border-black text-center p-2">နေပြည်တော်</th>
                        <th colspan="3" class="border border-black text-center p-2"></th>
                        <th colspan="3" class="border border-black text-center p-2">မန္တလေးတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ရှမ်းပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">မွန်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ဧရာဝတီတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">စစ်ကိုင်းတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">တနင်္သာရီတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ကရင်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ပဲခူးတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">မကွေးတိုင်း</th>
                        <th colspan="3" class="border border-black text-center p-2">ကယားပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ကချင်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ရခိုင်ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ချင်းပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">စုစုပေါင်း
                        </th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-left p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                        <th class="border border-black text-center p-2">ဖွဲ့</th>
                        <th class="border border-black text-center p-2">ခန့်</th>
                        <th class="border border-black text-center p-2">ပို/လို</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">ညွှန်ကြားရေးမှူးချုပ်</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
