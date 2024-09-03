<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Religion</h1>
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


            <div class="md:w-full p-4">
                <h1 class="text-center text-black font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                <img src="{{ $staff->staff_photo }}" alt="" class="w-20 h-20 float-right mr-28">
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">အသက်(မွေးနေ့သက္ကရာဇ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->dob }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->ethnic_id ? $staff->ethnic->name : 'error' }}/{{ $staff->religion_id ? $staff->religion->name : 'error' }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">အမျိုးသားမှတ်ပုံတင်အမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nrc }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်နှင့် ဌာန</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">အမှုထမ်းသက်(ဝင်ရောက်သည့်နေ့စွဲ)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">အဖအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">အမိအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name"
                        class="md:w-1/3">နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="" class="md:w-3/5"></label>
                </div>
                <div class="md:w-full mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th colspan="2" class="border border-black text-center p-2">ကာလ</th>
                                <th rowspan="2" class="border border-black text-center p-2">
                                    နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နှိင်ငံ</th>
                                <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကိစ္စ</th>
                                <th rowspan="2" class="border border-black text-center p-2">
                                    သင်တန်းတက်ခြင်းဖြစ်လျှင်အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်</th>
                                <th rowspan="2" class="border border-black text-center p-2">
                                    မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့ဖြင့်သွားရောက်သည်</th>
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
                                <td class="border border-black text-center p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-3">
                        <label>၁၄။ </label>
                        <h2 class="font-semibold text-base">ဇနီး/ခင်ပွန်း</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်(အခြားအမည်များရှိလျှင်လည်း ဖော်ပြရန်)</th>
                                    <th class="p-2 border border-black">လူမျိုး/နိုင်ငံသား</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်နှင့်ဌာန</th>
                                    <th class="p-2 border border-black">နေရပ်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2">မရှိပါ</td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-start mb-8">
                        <p class="md:w-8">၁၅။ </p>
                        <p>အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား
                            မှန်ကန်ကြောင်း
                            တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။</p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">လက်မှတ်</p>
                        <p>-</p>
                        <p></p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">အမည်</p>
                        <p>-</p>
                        <p></p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">အဆင့်</p>
                        <p>-</p>
                        <p></p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">တပ်/ ဌာန</p>
                        <p>-</p>
                        <p></p>
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
</div>
