<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Pension Report</h1>
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

            <h1 class="font-bold text-center text-base">Pension Report</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ဌာန</th>
                        <th class="border border-black text-left p-1">txtsection</th>
                        <th class="border border-black text-left p-1">မွေးသက္ကရာဇ်</th>
                        <th class="border border-black text-left p-1">ပင်စင်ယူသည့်ရက်စွဲ</th>
                        <th class="border border-black text-left p-1">ပင်စင်အမျိုးအစား</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-right p-1"></td>
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
