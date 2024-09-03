<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Staff List1</h1>
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
                        <th rowspan="2" class="border border-black text-center p-2">တိုင်း/ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ခန့်ပြီးအမြဲတမ်းဝန်ထမ်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">အရာထမ်း</th>
                        <th class="border border-black text-center p-2">အမှုထမ်း</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-left p-2">ရန်ကုန်တိုင်းဒေသကြီးညွှန်ကြားရေးမှူး</td>
                        <td class="border border-black text-center p-2">၁၄</td>
                        <td class="border border-black text-center p-2">၁၁</td>
                        <td class="border border-black text-center p-2">၂၅</td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
