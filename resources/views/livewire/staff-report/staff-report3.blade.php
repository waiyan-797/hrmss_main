<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Staff Report3</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'data_values' => $townships,
                'modal' => 'modals/township_modal',
                'id' => $township_id,
                'title' => 'Report',
                'search_id' => 'township_search',
                'columns' => ['No', 'Name', 'District', 'Action'],
                'column_vals' => ['name', 'district'],
            ]) --}}

            <h1 class="font-bold text-center text-base mb-2">ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br> (၁-၄-၂၀၂၄) ရက်နေ့၏ ဝန်ထမ်းများစာရင်း</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">စဥ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">အမည်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ရာထူး</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">နိုင်ငံသားစိစစ်ရေးအမှတ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">မွေးသက္ကရာဇ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">လက်ရှိအဆင့်ရရက်စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ဌာနခွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပညာအရည်အချင်း</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                            <td class="text-sm text-left font-medium text-gray-600 px-2 py-3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
