<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Staff Salary List2</h1>
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

            <h1 class="text-center text-sm mb-2">နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
                နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏</h1>
            <h2 class="font-bold text-center text-sm mb-4">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့်
                အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
            </h2>

            <table class="md:w-full font-bold text-center text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black p-2">လစာနှုန်း</th>
                        <th rowspan="2" class="border border-black p-2">ရာထူးအဆင့်</th>
                        <th colspan="2" class="border border-black p-2">ဒီပလိုမာ</th>
                        <th colspan="2" class="border border-black p-2">Fellowship/Membership</th>
                        <th colspan="2" class="border border-black p-2">မဟာဘွဲ့</th>
                        <th colspan="2" class="border border-black p-2">စုစုပေါင်း</th>
                        <th colspan="2" class="border border-black p-2">ပါရဂူဘွဲ့</th>
                    </tr>
                    <tr>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-2">၁</td>
                        <td class="border border-black p-2">၂</td>
                        <td class="border border-black p-2">၃</td>
                        <td class="border border-black p-2">၄</td>
                        <td class="border border-black p-2">၅</td>
                        <td class="border border-black p-2">၆</td>
                        <td class="border border-black p-2">၇</td>
                        <td class="border border-black p-2">၈</td>
                        <td class="border border-black p-2">၉</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">၈</td>
                        <td class="border border-black p-2">၉</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2">၁</td>
                        <td class="border border-black p-2">၁၂၃၀၀၀-၂၀၀၀-၁၂၃၀၀၀</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">အရာထမ်းပေါင်း</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">၁၂၃၀၀၀-၂၀၀၀-၁၂၃၀၀၀</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">အမှုထမ်းပေါင်း</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">စုစုပေါင်း</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                </tbody>
            </table>

            <div class="mx-60 my-8">
                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">လက်မှတ်</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">အမည်</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">ရာထူး</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">ဆက်သွယ်ရန်ဖုန်း</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>
            </div>

        </div>
    </div>
</div>
