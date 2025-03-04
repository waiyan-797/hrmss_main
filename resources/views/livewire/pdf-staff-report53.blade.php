<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <div class="w-full ml-4 mb-4">
                <h1 class="text-center font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                    <img src="{{ $staff->staff_photo ? route('file', $staff->staff_photo) : asset('img/user.png') }}" alt="" class="w-20 h-20 float-right mr-28">

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">ငယ်အမည်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->nick_name ??'မရှိပါ' }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">အခြားအမည်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->other_name ??'မရှိပါ' }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    @php
                    $dob = \Carbon\Carbon::parse($staff->dob);
                    $diff = $dob->diff(\Carbon\Carbon::now());
                    $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                    @endphp
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">အသက်(မွေးသက္ကရာဇ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        {{ en2mm($age) . ' (' . en2mm($dob->format('d-m-Y')) . ')' }}
                    </label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုးနှင့် ကိုးကွယ်သည့်ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name"
                            class="md:w-3/5">{{collect([$staff->ethnic?->name,$staff->religion?->name,])->filter()->implode('၊')}}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">အရပ်အမြင့်</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name"
                            class="md:w-3/5">{{ en2mm($staff->height_feet) }}ပေ {{ en2mm($staff->height_inch) }}လက်မ</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">ဆံပင်အရောင်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->hair_color }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">မျက်စိအရောင်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->eye_color }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">ထင်ရှားသည့်အမှတ်အသား</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->prominent_mark }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အသားအရောင်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->skin_color }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">ကိုယ်အလေးချိန်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->weight }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားရာဇာတိ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->place_of_birth }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{$staff->nrc_region_id->name.$staff->nrc_township_code->name.$staff->nrc_sign->name.en2mm( $staff->nrc_code )}}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၄။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">
                        {{$staff->current_address_house_no.$staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'ဒေသကြီး။'}}
                    </label>
                                    </div>


                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၅။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name"
                            class="md:w-3/5">{{$staff->permanent_address_house_no.$staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_township_or_town->name.'မြို့နယ်၊'.$staff->permanent_address_region->name.'ဒေသကြီး။'}}</label>
                            </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၆။ </label>
                    <label for="name"
                        class="md:w-1/3">ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာ
                        ဖော်ပြရန်မလို)</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->previous_addresses }}</label>
                                    </div>

                <div class="w-full">
                    <div class="flex justify-start w-full mb-2">
                        <label for="" class="w-8">၁၇။ </label>
                        <h2>တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်</h2>
                    </div>
                    <div class="w-full ml-7">
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(က) </label>
                            <label for="name" class="md:w-80 ml-3">ကိုယ်ပိုင်အမှတ်</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_solider_no }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ခ) </label>
                            <label for="name" class="md:w-80 ml-3">တပ်သို့ဝင်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ formatDMYmm($staff->military_join_date) }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဂ) </label>
                            <label for="name" class="md:w-80 ml-3">ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_dsa_no }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဃ) </label>
                            <label for="name" class="md:w-80 ml-3">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ formatDMYmm($staff->military_gazetted_date) }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(င) </label>
                            <label for="name" class="md:w-80 ml-3">တပ်ထွက်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ formatDMYmm($staff->military_leave_date) }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(စ) </label>
                            <label for="name" class="md:w-80 ml-3">ထွက်သည့်အကြောင်း</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ $staff->military_leave_reason }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဆ) </label>
                            <label for="name" class="md:w-80 ml-3">အမှုထမ်းဆောင်ခဲ့သောတပ်များ</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ $staff->military_served_army }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဇ) </label>
                            <label for="name" class="md:w-80 ml-3">တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name"
                                    class="md:w-3/5 ml-4">{{ $staff->military_brief_history_or_penalty }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(ဈ) </label>
                            <label for="name" class="md:w-80 ml-3">အငြိမ်းစားလစာ</label>
                            <label for="" class="md:w-5 ml-10">-</label>

                                <label for="name" class="md:w-3/5 ml-4">{{ en2mm($staff->military_pension) }}</label>
                                                    </div>
                    </div>
                </div>

                {{-- <div class="flex justify-start w-full mb-4 ml-1">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-80 ml-3">ပညာအရည်အချင်း</label>
                    <label for="" class="md:w-5 ml-10">-</label>

                        <label for="name" class="md:w-3/5">
                            {{ $staff->staff_educations->map(function ($education) {
                                return $education->education?->name;
                            })->filter()->join(', ') }}
                        </label>
                                            </div> --}}

                                            @php
                                            $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
                                            @endphp
                                             <div class="flex justify-between w-full mb-4">
                                                <label for="" class="md:w-5">၈။</label>
                                                <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                                                <label for="" class="md:w-5">-</label>
                                                <label for="name" class="md:w-3/5">{{ $educationNames }}</label>
                                            </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၉။ </label>
                    <label for="name" class="md:w-1/3">အဘအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့်
                        အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ collect([
                            $staff->father_name,
                            $staff->father_ethnic?->name,
                            $staff->father_religion?->name,
                            $staff->father_place_of_birth,
                            $staff->father_occupation,
                        ])->filter()->implode('၊') }}

                           </label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၀။ </label>
                    <label for="name" class="md:w-1/3">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name"
                            class="md:w-3/5">
                            {{ collect([
                                $staff->father_address_street,
                                $staff->father_address_ward,
                                $staff->father_address_township_or_town?->name.'မြို့နယ်',
                                $staff->father_address_region?->name.'ဒေသကြီး',
                            ])->filter()->implode('၊') }}

                            </label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၁။ </label>
                    <label for="name" class="md:w-1/3">အမိအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့်
                        အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">
                            {{ collect([
                                $staff->mother_name,
                                $staff->mother_ethnic?->name,
                                $staff->mother_religion?->name,
                                $staff->mother_place_of_birth,
                                $staff->mother_occupation,
                            ])->filter()->implode('၊') }}

                        </label>
                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၂။ </label>
                    <label for="name" class="md:w-1/3">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name"
                            class="md:w-3/5">
                            {{ collect([
                                $staff->mother_address_street,
                                $staff->mother_address_ward,
                                $staff->mother_address_township_or_town?->name.'မြို့နယ်',
                                $staff->mother_address_region?->name.'ဒေသကြီး',
                            ])->filter()->implode('၊') }}
                        </label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၃။ </label>
                    <label for="name" class="md:w-1/3">ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသားဟုတ်/
                        မဟုတ်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name"
                            class="md:w-3/5">{{ $staff->is_parents_citizen_when_staff_born?'ဟုတ်ပါသည်':'မဟုတ်' }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၄။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->current_rank->name }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၅။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိဌာနအလုပ်ဝင်ရက်စွဲနှင့်လက်ရှိရာထူးရသည့်နေ့</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">
                            <!-- <span>{{ formatDMYmm($staff->join_date)}} </span><br> 3.3.25 , someone says join_date related is dica and use gov_staff_st_date     -->
                            <span>{{ formatDMYmm($staff->government_staff_started_date)}} </span><br>
                             <span>{{formatDMYmm($staff->current_rank_date)}}</span>
                        </label>

                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၆။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိအလုပ်အကိုင်ရလာပုံ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->is_direct_appointed }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၇။ </label>
                    <label for="name" class="md:w-1/3">ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->is_direct_appointed }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၈။ </label>
                    <label for="name" class="md:w-1/3">လစာဝင်ငွေ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->payscale?->name }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၉။</label>
                    <label for="name" class="md:w-1/3"> ဌာန၊ နေရာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊
                        ရန်ကုန်မြို့။</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃၀။</label>
                    <label for="name" class="md:w-1/3"> အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->recommendations->map(function ($recommendation) {
                        return $recommendation->recommend_by;
                    })->join(', ') }}</label>
                </div>
            </div>

            <div class="ml-4">

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၁။ </label>
                        <h2 class="text-base">ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                    <th rowspan="2" class="border border-black text-center p-2">အဆင့်/ရာထူး</th>
                                    <th colspan="2" class="border border-black text-center p-2">ကာလ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">ဌာန/နေရာ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                                </tr>
                                <tr>
                                    <th class="border border-black text-center p-2">မှ</th>
                                    <th class="border border-black text-center p-2">ထိ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($staff->postings->isNotEmpty())
                                @foreach ($staff->postings as $index => $posting)
                                <tr>
                                    <td class="border border-black text-center p-2">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                    <td class="border border-black text-center p-2">{{ $posting->rank->name ?? '' }}</td>
                                    <td class="border border-black text-center p-2">{{ formatDMYmm($posting->from_date) }}</td>
                                    <td class="border border-black text-center p-2">{{ formatDMYmm($posting->to_date) }}</td>
                                    <td class="border border-black text-center p-2">
                                        {{ $posting->division->name ?? '' }} / {{ $posting->department->name ?? '' }}/{{ $posting->location }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ $posting->remark}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၂။ </label>
                        <h2 class="text-base">ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8 border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @if ($staff->siblings->isNotEmpty())
                                @foreach($staff->siblings as $index=> $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')'}}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic?->name}}/{{ $sibling->religion?->name  }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? '' }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၃။ </label>
                        <h2 class="text-base">အဘ၏ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @if ($staff->fatherSiblings->isNotEmpty())
                                @foreach ($staff->fatherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">
                                            {{ $sibling->ethnic?->name }}၊{{ $sibling->religion?->name }}
                                        </td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation?->name }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၄။ </label>
                        <h2 class="text-base">အမိ၏ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @if ($staff->motherSiblings->isNotEmpty())
                                @foreach($staff->motherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">
                                            {{ $sibling->ethnic->name ?? '' }}၊{{ $sibling->religion->name ?? '' }}
                                        </td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? '' }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၅။ </label>
                        <h2 class="text-base">ခင်ပွန်း / ဇနီးသည်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($staff->spouses->isNotEmpty())
                                @foreach($staff->spouses as $index => $spouse)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->name }}</td>
                                        <td class="p-2 border border-black">
                                            {{ $spouse->ethnic->name }} / {{ $spouse->religion->name }}
                                        </td>
                                        <td class="p-2 border border-black">{{ $spouse->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->address }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->relation?->name }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၆။ </label>
                        <h2 class="text-base">သားသမီးများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @if ($staff->children->isNotEmpty())
                                @foreach ($staff->children as $index => $child)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $child->name }}</td>
                                        <td class="p-2 border border-black">
                                            {{ $child->ethnic?->name }}/{{ $child->religion?->name }}
                                        </td>
                                        <td class="p-2 border border-black">{{ $child->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $child->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $child->address }}</td>
                                        <td class="p-2 border border-black">{{ $child->relation?->name }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၇။ </label>
                        <h2 class="text-base">ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @if($staff->spouseSiblings->isNotEmpty())
                                @foreach($staff->spouseSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">
                                            {{ $sibling->ethnic->name ?? '' }} / {{ $sibling->religion->name ?? '' }}
                                        </td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? '' }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>




                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၈။ </label>
                        <h2 class="text-base">ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @if ($staff->spouseFatherSiblings->isNotEmpty())
                                @foreach($staff->spouseFatherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">
                                            {{ optional($sibling->ethnic)->name ?? ' - ' }}/{{ optional($sibling->religion)->name ?? ' - ' }}
                                        </td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ optional($sibling->relation)->name ?? ' - ' }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၉။ </label>
                        <h2 class="text-base">ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($staff->spouseMotherSiblings->isNotEmpty())
                                @foreach($staff->spouseMotherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.myanmarAlphabet($loop->index).')' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic?->name }} / {{ $sibling->religion?->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation?->name }}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="flex justify-around w-full">
                    <label for="" class="md:w-5">၄၀။ </label>
                    <label for="name" class="md:w-1/3">မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊
                        ညီအကိုမောင်နှမများ၊
                        သားသမီးများသည် နိုင်ငံရေးပါတီဝင်များတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက
                        အသေးစိတ်ဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5"> {{$staff->family_in_politics
                            ?  ($staff->family_in_politics_text ?? '')
                            : 'မရှိ'}}</label>
                                    </div>
            </div>

            <div class="w-full p-4">
                <h1 class="text-center text-base mb-4">ငယ်စဉ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်</h1>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">
                        @foreach($staff->schools as $school)
                        {{ $school->school_name}}/{{ $school->year}}
                        @endforeach
                    </label>
                </div>



                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊
                        ဘာသာရပ်အတိအကျဖော်ပြရန်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ collect([
                            $staff->last_school_name,
                            $staff->last_school_subject,
                            $staff->last_school_row_no,
                            $staff->last_school_major,
                        ])->filter()->implode('၊') }}</label>
                                    </div>



                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး
                        ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊
                        တာဝန်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->student_life_political_social }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">ဝါသနာပါပြီး၊
                        လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊
                        အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေး ၊ စက်မှုလက်မှု</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->habit }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->past_occupation}}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော
                        နယ်မြေတွင်
                        နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြပါ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->revolution }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်
                        ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->transfer_reason_salary }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name"
                        class="md:w-1/3">အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊
                        မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဉ် အဆင့်အတန်းနှင့်တာဝန်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->during_work_political_social }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင်
                        ခင်မင်ရင်းနှီးသော
                        မိတ်ဆွေများရှိ/ မရှိ</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ en2mm($staff->has_military_friend)? $staff->has_military_friend_text:'မရှိ'}}</label>
                                    </div>


                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၁၀။ </label>
                        <h2 class="text-base">နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">သွားရောက်ခဲ့သည့်နိုင်ငံ</th>
                                    <th class="p-2 border border-black">သွားရောက်ခဲ့သည့်အကြောင်း</th>
                                    <th class="p-2 border border-black">တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန</th>
                                    <th class="p-2 border border-black">ကာလ(မှ-ထိ)</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if($staff->abroads->isNotEmpty())
                                @foreach($staff->abroads as $index => $abroad)
                                    <tr>
                                        <td class="p-2 border border-black">{{ '('.en2mm($index + 1) .')'}}</td>
                                        <td class="p-2 border border-black">{{ $abroad->countries->pluck('name')->unique()->join(', ') }}</td>
                                        <td class="p-2 border border-black">{{ $abroad->particular }}</td>
                                        <td class="p-2 border border-black">{{ $abroad->meet_with }}</td>
                                        <td class="p-2 border border-black">{{ formatDMYmm($abroad->from_date) }} - {{ formatDMYmm($abroad->to_date) }}</td>
                                    </tr>
                                @endforeach
                                @else<tr>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                    <td class="p-4 border border-black"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက
                        မည်သည့်
                        အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည်</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ collect([
                            $staff->foreigner_friend_name,
                            $staff->foreigner_friend_occupation,
                            $staff->foreigner_friend_nationality?->name,
                            $staff->foreigner_friend_country?->name,$staff->foreigner_friend_how_to_know,
                        ])->filter()->implode('၊') }}</label>
                                    </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက်အရာရှိ/
                        မြို့နယ်/ ကျေးရွာ/
                        ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)</label>
                    <label for="" class="md:w-5">-</label>

                        <label for="name" class="md:w-3/5">{{ $staff->recommended_by_military_person }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">        {{ en2mm($staff->punishments->count() ? 'ရှိ' : 'မရှိ') }}
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <div class="flex justify-between w-full mb-4 ml-4">
                    {{-- <p class="">၁၉။ </p> --}}
                    <p>အထက်ပါဇယားကွက်များအတွင်း ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း
                        တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။</p>
                </div>

                <div class="flex justify-end mb-2 ml-80 pt-8">
                        <p class="md:w-1/4">လက်မှတ်</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2"></p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">ကိုယ်ပိုင်အမှတ်(သို့)နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်<br></p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->nrc_region_id->name.$staff->nrc_township_code->name.$staff->nrc_sign->name.en2mm( $staff->nrc_code )}}</p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">အဆင့်/ ရာထူး</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->current_rank->name}}</p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">အမည်</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->name}}</p>
                    </div>

                    <div class="flex justify-end mb-2 ml-80">
                        <p class="md:w-1/4">တပ်/ဌာန</p>
                        <p class="md:w-5">၊</p>
                        <p class="md:w-1/2">{{$staff->current_department?->name}}</p>
                    </div>


                <div class="flex justify-start space-x-1 pb-4 pt-2">
                    <p>ရက်စွဲ - </p>
                    <p>{{  mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}</p>
                </div>
            </div>


        </div>
    </div>
</div>
