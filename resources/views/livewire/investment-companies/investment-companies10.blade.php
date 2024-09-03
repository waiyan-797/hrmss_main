<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Investment Companies10</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'data_values' => $ethnic_types,
                'modal' => 'modals/ethnic_modal',
                'id' => $ethnic_type_id,
                'title' => 'Ethnic',
                'search_id' => 'ethnic_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ]) --}}


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
                        <td class="border border-black p-2 text-right">၁</td>
                        <td class="border border-black p-2 text-right">၁</td>
                        <td class="border border-black p-2 text-right">-</td>
                        <td class="border border-black p-2 text-right">၄</td>
                        <td class="border border-black p-2 text-right">၄</td>
                        <td class="border border-black p-2 text-right">-</td>
                        <td class="border border-black p-2 text-right">၂၆</td>
                        <td class="border border-black p-2 text-right">၂၄</td>
                        <td class="border border-black p-2 text-right">-၂</td>
                        <td class="border border-black p-2 text-right">၆၈</td>
                        <td class="border border-black p-2 text-right">၄၉</td>
                        <td class="border border-black p-2 text-right">-၁၉</td>
                        <td class="border border-black p-2 text-right">၁၀၁</td>
                        <td class="border border-black p-2 text-right">၇၅</td>
                        <td class="border border-black p-2 text-right">-၂၆</td>
                        <td class="border border-black p-2 text-right">၁၇၅</td>
                        <td class="border border-black p-2 text-right">၈၅</td>
                        <td class="border border-black p-2 text-right">-၉၀</td>
                        <td class="border border-black p-2 text-right">၃၇၅</td>
                        <td class="border border-black p-2 text-right">၂၃၈</td>
                        <td class="border border-black p-2 text-right">-၁၃၇</td>
                        <td class="border border-black p-2 text-right">၄၈၄</td>
                        <td class="border border-black p-2 text-right">၂၀၈</td>
                        <td class="border border-black p-2 text-right">-၂၇၆</td>
                        <td class="border border-black p-2 text-right">၈၅၉</td>
                        <td class="border border-black p-2 text-right">၄၄၆၁</td>
                        <td class="border border-black p-2 text-right">-၄၁၃</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2 text-right"></td>
                        <td class="border border-black p-2 text-center">စုစုပေါင်း</td>
                        <td class="border border-black p-2 text-right">၁</td>
                        <td class="border border-black p-2 text-right">၁</td>
                        <td class="border border-black p-2 text-right">-</td>
                        <td class="border border-black p-2 text-right">၄</td>
                        <td class="border border-black p-2 text-right">၄</td>
                        <td class="border border-black p-2 text-right">-</td>
                        <td class="border border-black p-2 text-right">၂၆</td>
                        <td class="border border-black p-2 text-right">၂၄</td>
                        <td class="border border-black p-2 text-right">-၂</td>
                        <td class="border border-black p-2 text-right">၆၈</td>
                        <td class="border border-black p-2 text-right">၄၉</td>
                        <td class="border border-black p-2 text-right">-၁၉</td>
                        <td class="border border-black p-2 text-right">၁၀၁</td>
                        <td class="border border-black p-2 text-right">၇၅</td>
                        <td class="border border-black p-2 text-right">-၂၆</td>
                        <td class="border border-black p-2 text-right">၁၇၅</td>
                        <td class="border border-black p-2 text-right">၈၅</td>
                        <td class="border border-black p-2 text-right">-၉၀</td>
                        <td class="border border-black p-2 text-right">၃၇၅</td>
                        <td class="border border-black p-2 text-right">၂၃၈</td>
                        <td class="border border-black p-2 text-right">-၁၃၇</td>
                        <td class="border border-black p-2 text-right">၄၈၄</td>
                        <td class="border border-black p-2 text-right">၂၀၈</td>
                        <td class="border border-black p-2 text-right">-၂၇၆</td>
                        <td class="border border-black p-2 text-right">၈၅၉</td>
                        <td class="border border-black p-2 text-right">၄၄၆</td>
                        <td class="border border-black p-2 text-right">-၄၁၃</td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
