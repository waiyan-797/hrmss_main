<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Report 17</h1>
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
                @foreach ($staffs as $staff)
                    <img src="{{ $staff->staff_photo }}" alt="" class="w-20 h-20 float-right mr-28">
                @endforeach
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">အသက်(မွေးသက္ကရာဇ်)</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->dob }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name"
                            class="md:w-3/5">{{ $staff->ethnic_name }}/{{ $staff->religion_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">အမျိုးသားမှတ်ပုံတင်အမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->nrc }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">ရာထူး/ ဌာန</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">အမှုထမ်းလုပ်သက်၊ ဝင်ရောက်သည့်ရက်စွဲ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိ နေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->current_address_township_or_town_id }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->education_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">အဘအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->father_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->father_occupation }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">အမိအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->mother_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->mother_occupation }}</label>
                    @endforeach
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
                                <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည်ံ(၅)နှိင်ငံ
                                </th>
                                <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကိစ္စ</th>
                                <th rowspan="2" class="border border-black text-center p-2">
                                    သင်တန်းတက်ခြင်းဖြစ်လျှင်အောင်/ မအောင်</th>
                                <th rowspan="2" class="border border-black text-center p-2">
                                    မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့</th>
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
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီး</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2">မရှိပါ</td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <section class="md:w-full">
                        <div class="flex justify-start w-full mb-4">
                            <label for="" class="md:w-8">၁၅။ </label>
                            <label for="name" class="md:w-1/3">နိုင်ငံခြားသွားရောက်မည့်ကိစ္စ</label>
                        </div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="border border-black text-center p-2">သွားရောက်မည့်ကိစ္စ
                                    </th>
                                    <th rowspan="2" class="border border-black text-center p-2">စေလွှတ်သည့်နိုင်ငံ
                                    </th>
                                    <th colspan="2" class="border border-black text-center p-2">အချိန်ကာလ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">
                                        နိုင်ငံခြားသို့သွားရောက်မည့်နေ့</th>
                                    <th rowspan="2" class="border border-black text-center p-2">
                                        ထောက်ပံ့သည့်အဖွဲ့အစည်း</th>
                                    <th rowspan="2" class="border border-black text-center p-2">
                                        ပြန်ရောက်လျှင်အမှုထမ်းမည့်ဌာန/ ရာထူး</th>
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
                                    <td class="border border-black text-center p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                </div>

                {{-- <div class="mb-4">
                    <div class="flex justify-start mb-8">
                        <p class="md:w-8">၁၆။ </p>
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
                        <p class="md:w-20 mr-6">ရာထူး</p>
                        <p>-</p>
                        <p></p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">ဌာန</p>
                        <p>-</p>
                        <p>ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</p>
                    </div>

                    <div class="flex justify-start space-x-14">
                        <p>ရက်စွဲ၊</p>
                        <p>ခုနှစ်၊</p>
                        <p>လ၊</p>
                        <p>ရက်</p>
                    </div>
                </div> --}}

                <div class="mb-4">
                    <div class="flex justify-start mb-8">
                        <p class="w-12 md:w-8">၁၆။ </p>
                        <p>အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း
                            တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။</p>
                    </div>

                    <div class="flex justify-center items-center mb-2 ml-96">
                        <p class="w-24 md:w-20 mr-6">လက်မှတ်</p>
                        <p class="w-8">-</p>
                        <p class="w-full">fprehgseretrtersdtg3tg</p>
                    </div>

                    <div class="flex justify-center items-center mb-2 ml-96">
                        <p class="w-24 md:w-20 mr-6">အမည်</p>
                        <p class="w-8">-</p>
                        <p class="w-full">wpgoe d nuwepir</p>
                    </div>

                    <div class="flex justify-center items-center mb-2 ml-96">
                        <p class="w-24 md:w-20 mr-6">ရာထူး</p>
                        <p class="w-8">-</p>
                        <p class="w-full">wiogirspwubtssauhojghiughfgrhih</p>
                    </div>

                    <div class="flex justify-center items-center mb-4 ml-96">
                        <p class="w-24 md:w-20 mr-6">ဌာန</p>
                        <p class="w-8">-</p>
                        <p class="w-full">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊<br>
                            ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</p>
                    </div>

                    <div class="flex flex-wrap justify-start space-x-4 md:space-x-14 mt-4">
                        <p>ရက်စွဲ၊</p>
                        <p>ခုနှစ်၊</p>
                        <p>လ၊</p>
                        <p>ရက်</p>
                    </div>
                </div>


                <div class="mb-4">
                    <div class="flex justify-start mb-8">
                        <p class="md:w-8">၁၇။ </p>
                        <p>နိုင်ငံခြားသို့ သွားရောက်မည့်ပုဂ္ဂိုလ်၏လုပ်ရည်ကိုင်ရည်နှင့် အကျင့်စာရိတ္တ
                            ကောင်းမွန်ကြောင်းထပ်ဆင့် လက်မှတ်ရေးထိုးပါသည်။</p>
                    </div>

                    <div class="flex justify-center mb-2 ml-96">
                        <p class="w-24 md:w-20 mr-6">လက်မှတ်</p>
                        <p class="w-8">-</p>
                        <p class="w-full">fprehgseretrtersdtg3tg</p>
                    </div>

                    <div class="flex justify-center mb-2 ml-96">
                        <p class="w-24 md:w-20 mr-6">အမည်</p>
                        <p class="w-8">-</p>
                        <p class="w-full">wpgoe d nuwepir</p>
                    </div>

                    <div class="flex justify-center mb-2 ml-96">
                        <p class="w-24 md:w-20 mr-6">ရာထူး</p>
                        <p class="w-8">-</p>
                        <p class="w-full">wiogirspwubtssauhojghiughfgrhih</p>
                    </div>

                    <div class="flex justify-center mb-4 ml-96">
                        <p class="w-24 md:w-20 mr-6">ဌာန</p>
                        <p class="w-8">-</p>
                        <p class="w-full">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊<br>
                            ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</p>
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
