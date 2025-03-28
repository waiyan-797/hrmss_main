<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button> --}}
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
                    <label for="name" class="md:w-3/5">{{collect([$staff->nrc_region_id->name.$staff->nrc_township_code->name.$staff->nrc_sign->name. en2mm( $staff->nrc_code )])->filter()->implode('၊')}}</label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{collect([$staff?->ethnic?->name,$staff->religion?->name,])->filter()->implode('၊')}}</label>
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
                    <label for="name" class="md:w-3/5">{{ formatDMYmm($staff->dob) }}</label>
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
                    <label for="name" class="md:w-3/5">
                        {{$staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'ဒေသကြီး။'}}

                    </label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းနေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->permanent_address_house_no.$staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_township_or_town->name.'မြို့နယ်၊'.$staff->permanent_address_region->name.'ဒေသကြီး။'}}</label>
                </div>
                @php
                $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
                @endphp
                 <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။  </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $educationNames }}</label>
                </div>
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၂။ </label>
                        <h1 class="">တတ်မြောက်သည့်အခြားဘာသာစကားနှင့်တတ်ကျွမ်းသည့်အဆင့်</h1>
                        @foreach ($staff->staff_languages as $lang)
                    <p>
                        <span class="">{{$lang->language->name}}</span> ,
                        <span class="">{{$lang->rank}}</span>
                        <br>
                    </p>
                @endforeach
                    </div>
                </div>

                {{-- <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၃။ </label>
                        <h1 class=" ">တက်ရောက်ခဲ့သည့်သင်တန်းများ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">သင်တန်း</th>

                                    <th class="p-2 border border-black">မှ</th>
                                    <th class="p-2 border border-black">ထိ</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($staff->trainings->isNotEmpty())
                                @foreach ($staff->trainings as $training)
                                    <tr>
                                        <td class="border border-black p-2">{{$training->training_type_id  == 32 ? $training->diploma_name :  $training->training_type->name  }}</td>
                                        <td class="border border-black p-2">{{formatDMYmm($training->from_date)}}</td>
                                        <td class="border border-black p-2">{{formatDMYmm($training->to_date)}}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၃။</label>
                        <h1 class=" ">တက်ရောက်ခဲ့သည့်သင်တန်းများ</h1>
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
                                @if ($staff->schools->isNotEmpty())
                                    @foreach ($staff->schools as $school)
                                        <tr>
                                            <td class="border border-black p-2">{{ $school->education }}</td>
                                            <td class="border border-black p-2">{{ $school->from_date }}</td>
                                            <td class="border border-black p-2">{{ $school->to_date }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                
                                @if ($staff->trainings->isNotEmpty())
                                    @foreach ($staff->trainings as $training)
                                        <tr>
                                            <td class="border border-black p-2">
                                                {{ $training->training_type_id == 32 ? $training->diploma_name : $training->training_type->name }}
                                            </td>
                                            <td class="border border-black p-2">{{ formatDMYmm($training->from_date) }}</td>
                                            <td class="border border-black p-2">{{ formatDMYmm($training->to_date) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                
                                @if ($staff->schools->isEmpty() && $staff->trainings->isEmpty())
                                    <tr>
                                        <td colspan="3" class="border border-black p-4 text-center">မရှိပါ</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                

                {{-- <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၄။ </label>
                        <h1 class=" ">ထမ်းဆောင်ခဲ့သောတာဝန်များ</h1>
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
                                @if ($staff->postings->isNotEmpty())
                                @foreach ($staff->postings as $posting)
                                    <tr>
                                         <td class="border border-black p-2"> {{ $posting->rank->name ?? '-' }}</td>

                                        <td class="border border-black p-2">{{$posting->department->name ?? '-'}}</td>
                                        <td class="border border-black p-2">{{formatDMYmm($posting->from_date)}}</td>
                                        <td class="border border-black p-2">{{formatDMYmm($posting->to_date)}}</td>
                                        <td class="border border-black p-2">{{$posting->remark}}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၄။ </label>
                        <h1 class=" ">ထမ်းဆောင်ခဲ့သောတာဝန်များ</h1>
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
                                @if ($staff->postings->isNotEmpty())
                                    @foreach ($staff->postings as $posting)
                                        <tr>
                                            <td class="border border-black p-2"> {{ $posting->rank->name ?? '-' }}</td>
                                            <td class="border border-black p-2">{{$posting->department->name ?? '-'}}</td>
                                            <td class="border border-black p-2">{{ formatDMYmm($posting->from_date) }}</td>
                                            <td class="border border-black p-2">
                                                {{-- {{ $posting->to_date ? formatDMYmm($posting->to_date) : now()->format('d-m-Y') }} --}}
                                                {{ $posting->to_date ? formatDMYmm($posting->to_date) : formatDMYmm(now()->toDateString()) }}
                                            </td>
                                            <td class="border border-black p-2">{{$posting->remark}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="border border-black p-4"></td>
                                        <td class="border border-black p-4"></td>
                                        <td class="border border-black p-4"></td>
                                        <td class="border border-black p-4"></td>
                                        <td class="border border-black p-4"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၅။ </label>
                        <h1 class=" ">ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့်
                            အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ အမည်နှင့်တာဝန်များ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အဖွဲ့အစည်း</th>
                                    <th class="p-2 border border-black">တာဝန်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                    <tr>
                                        <td class="border border-black p-2">(က)</td>
                                        <td class="border border-black p-2"></td>
                                        <td class="border border-black p-2"></td>
                                        <td class="border border-black p-2"></td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၆။ </label>
                        <h1 class="">ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ</h1>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">ဆုတံဆိပ်အမျိုးအစား</th>
                                    <th class="p-2 border border-black">ရက်၊ လ၊ နှစ်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($staff->awardings->isNotEmpty())
                                @foreach ($staff->awardings as $index=>$awarding)
                                    <tr>
                                        <td class="border border-black p-2">{{'('.myanmarAlphabet($loop->index).')'}}</td>
                                        <td class="border border-black p-2">{{$awarding->award_type->name .'/'. $awarding->award->name}}</td>
                                        <td class="border border-black p-2">{{$awarding->order_no}}</td>
                                        <td class="border border-black p-2">{{$awarding->remark}}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၉။ </label>
                    <label for="name" class="md:w-1/3">အပြစ်ပေးခံရခြင်းများ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"> {{$staff->punishments->map(function ($punishment) {
                        return $punishment->penalty_type->name;
                    })->join(', ')}}</label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၈။ </label>
                    <label for="name" class="md:w-1/3">အခြားတင်ပြလိုသည့်အချက်များ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>

                <div class="flex justify-end w-full mb-4 pt-5">

                    <label for="name" class="">(ဝန်ထမ်း၏ထိုးမြဲလက်မှတ်)</label>

                </div>
            </div>

            <div class="mb-4">
                <div class="flex justify-between w-full mb-4 ml-4">
                    <p>၁၉။ အထက်ဖော်ပြပါ ဝန်ထမ်း၏ ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သက်၍ မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည်ပြုပါသည်။</p>
                </div>

                <div class="flex justify-end mb-2 ml-80 pt-8">
                        <p class="md:w-1/4">လက်မှတ်</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2"></p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">အမည်</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->name}}</p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">အဆင့်/ ရာထူး</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->current_rank->name}}</p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">ရုံး/ ဌာန</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->current_department?->name}}</p>
                    </div>


                <div class="flex justify-start space-x-1 pb-4 pt-2">
                    <p>ရက်စွဲ၊ </p>
                    <p>{{  mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
