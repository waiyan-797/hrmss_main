<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
        <x-primary-button type="button" wire:click="go_word({{ $staff->id }})">WORD</x-primary-button>
        <div class="w-full mx-auto px-3 py-4">
            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h2 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h2>
                <h2 class="font-semibold text-base mb-2 text-center">
                   ဒုတိယညွှန်ကြားရေးမှူး(သို့မဟုတ်) အဆင့်ရာထူးအတွက် အကဲဖြတ်မှတ်တမ်း</h2>
                <h2 class="font-semibold text-base mb-2 text-center">
                    {{ formatDMYmm($startDate)}} နေ့မှစ၍ {{ formatDMYmm($endDate)}} နေ့အထိ {{$staff->name}} ၏ အကဲဖြတ်မှတ်တမ်း</h2>
                       <div class="flex items-end justify-start gap-4 my-5">
                        <div class="w-40">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Start Date</label>
                            <x-date-picker wire:model.live="startDate" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    
                        <div class="w-40">
                            <label class="block mb-2 text-sm font-medium text-gray-700">End Date</label>
                            <x-date-picker wire:model.live="endDate" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                    
                       

                {{-- <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border border-black">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-4">၁။</th>
                                <th colspan="3" class="border border-black text-center p-4">ကိုယ်ရေးအချက်အလက်</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="border border-black text-center p-4"></th>
                                <th class="border border-black text-center p-4">(က)</th>
                                <th class="border border-black p-4">အမည်</th>
                                <th class="border border-black p-4">{{$staff->name}}</th>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ခ)</td>
                                <td class="border border-black  p-4">လူမျိုးနှင့် ကိုးကွယ်သည့်ဘာသာ</td>
                                <td class="border border-black  p-4">{{ collect([$staff->ethnic_id ? $staff->ethnic->name : '-', $staff->religion_id ? $staff->religion->name : '-'])->filter()->implode('၊') }}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဂ)</td>
                                <td class="border border-black  p-4">မွေးဖွားရာဇာတိ</td>
                                <td class="border border-black  p-4">{{$staff->place_of_birth}}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဃ)</td>
                                <td class="border border-black  p-4">အဘအမည်</td>
                                <td class="border border-black  p-4">{{$staff->father_name}}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(င)</td>
                                <td class="border border-black  p-4">အသက်(မွေးသက္ကရာဇ်)</td>
                                <td class="border border-black  p-4">{{formatDMYmm($staff->dob)}}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(စ)</td>
                                <td class="border border-black  p-4">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</td>
                                <td class="border border-black  p-4">{{ collect([
                                    $staff->nrc_region_id->name,
                                    $staff->nrc_township_code->name,
                                    $staff->nrc_sign->name,
                                    en2mm($staff->nrc_code),
                                ])->filter()->implode('၊') }}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဆ)</td>
                                <td class="border border-black  p-4">ထင်ရှားသည့်အမှတ်အသား</td>
                                <td class="border border-black  p-4">{{ $staff->prominent_mark }}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဇ)</td>
                                <td class="border border-black  p-4">လက်ရှိရာထူး</td>
                                <td class="border border-black  p-4">{{ $staff->current_rank->name}}</td>
                            </tr>
                            @php
                            $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                            $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                            $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
                        @endphp
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဈ)</td>
                                <td class="border border-black  p-4">လက်ရှိရာထူးရရှိသည့်နေ့နှင့်ရာထူးသက်</td>
                                <td class="border border-black  p-4">{{ formatDMYmm($staff->current_rank_date) }}<br>{{en2mm($age)}}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ည)</td>
                                <td class="border border-black  p-4">လက်ရှိအလုပ်အကိုင်ရလာပုံ</td>
                                <td class="border border-black  p-4">{{$staff->is_direct_appointed}}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဋ)</td>
                                <td class="border border-black  p-4">ပြိုင်အရွေးခံ(သို့)တိုက်ရိုက်ခန့်</td>
                                <td class="border border-black  p-4">{{ $staff->is_direct_appointed}}</td>
                            </tr>
                        @php
                        $join_date = \Carbon\Carbon::parse($staff->join_date);
                        $diff = $join_date->diff(\Carbon\Carbon::now());
                        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
                        @endphp

                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဌ)</td>
                                <td class="border border-black  p-4">စတင်တာဝန်ထမ်းဆောင်သည့်နေ့နှင့်
                                    စုစုပေါင်း အမှုထမ်းလုပ်သက်</td>
                                <td class="border border-black  p-4"> {{ formatDMYmm($staff->join_date) }}<br>{{en2mm($age)}}</td>
                            </tr>
                            
                            @php
                        $military_gazetted_date = \Carbon\Carbon::parse($staff->military_gazetted_date);
                        $diff = $military_gazetted_date->diff(\Carbon\Carbon::now());
                        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
                        @endphp
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဍ)</td>
                                <td class="border border-black  p-4">ပြန်တမ်းဝင်အရာရှိလုပ်သက်</td>
                                <td class="border border-black  p-4">{{ formatDMYmm($staff->military_gazetted_date)}}<br>{{en2mm($age)}}</td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဎ)</td>
                                <td class="border border-black  p-4">ဌာန/ဌာနခွဲ/ဌာနစိတ်</td>
                                <td class="border border-black  p-4">{{$staff->current_department?->name}}/{{$staff->current_division?->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div><br><br> --}}

                <div class="w-full">
                    <div class="flex justify-start w-full mb-2">
                        <label for="" class="w-8">၁။ </label>
                        <h2>ကိုယ်ရေးအချက်အလက်</h2>
                    </div>
                    <div class="w-full ml-7">
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(က) </label>
                            <label for="name" class="md:w-80 ml-3">အမည်</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{$staff->name}}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ခ) </label>
                            <label for="name" class="md:w-80 ml-3">လူမျိုးနှင့် ကိုးကွယ်သည့်ဘာသာ</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ collect([$staff->ethnic_id ? $staff->ethnic->name : '-', $staff->religion_id ? $staff->religion->name : '-'])->filter()->implode('၊') }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဂ) </label>
                            <label for="name" class="md:w-80 ml-3">မွေးဖွားရာဇာတိ</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{$staff->place_of_birth}}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဃ) </label>
                            <label for="name" class="md:w-80 ml-3">အဘအမည်</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ $staff->father_name}}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(င) </label>
                            <label for="name" class="md:w-80 ml-3">အသက်(မွေးသက္ကရာဇ်)</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ formatDMYmm($staff->dob) }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(စ) </label>
                            <label for="name" class="md:w-80 ml-3">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ collect([
                                        $staff->nrc_region_id->name,
                                        $staff->nrc_township_code->name,
                                        $staff->nrc_sign->name,
                                        en2mm($staff->nrc_code),
                                    ])->filter()->implode('၊') }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဆ) </label>
                            <label for="name" class="md:w-80 ml-3">ထင်ရှားသည့်အမှတ်အသား</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ $staff->prominent_mark }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဇ) </label>
                            <label for="name" class="md:w-80 ml-3">လက်ရှိရာထူး</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{$staff->current_rank->name}}</label>
                                                    </div>
                                                    @php
                            $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                            $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                            $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
                        @endphp
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဈ) </label>
                            <label for="name" class="md:w-80 ml-3">လက်ရှိရာထူးရရှိသည့်နေ့နှင့်ရာထူးသက်</label>
                            <label for="" class="md:w-5 ml-10">-</label>
                                <label for="name" class="md:w-3/5 ml-4">{{ formatDMYmm($staff->current_rank_date)}}<br>{{ en2mm($age)}}</label>
                        </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ည) </label>
                            <label for="name" class="md:w-80 ml-3">လက်ရှိအလုပ်အကိုင်ရလာပုံ </label>
                            <label for="" class="md:w-5 ml-10">-</label>
                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->is_direct_appointed}}</label>
                        </div>

                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဋ)</label>
                            <label for="name" class="md:w-80 ml-3">ပြိုင်ရွေးအရွေးခံ(သို့)တိုက်ရိုက်ခန့်</label>
                            <label for="" class="md:w-5 ml-10">-</label>
                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->is_direct_appointed}}</label>
                        </div>
                        @php
                        $join_date = \Carbon\Carbon::parse($staff->join_date);
                        $diff = $join_date->diff(\Carbon\Carbon::now());
                        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
                        @endphp
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဌ)</label>
                            <label for="name" class="md:w-80 ml-3">စတင်တာဝန်ထမ်းဆောင်သည့်နေနှင့်<br>စုစုပေါင်းအမှုထမ်းသက်</label>
                            <label for="" class="md:w-5 ml-10">-</label>
                                <label for="name" class="md:w-3/5 ml-4">{{ formatDMYmm($join_date) }}<br>{{en2mm($age)}}</label>
                        </div>
                        @php
                        $military_gazetted_date = \Carbon\Carbon::parse($staff->military_gazetted_date);
                        $diff = $military_gazetted_date->diff(\Carbon\Carbon::now());
                        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
                        @endphp

                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဍ)</label>
                            <label for="name" class="md:w-80 ml-3">ပြန်တမ်းဝင်အရာရှိလုပ်သက်</label>
                            <label for="" class="md:w-5 ml-10">-</label>
                                <label for="name" class="md:w-3/5 ml-4">{{ formatDMYmm($military_gazetted_date) }}<br>{{en2mm($age)}}</label>
                        </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဎ)</label>
                            <label for="name" class="md:w-80 ml-3">ဌာန/ဌာနခွဲ/ဌာနစိတ်</label>
                            <label for="" class="md:w-5 ml-10">-</label>
                                <label for="name" class="md:w-3/5 ml-4">{{$staff->current_department?->name}}/{{$staff->current_division?->name}}</label>
                        </div>
                    </div>

                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border border-black">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-4">၂။</th>
                                <th colspan="3" class="border border-black text-center p-4">
                                    ပညာဆည်းပူးသင်ယူလေ့လာခဲ့မှုအခြေအနေ</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-4">(က)</th>
                                <th class="border border-black  p-4">မူလတန်းမှ အလယ်တန်း</th>
                                <th class="border border-black  p-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ခ)</td>
                                <td class="border border-black  p-4">အလယ်တန်း</td>
                                <td class="border border-black  p-4"></td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဂ)</td>
                                <td class="border border-black  p-4">အထက်တန်း</td>
                                <td class="border border-black  p-4"></td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဃ)</td>
                                <td class="border border-black  p-4">တက္ကသိုလ်/ကောလိပ်</td>
                                <td class="border border-black  p-4">
                                    {{$staff->schools->map(fn($school) => $school->school_name)->join(', ')}}
                                </td>
                            </tr>
                             <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(င)</td>
                                <td class="border border-black  p-4">နောက်ဆက်တွဲဒီပလိုမာ/ဘွဲ့များ</td>
                                <td class="border border-black  p-4">{{ $staff->last_school_subject}}</td>
                            </tr> 
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(စ)</td>
                                <td class="border border-black  p-4">
                                    အခြားဆည်းပူးခဲ့သော ဘာသာရပ်များ။*ပြည်တွင်း/ပြည်ပ**
                                </td>
                                <td class="border border-black  p-4">
                                     @if($staff->abroads->isNotEmpty())
                                    <strong></strong>
                                    <ul>
                                        @foreach($staff->trainings as $training)
                                            @php
                                                $trainingNames = $training->training_type->pluck('name')->unique()->join(', ');
                                            @endphp
                                            <li>{{ $trainingNames }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span></span>
                                @endif
                            
                                    
                                    @if($staff->abroads->isNotEmpty())
                                        <strong></strong>
                                        <ul>
                                            @foreach($staff->abroads as $abroad)
                                                @php
                                                    $countryNames = $abroad->countries->pluck('name')->unique()->join(', ');
                                                @endphp
                                                <li>{{ $countryNames }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span></span>
                                    @endif 
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဆ)</td>
                                <td class="border border-black  p-4">ဌာနဆိုင်ရာစာမေးပွဲများ/သင်တန်းများ။
                                </td>
                                <td class="border border-black  p-4">
                                     {{-- @foreach ($staff->trainings->where('training_location_id', 1) as $index => $training)
                                    {{$trainingName = ($training->training_type_id == 32) ? $training->diploma_name : $training->training_type?->name}}
                                    @endforeach  --}}
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-black text-center p-4"></td>
                                <td class="border border-black text-center p-4">(ဇ)</td>
                                <td class="border border-black text-center p-4">ဝါသနာထုံမှု</td>
                                <td class="border border-black text-center p-4">{{ $staff->habit}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div><br>

                <p class="text-base mb-2 text-left">
                    *ဘာသာရပ်ဆိုင်ရာ၌ တက္ကသိုလ်ဘာသာရပ်များကို ဆိုလိုသည်</p>
                <p class="text-base mb-2 text-left">
                    မသက်ဆိုင်သော စကားလုံးကိုဖျက်ပါ။</p>
                <h1 class="text-base mb-2 text-left">
                    ၃။ အကဲဖြတ်အကဲဖြတ်၍ အမှတ်ပေးရမည့် အချက်များ</h1>
                <table class="md:w-full font-bold text-sm">
                    <thead>
                        <tr>
                            <th rowspan="2" class="border border-black text-center p-2">အမှတ်စဥ်</th>
                            <th rowspan="2" class="border border-black text-center p-2">အကြောင်းအရာ</th>
                            <th colspan="3" class="border border-black text-center p-2">အကဲဖြတ် အမှတ်(အမှတ်ပြည့်
                                ၂၀မှတ်စီ)</th>
                        </tr>
                        <tr>
                            <th class="border border-black text-center p-2">ကနဦး</th>
                            <th class="border border-black text-center p-2">ထပ်ဆင့်</th>
                            <th class="border border-black text-center p-2">ထပ်ဆင့်</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-black text-center p-2">၁</td>
                            <td class="border border-black text-center p-2">ခေါင်းဆောင်မှုပေးနိုင်ခြင်း</td>
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2"></td>

                        </tr>


                        <tr>
                            <td class="border border-black text-center p-2">၂</td>

                            <td class="border border-black p-2">ယုံကြည်စိတ်ချရခြင်း</td>
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"> </td>

                        </tr>


                        <tr>
                            <td class="border border-black text-center p-2">၃</td>
                            <td class="border border-black p-2 font-semibold">လုပ်ငန်းကျွမ်းကျင်မှုရှိခြင်း</td>
                            <td class="border border-black p-2 font-semibold"></td>
                            <td class="border border-black p-2 font-semibold">
                            </td>
                            <td class="border border-black p-2 font-semibold">
                            </td>
                        </tr>
                        <tr>

                            <td class="border border-black text-center p-2">၄</td>
                            <td class="border border-black p-2">တာဝန်ကိုလိုလားစွာထမ်းဆောင်ခြင်း</td>
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
                            <td class="border border-black p-2"></td>
                        </tr>
                        <tr>

                            <td class="border border-black text-center p-2">၅
                            </td>
                            <td class="border border-black p-2 font-semibold">ဆက်ဆံရေးပြေပြစ်ခြင်း</td>
                            <td class="border border-black p-2 font-semibold">
                            </td>
                            <td class="border border-black p-2 font-semibold">
                            </td>
                            <td class="border border-black p-2 font-semibold"></td>
                        </tr>
                        <tr>
                            <td class="border border-black p-2 font-semibold">
                            </td>
                            <td class="border border-black p-2 font-semibold">အမှတ်ပေါင်း</td>
                            <td class="border border-black p-2 font-semibold">

                            </td>
                            <td class="border border-black p-2 font-semibold">

                            </td>
                            <td class="border border-black p-2 font-semibold">
                            </td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <h2 class="font-semibold text-base mb-2 text-left">
                    (နိုင်ငံဝန်ထမ်း နည်းဉပဒေ ၄၇)</h2>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2">ကနဦးမှတ်တမ်းရေးသူ၏</label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">လက်မှတ်</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">အမည်</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">ရာထူး</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">ဌာန</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">နေ့စွဲ</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>




                <h2 class="font-semibold text-base mb-2 text-left">
                   ထပ်ဆင့်မှတ်တမ်းရေးသူ</h2>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2">(ဝန်ထမ်း အဖွဲ့အစည်းအကြီးအမှူး)၏</label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">လက်မှတ်</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">အမည်</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">ရာထူး</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">ဌာန</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-1/2"></label>
                    <label for="name" class="md:w-5"></label>
                    <label for="" class="md:w-5">နေ့စွဲ</label>
                    <label for="name" class="md:w-1/2"></label>
                </div>


                <h2 class="font-semibold text-base mb-2 text-left">
                    ထပ်ဆင့်မှတ်တမ်းရေးသူ</h2>
                 <div class="flex justify-between w-full mb-4">
                     <label for="" class="md:w-1/2">(ဝန်ကြီးဌာနနှင့်အဖွဲ့အစည်းကြီးအမှူး)၏ အမည်</label>
                     <label for="name" class="md:w-5"></label>
                     <label for="" class="md:w-5">ရာထူး</label>
                     <label for="name" class="md:w-1/2"></label>
                 </div>
                 <div class="flex justify-between w-full mb-4">
                     <label for="" class="md:w-1/2"></label>
                     <label for="name" class="md:w-5"></label>
                     <label for="" class="md:w-5">ဌာန</label>
                     <label for="name" class="md:w-1/2"></label>
                 </div>
                 <div class="flex justify-between w-full mb-4">
                     <label for="" class="md:w-1/2"></label>
                     <label for="name" class="md:w-5"></label>
                     <label for="" class="md:w-5">နေ့စွဲ</label>
                     <label for="name" class="md:w-1/2"></label>
                 </div>
                 <h1 class="font-semibold text-base mb-2 text-center">
                    [နိုင်ငံဝန်ထမ်းနည်းဉပဒေများ၊ နည်းဉဒေ ၄၆၊ နည်းဉပဒေခွဲ(ဂ)(ဃ)(င)]</h1>
                    <h1 class="text-base mb-2 text-left">
                        ၄။ အကဲဖြတ် အမှတ်ပေးခြင်းနှင့် စပ်လျဉ်း၍ အကျိုးအကြောင်း ဖော်ပြချက်</h1>
                        <div class="flex justify-between w-full mb-4">
                            <label for="" class="md:w-5"> </label>
                            <label for="name" class="md:w-1/3">အကဲဖြတ်ခံရသူအမည်</label>
                            <label for="" class="md:w-5">-</label>
                            <label for="name" class="md:w-3/5"></label>
                        </div>
                        <div class="flex justify-between w-full mb-4">
                            <label for="" class="md:w-5"> </label>
                            <label for="name" class="md:w-1/3">ရာထူး</label>
                            <label for="" class="md:w-5">-</label>
                            <label for="name" class="md:w-3/5"></label>
                        </div>
                            <p>အကဲဖြတ်မှတ်တမ်းရေးသူ၏ စိစစ်အကဲဖြတ်ခြင်းအတွက်ကျိုးကြောင်းဖော်ပြချက်(အချက်တစ် ချက်ချင်းစီ အတွက် သာမန်အောက် ၇ မှတ်နှင့်အောက် သို့မဟုတ် ထူးချွန်အဆင့်အတွက် ၁၆ မှတ်နှင့် အထက်ဖြစ်ပါက အကဲဖြတ်သူက ကျိုးကြောင်းဖော်ပြချက် ရေးသားရန်ဖြစ်ပါသည်။)</p>
                        <h1 class="font-semibold text-base mb-2 text-left">
                            [နိုင်ငံဝန်ထမ်းနည်းဉပဒေများ၊ နည်းဉဒေ ၄၇၊ နည်းဉပဒေခွဲ(စ)(၃)]</h1>
                            <div class="flex justify-between w-full mb-2">
                                <label for="name" class="md:w-5">(၁) </label>
                                <label for="name" class="md:w-1/3">ခေါင်း‌ဆောင်မှုပေးနိုင်ခြင်း</label>
                                <label for="name" class="md:w-5"></label>
                                <label for="name" class="md:w-3/5"></label>
                            </div><br>

                            <div class="flex justify-between w-full mb-2">
                                <label for="name" class="md:w-5">(၂) </label>
                                <label for="name" class="md:w-1/3">ယုံကြည်စိတ်ချရခြင်း</label>
                                <label for="name" class="md:w-5"></label>
                                <label for="name" class="md:w-3/5"></label>
                            </div><br>
                            <div class="flex justify-between w-full mb-2">
                                <label for="name" class="md:w-5">(၃) </label>
                                <label for="name" class="md:w-1/3">လုပ်ငန်းကျွမ်းကျင်မှုရှိခြင်း</label>
                                <label for="name" class="md:w-5"></label>
                                <label for="name" class="md:w-3/5"></label>
                            </div><br>
                            <div class="flex justify-between w-full mb-2">
                                <label for="name" class="md:w-5">(၄) </label>
                                <label for="name" class="md:w-1/3">တာဝန်ကို လိုလားစွာ ထမ်းဆောင်ခြင်း</label>
                                <label for="name" class="md:w-5"></label>
                                <label for="name" class="md:w-3/5"></label>
                            </div><br>
                            <div class="flex justify-between w-full mb-2">
                                <label for="name" class="md:w-5">(၅) </label>
                                <label for="name" class="md:w-1/3">ဆက်ဆံရေးပြေပြစ်ခြင်း</label>
                                <label for="name" class="md:w-5"></label>
                                <label for="name" class="md:w-3/5"></label>
                            </div><br>

                            <div class="mb-4">
                                
                
                                <div class="flex justify-end mb-2 ml-80 pt-8">
                                        <p class="md:w-1/4">အကဲဖြတ်သူ လက်မှတ်</p>
                                        <p class="md:w-5">-</p>
                                        <p class="md:w-1/2"></p>
                                    </div>
                                    <div class="flex justify-end mb-2 ml-80">
                                        <p class="md:w-1/4">အမည်</p>
                                        <p class="md:w-5">-</p>
                                        <p class="md:w-1/2"></p>
                                    </div>
                                    <div class="flex justify-end mb-2 ml-80">
                                        <p class="md:w-1/4">ရာထူး</p>
                                        <p class="md:w-5">-</p>
                                        <p class="md:w-1/2"></p>
                                    </div>
                                    <div class="flex justify-end mb-2 ml-80">
                                        <p class="md:w-1/4">ဌာန</p>
                                        <p class="md:w-5">-</p>
                                        <p class="md:w-1/2"></p>
                                    </div>
                                <div class="flex justify-start space-x-1 pb-4 pt-2">
                                    <p>ရက်စွဲ ၊ </p>
                                    <p>{{mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day))}}</p>
                                </div>
                            </div>
            </div>
        </div>
        </div>



    </div>
</div>
