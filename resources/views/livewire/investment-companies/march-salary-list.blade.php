<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">March Salary List</h1>
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

            <h1 class="font-bold text-center text-sm mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်
                ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>ဦးရဲမင်းသူ ( ဒုတိယဦးစီးမှူး ) ...၏...<br>......မတ်လ အတွက်
                လစာစာရင်းညှိနှုင်းခြင်း။ ...</h1>

            <table class="md:w-full text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာထုတ်ယူသည့် လ/နှစ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ထုတ်ယူရမည့်<br>လစာနှုန်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ပေးရမည့်<br>လစာနှုန်း</th>
                        <th class="border border-black text-center p-2">ထုတ်ယူခဲ့ပြီး<br>လစာနှုန်း</th>
                        <th colspan="2" class="border border-black text-center p-2">ထုတ်ယူပြီး<br>လစာငွေ</th>
                        <th colspan="2" class="border border-black text-center p-2">ခြားနားလစာငွေ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျပ်</th>
                        <th class="border border-black text-left p-2">ပြား</th>
                        <th class="border border-black text-right p-2"></th>
                        <th class="border border-black text-right p-2">ကျပ်</th>
                        <th class="border border-black text-right p-2">ပြား</th>
                        <th class="border border-black text-right p-2">ကျပ်</th>
                        <th class="border border-black text-right p-2">ပြား</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-right p-2">၁</td>
                        <td class="border border-black text-left p-2">၁-၁၀-၂၀၂၂ မှ<br>၁၁-၁၀-၂၀၂၂ထိ(၁၁)ရက်</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                    </tr>
                    <tr class="font-bold">
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၂၀၉,၆၁၂</td>
                        <td class="border border-black text-right p-2">၉၀</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၁၉၈,၀၀၀</td>
                        <td class="border border-black text-right p-2"></td>
                        <td class="border border-black text-right p-2">၁၁,၆၁၂</td>
                        <td class="border border-black text-right p-2">၉၀</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
