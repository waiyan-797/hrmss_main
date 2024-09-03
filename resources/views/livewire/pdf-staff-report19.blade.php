<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Report 1၉</h1>
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
                <h1 class="text-center text-black font-semibold text-base mb-4">ကိုယ်ရေးမှတ်တမ်း</h1>
                <h2 class="text-center text-black font-semibold text-base">[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]</h2>
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
                    <label for="name" class="md:w-1/3">နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->nrc }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name"
                            class="md:w-3/5">{{ $staff->ethnic_name }}/{{ $staff->religion_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားရာအရပ်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name"
                            class="md:w-3/5">{{ $staff->ethnic_name }}/{{ $staff->place_of_birth }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">အဘအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->father_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->dob }}</label>
                    @endforeach
                </div>


                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->prominent_mark }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူး</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name"
                            class="md:w-3/5">{{ $staff->current_address_township_or_town_id }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းနေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name"
                            class="md:w-3/5">{{ $staff->current_address_township_or_town_id }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->education_name }}</label>
                    @endforeach
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">တတ်မြောက်သည့်အခြားဘာသာစကားနှင့်တတ်ကျွမ်းသည့်အဆင့်</label>
                    <label for="" class="md:w-5">-</label>
                    @foreach ($staffs as $staff)
                        <label for="name" class="md:w-3/5">{{ $staff->education_name }}</label>
                    @endforeach
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၃။ </label>
                        <h1 class="font-semibold text-base">တတ်ရောက်ခဲ့သည့်သင်တန်းများ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ကျောင်း/တက္ကသိုလ်/သင်တန်း</th>
                                    <th class="p-2 border border-black">မှ</th>
                                    <th class="p-2 border border-black">ထိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="border border-black p-2">ဒဂုံတက္ကသိုလ်</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၄။ </label>
                        <h1 class="font-semibold text-base">ထမ်းဆောင်ခဲ့သောတာဝန်များ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">တာဝန်</th>
                                    <th class="p-2 border border-black">ရုံး/ ဌာန/ အဖွဲ့အစည်း</th>
                                    <th class="p-2 border border-black">နေ့ရက်မှ</th>
                                    <th class="p-2 border border-black">နေ့ရက်ထိ</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="border border-black p-2">ဒဂုံတက္ကသိုလ်</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၅။ </label>
                        <h1 class="font-semibold text-base">ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့်
                            အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ အမည်နှင့်တာဝန်များ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အဖွဲ့အစည်း</th>
                                    <th class="p-2 border border-black">တာဝန်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="border border-black p-2">ဒဂုံတက္ကသိုလ်</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၆။ </label>
                        <h1 class="font-semibold text-base">ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">ဆုတံဆိပ်အမျိုးအစား</th>
                                    <th class="p-2 border border-black">ရက်၊ လ၊ နှစ်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="border border-black p-2">ဒဂုံတက္ကသိုလ်</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                    <td class="border border-black p-2">၂၅/၂၀၁၇</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၇။ </label>
                    <label for="name" class="md:w-1/3">အပြစ်ပေးခံရခြင်းများ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၈။ </label>
                    <label for="name" class="md:w-1/3">အခြားတင်ပြလိုသည့်အချက်များ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
            </div>

            <div class="mb-4">
                <div class="flex justify-start mb-8">
                    <p class="w-12 md:w-8">၁၉။ </p>
                    <p>အထက်ဖော်ပြပါ ဝန်ထမ်း၏ ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သတ်၍ မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည်ပြုပါသည်။</p>
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
                    <p class="w-24 md:w-20 mr-6">အဆင့်/ ရာထူး</p>
                    <p class="w-8">-</p>
                    <p class="w-full">wiogirspwubtssauhojghiughfgrhih</p>
                </div>

                <div class="flex justify-center items-center mb-4 ml-96">
                    <p class="w-24 md:w-20 mr-6">ရုံး/ ဌာန</p>
                    <p class="w-8">-</p>
                    <p class="w-full">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊</p>
                </div>

                <div class="flex flex-wrap justify-start space-x-4 md:space-x-14 mt-4">
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
