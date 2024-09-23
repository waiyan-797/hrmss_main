<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <div class="md:w-full p-4">
                <h1 class="text-center text-black font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                <img src="{{ $staff->staff_photo ? route('file', $staff->staff_photo) : asset('img/user.png') }}" alt="" class="w-20 h-20 float-right mr-28">
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
                    <label for="name" class="md:w-3/5">{{ $staff->ethnic_id ? $staff->ethnic->name : '-' }}/{{ $staff->religion_id ? $staff->religion->name : '-' }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">အမျိုးသားမှတ်ပုံတင်အမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်နှင့် ဌာန</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->current_rank->name .'/'. $staff->current_department->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">အမှုထမ်းသက်(ဝင်ရောက်သည့်နေ့စွဲ)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y'))}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        {{ $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_district->name.'/'.$staff->current_address_township_or_town->name }}
                    </label>
                </div>
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၈။ </label>
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
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">အဖအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->father_name}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->father_occupation}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">အမိအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->mother_name}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{$staff->mother_occupation}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name"
                        class="md:w-1/3">နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="" class="md:w-3/5">{{en2mm($staff->abroads->count())}}</label>
                </div>
                <div class="md:w-full mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th colspan="2" class="border border-black text-center p-2">ကာလ</th>
                                <th rowspan="2" class="border border-black text-center p-2">
                                    နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နှိင်ငံ</th>
                                <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကိစ္စ</th>
                                <th rowspan="2" class="border border-black text-center p-2">သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်</th>
                                <th rowspan="2" class="border border-black text-center p-2">မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့ဖြင့်သွားရောက်သည်</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">မှ</th>
                                <th class="border border-black text-center p-2">ထိ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff->abroads as $abroad)
                                <tr>
                                    <td class="border border-black text-center p-2">{{$loop->index + 1}}</td>
                                    <td class="border border-black text-center p-2">{{$abroad->from_date}}</td>
                                    <td class="border border-black text-center p-2">{{$abroad->to_date}}</td>
                                    <td class="border border-black text-center p-2">{{$abroad->country->name}}</td>
                                    <td class="border border-black text-center p-2">{{$abroad->particular}}</td>
                                    <td class="border border-black text-center p-2">{{$abroad->training_success_count}}</td>
                                    <td class="border border-black text-center p-2">{{$abroad->sponser}}</td>
                                </tr>
                            @endforeach
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
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach ($staff->spouses as $spouse)
                                    <tr>
                                        <td class="border border-black p-2">{{$spouse->name}}</td>
                                        <td class="border border-black p-2">{{$spouse->ethnic->name .'/'. $spouse->religion->name}}</td>
                                        <td class="border border-black p-2">{{$spouse->occupation}}</td>
                                        <td class="border border-black p-2">{{$spouse->address}}</td>
                                        <td class="border border-black p-2">{{$spouse->remark ?? '-'}}</td>
                                    </tr>
                                @endforeach
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
                        <p>{{auth()->user()->name}}</p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">အဆင့်</p>
                        <p>-</p>
                        <p>{{auth()->user()->role->name ?? ''}}</p>
                    </div>

                    <div class="flex justify-center mb-2 items-center">
                        <p class="md:w-20 mr-6">တပ်/ ဌာန</p>
                        <p>-</p>
                        <p></p>
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
