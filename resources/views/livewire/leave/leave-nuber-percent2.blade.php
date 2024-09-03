<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Leaves2</h1>
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

            <h1 class="font-bold text-base text-center mb-4">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၂ခုနှစ်၊ အောက်တိုဘာလမှ ၂၀၂၃ခုနှစ်၊
                ဇွန်လအထိ ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား</h1>

            <table class="md:w-full">
                <thead>
                    <tr class="font-bold">
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">ဌာနခွဲ</th>
                        <th class="border border-black text-center p-2">၂၀၂၂ခုနှစ်<br>အောက်တိုဘာလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၂ခုနှစ်<br>နိုဝင်ဘာလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၂ခုနှစ်<br>ဒီဇင်ဘာလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၃ခုနှစ်<br>ဇန်နဝါရီလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၃ခုနှစ်<br>ဖေဖော်ဝါရီလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၃ခုနှစ်<br>မတ်လ</th>
                        <th class="border border-black text-center p-2">၂၀၂၃ခုနှစ်<br>ဧပြီလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၃ခုနှစ်<br>မေလ</th>
                        <th class="border border-black text-center p-2">၂၀၂၃ခုနှစ်<br>ဇွန်လ</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>
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
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2"></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>
