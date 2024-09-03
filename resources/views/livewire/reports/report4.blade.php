<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Report4</h1>
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

            <h1 class="text-center text-sm font-bold">Report - 4</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲ</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောင်သည့်ကာလ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
