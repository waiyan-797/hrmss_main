<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Staff List4</h1>
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

            <h1 class="font-bold text-center text-base">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ
                ဝန်ထမ်းအင်အားစာရင်း</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-2">အမည်/ရာထူး</th>
                        <th class="border border-black text-left p-2">မူလဌာန</th>
                        <th class="border border-black text-center p-2">ခုနှစ်<br>မှ-ထိ</th>
                        <th class="border border-black text-left p-2">ပြောင်းရွေ့ဌာန</th>
                        <th class="border border-black text-center p-2">ခုနှစ်<br>မှ-ထိ</th>
                        <th class="border border-black text-center p-2">လက်ရှိဌာန<br>ရောက်ရှိ ရက်စွဲ</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-left p-2"></td>
                        <td class="border border-black text-left p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-left p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
