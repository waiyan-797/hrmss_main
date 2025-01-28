<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4 font-arial">
            <x-primary-button type="button" wire:click="go_pdf({{ $staff->id }})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{ $staff->id }})">WORD</x-primary-button>
            <div class="p-4 md:w-full">
                <h1 class="text-center text-black font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                <img src="{{ $staff->staff_photo ? route('file', $staff->staff_photo) : asset('img/user.png') }}"
                    alt="" class="w-20 h-20 float-right mr-28">
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည် (ကျား/မ)</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name ?? '-' }}</label>
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
                    <label for="name" class="md:w-3/5">{{ formatDMYmm($staff->dob) }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ဘာသာ</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5">{{ collect([$staff->ethnic->name ?? '-', $staff->religion->name ?? '-'])->filter()->implode('၊') }}</label>
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
                    <label for="name"
                        class="md:w-3/5">{{ collect([$staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . en2mm($staff->nrc_code)])->filter()->implode('၊') }}</label>
                </div>

                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">ဇနီး/ခင်ပွန်းအမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        @if ($staff->spouses->count() > 1)
                            {{ implode(', ', $staff?->spouses->pluck('name')->toArray()) }}
                        @else
                            {{ $staff?->spouses->first()?->name }}
                        @endif
                    </label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">သား/သမီးအမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        @if ($staff->children->count() > 1)
                            {{ implode(', ', $staff->children->pluck('name')->toArray()) }}
                        @else
                            {{ $staff->children->first()?->name }}
                        @endif
                    </label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">လိပ်စာ</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        {{ collect([$staff->current_address_street . $staff->current_address_ward . $staff->current_address_township_or_town->name . 'မြို့နယ်၊' . $staff->current_address_region->name . '။'])->filter()->implode('၊') }}
                    </label>
                </div>



                {{-- <div class="w-full mb-4">
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
                </div> --}}
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        {{ $staff->staff_educations->map(function ($education) {
                            return $education->education?->name;
                        })->filter()->join(', ') }}
                    </label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူး/လစာနှုန်း/ဌာန</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        {!! collect([$staff->current_rank?->name, $staff->payscale?->name, $staff->current_department?->name])->filter()->implode('<br>') !!}</label>
                    </label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="name" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">သွေးအုပ်စု</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->blood_type->name ?? '' }}</label>
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
                                <th colspan="2" class="border border-black text-center p-2">တာ၀န်ထမ်းဆောင်သည့်ကာလ
                                </th>
                                <th rowspan="2" class="border border-black text-center p-2">နေရာ/ဒေသ</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">မှ</th>
                                <th class="border border-black text-center p-2">ထိ</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($staff->past_occupations && $staff->past_occupations->isNotEmpty())
                                @foreach ($staff->past_occupations as $index => $occupation)
                                    <tr>
                                        <td class="border border-black text-center p-2">
                                            {{ '(' . myanmarAlphabet($loop->index) . ')' }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ $occupation->rank->name ?? '-' }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($occupation->from_date) ?? '-' }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($occupation->to_date) ?? '-' }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ $occupation->address ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
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
                            @if ($staff->trainings->isNotEmpty())
                                @foreach ($staff->trainings->where('training_location_id', 1) as $index => $training)
                                    <tr>
                                        <td class="border border-black text-center p-2">
                                            {{ '(' . myanmarAlphabet($loop->index) . ')' }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ $training->training_type->name }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($training->from_date) }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($training->to_date) }}</td>
                                        <td class="border border-black text-center p-2">{{ $training->location }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
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
                            @if ($staff->trainings->isNotEmpty())
                                @foreach ($staff->trainings->where('training_location_id', 2) as $training)
                                    <tr>
                                        <td class="border border-black text-center p-2">
                                            {{ '(' . myanmarAlphabet($loop->index) . ')' }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ $training->training_type->name }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($training->from_date) }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($training->to_date) }}</td>
                                        <td class="border border-black text-center p-2">{{ $training->location }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
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

                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၇။ </label>
                        <h1 class="font-semibold text-base">ပြစ်မှုမှတ်တမ်း</h1>
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
                            @if ($staff->punishments->isNotEmpty())
                                @foreach ($staff->punishments as $punishment)
                                    <tr>
                                         <td class="border border-black text-center p-2">
                                            {{ '(' . myanmarAlphabet($loop->index) . ')' }}</td> 
                                        <td class="border border-black text-center p-2">
                                            {{ $punishment->penalty_type->name }}</td>
                                        <td class="border border-black text-center p-2">{{ $punishment->reason }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($punishment->from_date) }}</td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($punishment->to_date) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                </tr>
                            @endif
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
                                <tr class="">
                                    <th class="p-2 border border-black">စဉ်</th>
                                    <th class="p-2 border border-black">ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်</th>
                                    <th class="p-2 border border-black">အမိန့်အမှတ်/ခုနှစ်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($staff->awardings->isNotEmpty())
                                    @foreach ($staff->awardings as $awarding)
                                        <tr>
                                            <td class="border border-black p-2">
                                                {{ '(' . myanmarAlphabet($loop->index) . ')' }}</td>
                                            <td class="border border-black p-2">
                                                {{ $awarding->award_type->name . '/' . $awarding->award->name }}</td>
                                            <td class="border border-black p-2">
                                                {{ $awarding->order_no . '/' . formatDMYmm($awarding->order_date) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                    <td class="border border-black text-center p-4"></td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <p class="mb-8">အထက်ပါ ဖြည့်စွက်ချက်များ မှန်ကန်ကြောင်း
                    လက်မှတ်ရေးထိုးပါသည်။</p>

                <div class="flex justify-end mb-2 ml-80">
                    <p class="md:w-1/4">လက်မှတ်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-1/2"></p>
                </div>

                <div class="flex justify-end mb-2 ml-80">
                    <p class="md:w-1/4">အမည်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-1/2">{{ $staff->name }}</p>
                </div>

                <div class="flex justify-end mb-2 ml-80">
                    <p class="md:w-1/4">ရာထူး</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-1/2">{{ $staff->current_rank->name }}</p>
                </div>

                <div class="flex justify-end mb-2 ml-80">
                    <p class="md:w-1/4">ဖုန်းနံပါတ်(ရုံး/လက်ကိုင်ဖုန်း)</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-1/2">{{ $staff->phone }} <br> {{ $staff->mobile }}</p>
                </div>

                <div class="flex justify-end mb-4 ml-80">
                    <p class="md:w-1/4">အီး‌မေးလ်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-1/2">{{ $staff->email }}</p>
                </div>

                <div class="flex justify-start space-x-1">
                    <p>ရက်စွဲ - </p>
                    <p>{{ mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}
                    </p>
                </div>
            </div>


        </div>
    </div>
</div>
