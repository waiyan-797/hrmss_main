<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Staff List2</h1>
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
