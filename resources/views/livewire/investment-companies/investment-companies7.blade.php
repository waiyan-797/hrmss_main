<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <input type="month" wire:model.live='filterRange'>

            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <h3 class="font-semibold text-base mb-2 text-center">{{ mmDateFormat($year, $month) }} </h3>
                <div class="w-full rounded-lg">
                    <table class="md:w-auto">
                        <thead>
                            <tr>

                                <th rowspan="3" class="border border-black text-center p-2">ဌာန</th>
                                <th colspan="3" class="border border-black text-center p-2">မူလအင်အား</th>
                                <th colspan="9" class="border border-black text-center p-2">ပြုန်းတီးအင်အား</th>
                                <th colspan="3" class="border border-black text-center p-2">ထပ်မံခန့်ထားခြင်း</th>
                                <th colspan="6" class="border border-black text-center p-2">ပြောင်းရွေ့အင်အား</th>
                                <th colspan="3" class="border border-black text-center p-2">လက်ကျန်အင်အား</th>
                            </tr>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">အရာရှိ</th>
                                <th rowspan="2" class="border border-black text-center p-2">အခြား</th>
                                <th rowspan="2" class="border border-black text-center p-2">ပေါင်း</th>
                                <th colspan="2" class="border border-black text-center p-2">သေဆုံး</th>
                                <th colspan="2" class="border border-black text-center p-2">နုတ်ထွက်</th>
                                <th colspan="2" class="border border-black text-center p-2">ထုတ်ပစ်</th>
                                <th colspan="2" class="border border-black text-center p-2">ပင်စင်</th>
                                <th rowspan="2" class="border border-black text-center p-2">ပေါင်း</th>
                                <th rowspan="2" class="border border-black text-center p-2">အရာရှိ</th>
                                <th rowspan="2" class="border border-black text-center p-2">အခြား</th>
                                <th rowspan="2" class="border border-black text-center p-2">ပေါင်း</th>
                                <th colspan="3" class="border border-black text-center p-2">ထွက်ခွာ</th>
                                <th colspan="3" class="border border-black text-center p-2">ရောက်ရှိ</th>
                                <th rowspan="2" class="border border-black text-center p-2">အရာရှိ</th>
                                <th rowspan="2" class="border border-black text-center p-2">အခြား</th>
                                <th rowspan="2" class="border border-black text-center p-2">ပေါင်း</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">ရှိ</th>
                                <th class="border border-black text-center p-2">ခြား</th>
                                <th class="border border-black text-center p-2">ရှိ</th>
                                <th class="border border-black text-center p-2">ခြား</th>
                                <th class="border border-black text-center p-2">ရှိ</th>
                                <th class="border border-black text-center p-2">ခြား</th>
                                <th class="border border-black text-center p-2">ရှိ</th>
                                <th class="border border-black text-center p-2">ခြား</th>
                                <th class="border border-black text-center p-2">ရှိ</th>
                                <th class="border border-black text-center p-2">ခြား</th>
                                <th class="border border-black text-center p-2">ပေါင်း</th>
                                <th class="border border-black text-center p-2">ရှိ</th>
                                <th class="border border-black text-center p-2">ခြား</th>
                                <th class="border border-black text-center p-2">ပေါင်း</th>
                            </tr>
                        </thead>
                        <tbody class="md:w-auto">
                            <tr>

                                <td class="border border-black text-center p-2">
                                    ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
                                {{-- staff_type_id --}}
                                <td class="border border-black text-center p-2">{{ en2mm($high_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_staffs + $low_staffs) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($total_reduced_staffs->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_new_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_new_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_new_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_leave_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_leave_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_leave_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_transfer_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_transfer_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_transfer_staffs) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_left_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_left_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_left_staffs) }}</td>
                            </tr>
                            <tr class="font-bold">

                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_staffs) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_staffs + $low_staffs) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 1)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 2)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 4)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($high_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($low_reduced_staffs->where('retire_type_id', 5)->count()) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($total_reduced_staffs->count()) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_new_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_new_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_new_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_leave_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_leave_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_leave_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_transfer_staffs) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_transfer_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_transfer_staffs) }}
                                </td>
                                <td class="border border-black text-center p-2">{{ en2mm($high_left_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($low_left_staffs) }}</td>
                                <td class="border border-black text-center p-2">{{ en2mm($total_left_staffs) }}</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>
