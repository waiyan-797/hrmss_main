<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">PDF Staff Report18</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'data_values' => $religion_types,
                'modal' => 'modals/religion_modal',
                'id' => $religion_type_id,
                'title' => 'religion',
                'search_id' => 'religion_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ]) --}}


            <div class="p-4 md:w-full">
                <h1 class="text-center text-black font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                <img src="{{ $staff->staff_photo }}" alt="" class="w-20 h-20 float-right mr-28">
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည် (ကျား/မ)</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">ဝန်ထမ်းအမှတ်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->staff_no }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">မွေးနေ့ (ရက်၊ လ၊ နှစ်)</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->dob }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ ဘာသာ</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->ethnic_id ? $staff->ethnic->name : 'error' }}/{{ $staff->religion_id ? $staff->religion->name : 'error' }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">အဘအမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->father_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">အမိအမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->mother_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၇။</label>
                    <label for="name" class="md:w-1/3">နိုင်ငံသားစိစစ်ရေးအမှတ်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nrc }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">ဇနီး/ခင်ပွန်းအမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">မရှိပါ။</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">သား/သမီးအမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">မရှိပါ။</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">လိပ်စာ</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="name" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူး/လစာနှုန်း/ဌာန</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="name" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">သွေးအုပ်စု</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->blood_type_id ? $staff->blood_type->name : 'error' }}</label>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၄။ </label>
                        <h1 class="font-semibold text-base">နိုင်ငံ့ဝန်ထမ်းတာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (စစ်ဘက်/နယ်ဘက်)
                        </h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">ရာထူး/ဌာန</th>
                                <th colspan="2" class="border border-black text-center p-2">တက်ရောက်သည့်ကာလ</th>
                                <th rowspan="2" class="border border-black text-center p-2">နေရာ/ဒေသ</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">မှ</th>
                                <th class="border border-black text-center p-2">ထိ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၅။ </label>
                        <h1 class="font-semibold text-base">ပြည်တွင်းသင်တန်းများ တက်ရောက်မှု</h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">သင်တန်းအမည်</th>
                                <th colspan="2" class="border border-black text-center p-2">တက်ရောက်သည့်ကာလ</th>
                                <th rowspan="2" class="border border-black text-center p-2">နေရာ/ဒေသ</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">မှ</th>
                                <th class="border border-black text-center p-2">ထိ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၆။ </label>
                        <h1 class="font-semibold text-base">ပြည်ပသင်တန်းများ တက်ရောက်မှု</h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">သင်တန်းအမည်</th>
                                <th colspan="2" class="border border-black text-center p-2">တက်ရောက်သည့်ကာလ</th>
                                <th rowspan="2" class="border border-black text-center p-2">နေရာ/ဒေသ</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">မှ</th>
                                <th class="border border-black text-center p-2">ထိ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၇။ </label>
                        <h1 class="font-semibold text-base">ပြစ်မှုမှတ်တမ်း</h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">ပြစ်ဒဏ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">ပြစ်ဒဏ်ချမှတ်ခံရသည့်
                                    အကြောင်းအရာ</th>
                                <th colspan="2" class="border border-black text-center p-2">ပြစ်ဒဏ်ချမှတ်သည့်ကာလ
                                </th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">မှ</th>
                                <th class="border border-black text-center p-2">ထိ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၈။ </label>
                        <h1 class="font-semibold text-base">ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်</th>
                                    <th class="p-2 border border-black">အမိန့်အမှတ်/ခုနှစ်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="border border-black p-2">၁</td>
                                    <td class="border border-black p-2">နိုင်ငံတော်စစ်မှုထမ်းတံဆိပ်</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇/လပခ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <p class="mb-8">အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း
                    တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။</p>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">လက်မှတ်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5"></p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">အမည်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ဒေါ်နှင်းစုမွန်
                    </p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">ရာထူး</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">လက်ထောက်ညွှန်ကြားရေးမှူး</p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">ဖုန်းနံပါတ်(ရုံး/လက်ကိုင်ဖုန်း)</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5"></p>
                </div>

                <div class="flex justify-start mb-4">
                    <p class="md:w-1/3 ml-36">အီး‌မေးလ်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">Snowsumon55@gmail.com</p>
                </div>

                <div class="flex justify-start space-x-14">
                    <p>ရက်စွဲ၊</p>
                    <p>ခုနှစ်၊</p>
                    <p>လ၊</p>
                    <p>ရက်</p>
                </div>
            </div>


        </div>
    </div>
</div>
