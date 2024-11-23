<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <div class="md:w-full p-4">
                <h1 class="text-center text-black font-semibold text-base mb-4">ကိုယ်ရေးမှတ်တမ်း</h1>
                <h2 class="text-center text-black font-semibold text-base">[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]</h2>
                <img src="{{ $staff->staff_photo ? route('file', $staff->staff_photo) : asset('img/user.png') }}" alt="" class="w-20 h-20 float-right mr-28">
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff?->ethnic?->name }}/{{ $staff->religion?->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားရာအရပ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->place_of_birth }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">အဘအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->father_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</label>
                </div>


                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->prominent_mark }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူး</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->current_rank->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းနေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_township_or_town->name }}</label>
                </div>
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၁။ </label>
                        <h1 class="font-semibold text-base">ပညာအရည်အချင်း
                        </h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th class="border border-black text-center p-2">စဉ်</th>
                                <th class="border border-black text-center p-2">Education Group</th>
                                <th class="border border-black text-center p-2">Education Type</th>
                                <th class="border border-black text-center p-2">Education</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff->staff_educations as $education)
                                <tr>
                                    <td class="border border-black text-center p-2">{{$loop->index + 1}}</td>
                                    <td class="border border-black text-center p-2">{{$education->education_group->name}}</td>
                                    <td class="border border-black text-center p-2">{{$education->education_type->name}}</td>
                                    <td class="border border-black text-center p-2">{{$education->education->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၂။ </label>
                        <h1 class="font-semibold text-base">တတ်မြောက်သည့်အခြားဘာသာစကားနှင့်တတ်ကျွမ်းသည့်အဆင့်</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ဘာသာစကား</th>
                                    <th class="p-2 border border-black">တတ်ကျွမ်းသည့်အဆင့်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($staff->staff_languages as $lang)
                                    <tr>
                                        <td class="border border-black p-2">{{$lang->language}}</td>
                                        <td class="border border-black p-2">{{$lang->rank}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၃။ </label>
                        <h1 class="font-semibold text-base">တက်ရောက်ခဲ့သည့်သင်တန်းများ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ကျောင်း/တက္ကသိုလ်/သင်တန်း</th>
                                    <th class="p-2 border border-black">မှ-ထိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($staff->trainings as $training)
                                    <tr>
                                        <td class="border border-black p-2">{{$training->training_type->name}}</td>
                                        <td class="border border-black p-2">{{$training->from_date}}</td>
                                        <td class="border border-black p-2">{{$training->to_date}}</td>
                                    </tr>
                                @endforeach
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
                                @foreach ($staff->past_occupations as $occupation)
                                    <tr>
                                        <td class="border border-black p-2">{{$occupation->rank->name}}</td>
                                        <td class="border border-black p-2">{{$occupation->department->name}}</td>
                                        <td class="border border-black p-2">{{$occupation->from_date}}</td>
                                        <td class="border border-black p-2">{{$occupation->to_date}}</td>
                                        <td class="border border-black p-2">{{$occupation->remark}}</td>
                                    </tr>
                                @endforeach
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
                                @foreach ($staff->past_occupations as $occupation)
                                    <tr>
                                        <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                        <td class="border border-black p-2">{{$occupation->department->name}}</td>
                                        <td class="border border-black p-2">{{$occupation->remark}}</td>
                                        <td class="border border-black p-2">{{$occupation->remark}}</td>
                                    </tr>
                                @endforeach
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
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($staff->awardings as $awarding)
                                    <tr>
                                        <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                        <td class="border border-black p-2">{{$awarding->award_type->name .'/'. $awarding->award->name}}</td>
                                        <td class="border border-black p-2">{{$awarding->order_date}}</td>
                                        <td class="border border-black p-2">{{$awarding->remark}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၇။ </label>
                        <h1 class="font-semibold text-base">အပြစ်ပေးခံရခြင်းများ</h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
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
                            @foreach ($staff->punishments as $punishment)
                                <tr>
                                    <td class="border border-black text-center p-2">{{$loop->index + 1}}</td>
                                    <td class="border border-black text-center p-2">{{$punishment->penalty_type->name}}</td>
                                    <td class="border border-black text-center p-2">{{$punishment->reason}}</td>
                                    <td class="border border-black text-center p-2">{{$punishment->from_date}}</td>
                                    <td class="border border-black text-center p-2">{{$punishment->to_date}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၈။ </label>
                    <label for="name" class="md:w-1/3">အခြားတင်ပြလိုသည့်အချက်များ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ဝန်ထမ်း၏ထိုးမြဲလက်မှတ်</label>
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
                    <p class="w-full"></p>
                </div>

                <div class="flex justify-center items-center mb-2 ml-96">
                    <p class="w-24 md:w-20 mr-6">အမည်</p>
                    <p class="w-8">-</p>
                    <p class="w-full"></p>
                </div>

                <div class="flex justify-center items-center mb-2 ml-96">
                    <p class="w-24 md:w-20 mr-6">အဆင့်/ ရာထူး</p>
                    <p class="w-8">-</p>
                    <p class="w-full"></p>
                </div>

                <div class="flex justify-center items-center mb-4 ml-96">
                    <p class="w-24 md:w-20 mr-6">ရုံး/ ဌာန</p>
                    <p class="w-8">-</p>
                    <p class="w-full"></p>
                </div>

                <div class="flex justify-start space-x-1">
                    <p>ရက်စွဲ - </p>
                    <p>{{ formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day) }}</p>
                </div>
            </div>

        </div>


    </div>
</div>
</div>
