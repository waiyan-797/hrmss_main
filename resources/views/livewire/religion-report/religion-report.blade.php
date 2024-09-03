<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Religion Report</h1>
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

            <h1 class="font-bold text-center text-base mb-1">Religion Report</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-left p-1">စဥ်</th>
                        <th rowspan="2" class="border border-black text-left p-1">အမည်</th>
                        <th rowspan="2" class="border border-black text-left p-1">ရာထူး</th>
                        <th colspan="2" class="border border-black text-left p-1">ဗုဒ္ဓဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">ခရစ်ယာန်ဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">ဟိန္ဒူဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">အစ္စလာမ်ဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">အခြား</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-right p-1">1</td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                        <td class="border border-black text-left p-1"></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
