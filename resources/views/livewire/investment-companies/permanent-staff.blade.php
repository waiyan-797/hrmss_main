<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Permanent Staff List</h1>
    </x-slot>
    <div class="md:w-full h-[83vh] overflow-y-auto">
        {{-- <div class="w-full mx-auto px-3 py-4">
            @include('table', [
                'data_values' => $ethnic_types,
                'modal' => 'modals/ethnic_modal',
                'id' => $ethnic_type_id,
                'title' => 'Ethnic',
                'search_id' => 'ethnic_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ])
        </div> --}}

        <h1 class="font-bold text-center text-base my-2">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
        <h2 class="text-center text-base mb-2">အမြဲတမ်းဝန်ထမ်းအင်အားစာရင်း</h2>
        <div class="flex justify-start space-x-4 mb-2 px-16">
            <p class="md:w-1/5">အဖွဲ့အစည်း</p>
            <p class="md:w-6">-</p>
            <p>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</p>
        </div>
        <div class="flex justify-start space-x-4 px-16">
            <p class="md:w-1/5">ဝန်ကြီးဌာနအမည်</p>
            <p class="md:w-6">-</p>
            <p>ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</p>
        </div>


        <table class="md:w-full mx-8 my-2">
            <thead>
                <tr class="font-bold">
                    <th rowspan="3" class="border border-black text-center p-2">အမှတ်စဥ်</th>
                    <th rowspan="3" class="border border-black text-center p-2">လစာနှုန်း(ကျပ်)</th>
                    <th colspan="4" class="border border-black text-center p-2">၂၀၂၄-၂၀၂၅<br>(၃၁-၅-၂၀၂၄)</th>
                    <th rowspan="3" class="border border-black text-center p-2">
                        (၃၁-၅-၂၀၂၄)<br>ရက်နေ့တွင်အမှန်<br>တကယ်ထုတ်ပေး<br>ရမည့်လစာငွေ<br>(ကျပ်သန်း)</th>
                    <th rowspan="3" class="border border-black text-center p-2">မှတ်ချက်</th>
                </tr>
                <tr class="font-bold">
                    <th rowspan="2" class="border border-black text-center p-2">ခွင့်ပြု</th>
                    <th colspan="3" class="border border-black text-center p-2">ခန့်ပြီး</th>
                </tr>
                <tr class="font-bold">
                    <th class="border border-black text-center p-2">ကျား</th>
                    <th class="border border-black text-center p-2">မ</th>
                    <th class="border border-black text-center p-2">ပေါင်း</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font-bold">
                    <td class="border border-black text-center p-2">၁</td>
                    <td class="border border-black text-center p-2">၂</td>
                    <td class="border border-black text-center p-2">၃</td>
                    <td class="border border-black text-center p-2">၄</td>
                    <td class="border border-black text-center p-2">၅</td>
                    <td class="border border-black text-center p-2">၆</td>
                    <td class="border border-black text-center p-2">၇</td>
                    <td class="border border-black text-center p-2">၈</td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2">၁</td>
                    <td class="border border-black text-center p-2">၄၁၈၀၀၀-၂၀၀၀-၁၂၃၀၀၀</td>
                    <td class="border border-black text-right p-2">၄</td>
                    <td class="border border-black text-right p-2">၂</td>
                    <td class="border border-black text-right p-2">၂</td>
                    <td class="border border-black text-right p-2">၄</td>
                    <td class="border border-black text-right p-2">၁.၇၀၈</td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
                <tr class="font-bold">
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                    <td class="border border-black text-right p-2">၃၇၅</td>
                    <td class="border border-black text-right p-2">၇၄</td>
                    <td class="border border-black text-right p-2">၁၆၇</td>
                    <td class="border border-black text-right p-2">၂၄၁</td>
                    <td class="border border-black text-right p-2">၇၄.၀၀၈</td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-left p-2">၁၂၃၀၀၀-၂၀၀၀-၁၂၃၀၀၀</td>
                    <td class="border border-black text-right p-2">၆</td>
                    <td class="border border-black text-right p-2">၁</td>
                    <td class="border border-black text-right p-2">၄</td>
                    <td class="border border-black text-right p-2">၅</td>
                    <td class="border border-black text-right p-2">၁.၁၈၈</td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
                <tr class="font-bold">
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">အမှုထမ်းပေါင်း</td>
                    <td class="border border-black text-right p-2">၄၈၄</td>
                    <td class="border border-black text-right p-2">၆၄</td>
                    <td class="border border-black text-right p-2">၁၄၇</td>
                    <td class="border border-black text-right p-2">၂၁၁</td>
                    <td class="border border-black text-right p-2">၄၀.၀၈၃</td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
                <tr class="font-bold">
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                    <td class="border border-black text-right p-2">၈၅၉</td>
                    <td class="border border-black text-right p-2">၁၃၈</td>
                    <td class="border border-black text-right p-2">၃၁၄</td>
                    <td class="border border-black text-right p-2">၄၅၂</td>
                    <td class="border border-black text-right p-2">၁၁၄.၀၉၁</td>
                    <td class="border border-black text-right p-2"></td>
                </tr>
                <tr>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">(၁လအတွက်လစာစရိတ်(ကျပ်သန်း))</td>
                    <td class="border border-black text-center p-2">၂၁၄.၀၀၁</td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2"></td>
                    <td class="border border-black text-center p-2">၁၁၄.၀၉၁</td>
                </tr>
            </tbody>
        </table>

        <div class="flex flex-col ml-96 mt-12">
            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">လက်မှတ်</p>
                <p class="md:w-5">၊</p>
                <p></p>
            </div>

            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">အမည်</p>
                <p class="md:w-5">၊</p>
                <p>ဒေါ်နှင်းစုမွန်
                </p>
            </div>

            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">ရာထူး</p>
                <p class="md:w-5">၊</p>
                <p>လက်ထောက်ညွှန်ကြားရေးမှူး</p>
            </div>

            <div class="flex flex-row mb-2">
                <p class="md:w-1/5">ဖုန်းနံပါတ်</p>
                <p class="md:w-5">၊</p>
                <p></p>
            </div>
        </div>

    </div>
</div>
