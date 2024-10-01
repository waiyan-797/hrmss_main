<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">

            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>

            <div class="md:w-full p-4">
                <h1 class="text-center font-semibold text-base">HR Software
                    အတွက်ဝန်ထမ်းများ၏ကိုယ်ရေးမှတ်တမ်းရေးသွင်းခြင်းပုံစံ </h1>
                <img src="./img/{{ $staff->staff_photo }}" alt="" class="w-20 h-20 float-right mr-28">
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">အမည် (အပြည့်အစုံ)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">ငယ်အမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nick_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">ကျား/ မ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->gender->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">Attandance ID(Figer Print ID)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->attendid}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">GPMS ဝန်ထမ်းအမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->other_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး/ကိုးကွယ်သည့်ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->ethnics ? $staff->ethnic->name : '-' }}/
                        {{ $staff->religions ? $staff->religion->name : '-' }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">အမျိုးသားမှတ်ပုံတင်အမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">မွေးသက္ကရာဇ် (ရက်-လ-နှစ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-y')) }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားရာဇာတိနှင့်လိပ်စာအပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->place_of_birth.','.$staff->current_address_ward .','.$staff->current_address_street.','.$staff->current_address_township_or_town->name .','.$staff->current_address_district->name .','.$staff->current_address_region->name }}
                       </label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">ကိုယ်တွင်ထင်ရှားသောအမှတ်အသား</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->prominent_mark }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">အရပ်အမြင့် (ပေ-လက်မ)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5">{{ $staff->height_feet }}-{{ $staff->height_inch }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">မျက်စေ့အရောင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->eye_color }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">ဆံပင်အရောင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->hair_color }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၄။ </label>
                    <label for="name" class="md:w-1/3">သွေးအုပ်စု</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5">{{ $staff->blood_type->name }}</label>
                </div>
              
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၁၅။ </label>
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
                        <label for="">၁၆။ </label>
                        <h1 class="font-semibold text-base">ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း</h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th class="border border-black text-center p-2">စဉ်</th>
                                <th class="border border-black text-center p-2">ဘွဲ့ရရှိခဲ့သည့်တက္ကသိုလ်/ကျောင်း</th>
                                <th class="border border-black text-center p-2">ဘွဲ့ရရှိခဲ့သည့် နိုင်ငံ</th>
                                <th class="border border-black text-center p-2">ဘွဲ့ရရှိခဲ့သည့် ခုနှစ်</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff->schools as $index => $school)
                                <tr>
                                    <td class="border border-black text-center p-2">{{ $index + 1 }}</td>
                                    <td class="border border-black text-center p-2">{{ $school->school_name }}</td>
                                    <td class="border border-black text-center p-2">{{ $school->country->name ?? '-' }}</td> 
                                    <td class="border border-black text-center p-2">{{ $school->year }}</td>
                                </tr>
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၉။ </label>
                    <label for="name" class="md:w-1/3">ကျန်းမာရေး အခြေအနေ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->health_condition}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၀။ </label>
                    <label for="name" class="md:w-1/3">ဝါသနာပါသောအားကစား</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->habit }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၁။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူးအမျိုးအစား</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->current_rank->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၂။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိလစာနှုန်း</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->payscale?->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၃။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိလစာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->current_salary}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၄။ </label>
                    <label for="name" class="md:w-1/3">အစိုးရဝန်ထမ်းစဖြစ်သော (ရက်-လ-နှစ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->government_staff_started_date}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၅။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိဌာန၏အလုပ်ဝင်ရက်စွဲ (ရက်-လ-နှစ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->join_date}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၆။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူးရသည့်နေ့ (ရက်-လ-နှစ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->current_rank_date}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၇။ </label>
                    <label for="name" class="md:w-1/3">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ (အပြည့်အစုံဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->current_address_street.','.$staff->current_address_ward.','.$staff->current_address_township_or_town->name.','.$staff->current_address_district->name.','.$staff->current_address_region->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၈။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->permanent_address_street.','.$staff->permanent_address_ward.','.$staff->permanent_address_township_or_town->name.','.$staff->permanent_address_district->name.','.$staff->permanent_address_region->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၉။ </label>
                    <label for="name" class="md:w-1/3">ဆက်သွယ်နိုင်သောဖုန်းနံပါတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->phone}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၀။ </label>
                    <label for="name" class="md:w-1/3">အိမ်ထောင်ရှိ/ မရှိ (ဥပမာ- လူပျို/အပျို၊ မုဆိုးဖို/မုဆိုးမ၊
                        တစ်ခုလပ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->marital_statuses?->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၁။ </label>
                    <label for="name" class="md:w-1/3">ဝင်ငွေခွန်သက်သာခွင့် ရှိ/ မရှိ (ရှိကဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->tax_exception}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၂။ </label>
                    <label for="name" class="md:w-1/3">အခြားအမည်များ (ရှိလျှင်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->other_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၃။ </label>
                    <label for="name" class="md:w-1/3">အသားအရောင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->skin_color }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၄။ </label>
                    <label for="name" class="md:w-1/3">ကိုယ်အလေးချိန်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->weight }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၅။ </label>
                    <label for="name" class="md:w-1/3">ယခင်နေခဲ့ဖူးသောဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ
                        (တပ်မတော်သားဖြစ်ကတပ်လိပ်စာဖော်ပြရန်မလို)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->previous_addresses }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၆။</label>
                    <label for="name"
                        class="md:w-1/3">ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->is_parents_citizen_when_staff_born }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၇။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိအလုပ်အကိုင်ရလာပုံ
                        (ပြိုင်အရွေးခံ(သို့)တိုက်ရိုက်ခန့်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->form_of_appointment }}/
                        {{ $staff->is_direct_appointed }}</label>
                </div>
                
                <div class="w-full mb-4">
                    <div class="flex justify-start mb-2 space-x-3">
                        <label for="">၃၈။ </label>
                        <h1 class="font-semibold text-base">
                            အလုပ်အကိုင်အတွက် ထောက်ခံသူများ
                        </h1>
                    </div>
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th class="border border-black text-center p-2">စဉ်</th>
                                <th class="border border-black text-center p-2">ထောက်ခံသူ</th>
                                <th class="border border-black text-center p-2">ဝန်ကြီးဌာန</th>
                                <th class="border border-black text-center p-2">ဦးစီးဌာန</th>
                                <th class="border border-black text-center p-2">ရာထူး</th>
                                <th class="border border-black text-center p-2">အကြောင်းအရာ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff->recommendations as $index => $recommendation)
                                <tr>
                                    <td class="border border-black text-center p-2">{{ $index + 1 }}</td>
                                    <td class="border border-black text-center p-2">{{ $recommendation->recommend_by }}</td>
                                    <td class="border border-black text-center p-2">{{ $recommendation->ministry}}</td>
                                    <td class="border border-black text-center p-2">{{ $recommendation->department}}</td>
                                    <td class="border border-black text-center p-2">{{ $recommendation->rank}}</td>
                                    <td class="border border-black text-center p-2">{{ $recommendation->remark }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃၉။ </label>
                    <label for="name" class="md:w-1/3">မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊
                        ညီအစ်ကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီများတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက
                        အသေးစိတ်ဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->family_in_politics}}</label>
                </div>

                <h1 class="font-semibold text-base mb-4">
                    (တပ်မတော်တွင်တာဝန်မထမ်းဆောင်ခဲ့ဖူးပါကဖြည့်စွက်ရန်မလို)<br>တပ်မတော်တွင်တာဝန်ထမ်းဆောင်ခဲ့ဖူးပါက
                </h1>
                <div class="w-full mb-4">
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၁။ </label>
                        <label for="name" class="md:w-1/3">ပြန်တမ်းဝင်အမှတ်</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_gazetted_no}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၂။ </label>
                        <label for="name" class="md:w-1/3">ဗိုလ်သင်တန်းအမှတ်စဥ်</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_dsa_no}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၃။ </label>
                        <label for="name" class="md:w-1/3">စစ်မှုထမ်း‌ဟောင်းအဖွဲ့ဝင်အမှတ်နှင့်ရက်စွဲ</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->veteran_no}}/{{ $staff->veteran_date}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၄။ </label>
                        <label for="name" class="md:w-1/3">ကိုယ်ပိုင်အမှတ်</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_solider_no}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၅။ </label>
                        <label for="name" class="md:w-1/3">အဆင့်</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->current_rank?->name}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၆။ </label>
                        <label for="name" class="md:w-1/3">နောက်ဆုံးတာဝန်ထမ်းဆောင်ခဲ့သည့် တိုင်း၊ တပ်မ၊ တပ်ရင်း၊
                            တပ်ဖွဲ့</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->last_serve_army}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၇။ </label>
                        <label for="name" class="md:w-1/3">တပ်သို့ဝင်သည့်နေ့ (ရက်-လ-နှစ်)</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_join_date}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၈။ </label>
                        <label for="name" class="md:w-1/3">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့ (ရက်-လ-နှစ်)</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_gazetted_date}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၉။ </label>
                        <label for="name" class="md:w-1/3">အမှုထမ်းဆောင်ခဲ့သောတပ်များ</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_served_army}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၁၀။ </label>
                        <label for="name" class="md:w-1/3">တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_brief_history_or_penalty}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၁၁။ </label>
                        <label for="name" class="md:w-1/3">အငြိမ်းစားလစာ</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_pension}}</label>
                    </div>
                    <h2 class="font-semibold text-base mb-4"></h2>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၁၂။ </label>
                        <label for="name" class="md:w-1/3">ရက်စွဲ (ရက်-လ-နှစ်)</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->military_gazetted_date}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၁၃။ </label>
                        <label for="name" class="md:w-1/3">အကြောင်းအရာ</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->transfer_remark}}</label>
                    </div>
                    <h2 class="font-semibold text-base mb-4">အသက်အာမခံ</h2>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၁။ </label>
                        <label for="name" class="md:w-1/3">အဆိုပြုလွှာ</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->life_insurance_proposal}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၂။ </label>
                        <label for="name" class="md:w-1/3">ပေါ်လစီအမှတ်</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->life_insurance_policy_no}}</label>
                    </div>
                    <div class="flex justify-between w-full mb-2">
                        <label for="" class="md:w-5">၃။ </label>
                        <label for="name" class="md:w-1/3">ပရီမီယံ</label>
                        <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->life_insurance_premium}}</label>
                    </div>
                </div>

              
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၄၀။ </label>
                        <h2 class="font-semibold text-base">တက်ရောက်ခဲ့သောကျောင်းများ(မူလတန်း/အလယ်တန်း/အထက်တန်း)</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">ကျောင်းအမည်</th>
                                    <th class="p-2 border border-black">မှ (ရက်-လ-နှစ်)</th>
                                    <th class="p-2 border border-black">ထိ (ရက်-လ-နှစ်)</th>
                                    <th class="p-2 border border-black">အောင်မြင်ခဲ့သည့်အတန်း</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->schools as $index => $school)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $school->school_name }}</td>
                                        <td class="p-2 border border-black">{{ $school->from_date}}</td>
                                        <td class="p-2 border border-black">{{ $school->to_date}}</td>
                                        <td class="p-2 border border-black">{{ $school->education->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                
                
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၄၁။ </label>
                        <h2 class="font-semibold text-base">ဘွဲ့ရရှိခဲ့သောတက္ကသိုလ်များ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">တက္ကသိုလ်အမည်</th>
                                    <th class="p-2 border border-black">တက္ကသိုလ်တည်နေရာ</th>
                                    <th class="p-2 border border-black">အတန်း</th>
                                    <th class="p-2 border border-black">ခုံအမှတ်</th>
                                    <th class="p-2 border border-black">အထူးပြုဘာသာရပ်</th>
                                    <th class="p-2 border border-black">စတင်တက်ရောက်သော ရက်၊လ၊နှစ်</th>
                                    <th class="p-2 border border-black">ပြီးစီးသော ရက်၊လ၊နှစ်</th>
                                    <th class="p-2 border border-black">ဘွဲ့အမည်</th>
                                    <th class="p-2 border border-black">ဘွဲ့ရရှိခုနှစ်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->schools as $index => $school)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $school->school_name }}</td>
                                        <td class="p-2 border border-black">{{ $school->town }}</td>
                                        <td class="p-2 border border-black">{{ $school->semester ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $school->roll_no ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $school->major ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $school->from_date }}</td>
                                        <td class="p-2 border border-black">{{ $school->to_date }}</td>
                                        <td class="p-2 border border-black">{{ $school->education->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $school->year }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                

                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၂။ </label>
                    <label for="name" class="md:w-1/3">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး/ရွာရေး
                        ဆောင်ရွက်မှုများနှင့် အဆင့်အတန်း/တာဝန်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->student_life_political_social}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၃။ </label>
                    <label for="name" class="md:w-1/3">ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သော ကျန်းမာရေး/ အနုပညာ/
                        ပညာရေး/ စက်မှုလက်မှု</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->habit}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၄။ </label>
                    <label for="name" class="md:w-1/3">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->past_occupation}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၅။ </label>
                    <label for="name" class="md:w-1/3">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော
                        နယ်မြေတွင် နေခဲ့ဖူးလျှင် လုပ်ကိုင်ဆောင်ရွက်ချက်များကို ဖော်ပြပါ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->revolution}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၆။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော အကြောင်းအကျိုးနှင့်
                        လစာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->transfer_reason_salary}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၇။ </label>
                    <label for="name" class="md:w-1/3">အမှုထမ်းနေစဉ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဉ်
                        အဆင့်အတန်းနှင့် တာဝန်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->during_work_political_social}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၈။ </label>
                    <label for="name" class="md:w-1/3">စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့် နိုင်ငံရေးဘက်တွင်
                        ခင်မင်ရင်းနှီးသော မိတ်ဆွေများ ရှိ/ မရှိ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->has_military_friend}}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄၉။ </label>
                    <label for="name" class="md:w-1/3">မိမိနှင့် ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသား ရှိ/ မရှိ၊
                        ရှိကမည်သည့်အလုပ်အကိုင်၊ လူမျိုး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ရင်းနှီးသည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->foreigner_friend_name.'၊'.$staff->foreigner_friend_occupation.'၊'.$staff->foreigner_friend_nationality?->name.'၊'.$staff->foreigner_friend_country?->name.'၊'.$staff->foreigner_friend_how_to_know }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၅၀။ </label>
                    <label for="name" class="md:w-1/3">မိမိအားထောက်ခံသည့် (ကျောင်းဆရာ၊ ရပ်ကွက်လူကြီး၊
                        တပ်မတော်အရာရှိ)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">@foreach ($staff->recommendations  as $recommendation)
                       {{ $recommendation->recommend_by }}၊{{ $recommendation->ministry}}၊
                            {{ $recommendation->department}}
                    @endforeach</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၅၁။ </label>
                    <label for="name" class="md:w-1/3">ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/ မရှိ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{en2mm($staff->punishments->count())}}</label>
                </div>

                <h1 class="font-semibold text-base mb-1">မိသားစုအချက်အလက်များ</h1>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၂။ </label>
                        <h2 class="font-semibold text-base">ဖခင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">{{ $staff->father_name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->father_ethnic?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->father_religion?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->father_place_of_birth}}</td>
                                    <td class="p-2 border border-black">{{ $staff->father_occupation}}</td>
                                    <td class="p-2 border border-black">{{ $staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၃။ </label>
                        <h2 class="font-semibold text-base">မိခင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">{{ $staff->mother_name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->mother_ethnic?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->mother_religion?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->mother_place_of_birth}}</td>
                                    <td class="p-2 border border-black">{{ $staff->mother_occupation}}</td>
                                    <td class="p-2 border border-black">{{ $staff->mother_address_street.'၊'.$staff->mother_address_ward.'၊'.$staff->mother_address_township_or_town?->name.'၊'.$staff->mother_address_region?->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

               
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၄။</label>
                        <h2 class="font-semibold text-base">မိဘ၏ညီအစ်ကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                    <th class="p-2 border border-black">ကျား/မ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->siblings as $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation?->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->gender?->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic?->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->religion?->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၅။ </label>
                        <h2 class="font-semibold text-base">ဖခင်၏ညီအစ်ကိုမောင်နှမများ (တော်စပ်ပုံတွင်ဖခင်၏အစ်ကို၊
                            ဖခင်၏အစ်မစသည်ဖြင့်ဖြည့်စွက်ရန်)</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                    <th class="p-2 border border-black">ကျား/မ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->fatherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->gender->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->religion->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

              
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၆။ </label>
                        <h2 class="font-semibold text-base">မိခင်၏ညီအစ်ကိုမောင်နှမများ (တော်စပ်ပုံတွင်မိခင်၏အစ်ကို၊ မိခင်၏အစ်မစသည်ဖြင့်ဖြည့်စွက်ရန်)</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                    <th class="p-2 border border-black">ကျား/မ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->motherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? '' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->gender->name ?? '' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic->name ?? '' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->religion->name ?? '' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

               
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၇။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီးအမည်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach ($staff->spouses as $spouse)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $spouse->name }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->ethnic->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->religion->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $spouse->address }}</td>
                                    </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

              
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၅၈။ </label>
                        <h2 class="font-semibold text-base">သား/ သမီး</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">ကျား/ မ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->children as $index => $child)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $child->name }}</td>
                                        <td class="p-2 border border-black">{{ $child->gender->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $child->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $child->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $child->ethnic->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $child->religion->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $child->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                


                
               
<div class="w-full mb-4">
    <div class="mb-2 flex justify-start space-x-2">
        <label>၅၉။ </label>
        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီး၏ညီအစ်ကိုမောင်နှမများ</h2>
    </div>
    <div class="w-full rounded-lg">
        <table class="w-full text-center border-collapse border border-black">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border border-black">စဥ်</th>
                    <th class="p-2 border border-black">အမည်</th>
                    <th class="p-2 border border-black">ကျား/ မ</th>
                    <th class="p-2 border border-black">ဇာတိ</th>
                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                    <th class="p-2 border border-black">လူမျိုး</th>
                    <th class="p-2 border border-black">ဘာသာ</th>
                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                </tr>
            </thead>
            <tbody class="text-center h-8 p-2">
                @foreach ($staff->spouseSiblings as $index => $sibling)
                    <tr>
                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                        <td class="p-2 border border-black">{{ $sibling->gender->name ?? '-' }}</td>
                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? '-' }}</td>
                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                        <td class="p-2 border border-black">{{ $sibling->ethnic->name ?? '-' }}</td>
                        <td class="p-2 border border-black">{{ $sibling->religion->name ?? '-' }}</td>
                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၀။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီး၏ဖခင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">{{ $staff->spouse_father_name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_father_place_of_birth}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_father_occupation}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_father_ethnic?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_father_religion?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_father_address_street.','.$staff->spouse_father_address_ward.','.$staff->spouse_father_address_township_or_town?->name.','.$staff->spouse_father_address_district?->name.','.$staff->spouse_father_address_region?->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၁။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီးဖခင်၏ညီအစ်ကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">ကျား/ မ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->spouseFatherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->gender->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->religion->name ?? '-' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၂။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီး၏မိခင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">{{ $staff->spouse_mother_name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_mother_place_of_birth}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_mother_occupation}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_mother_ethnic?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_mother_religion?->name}}</td>
                                    <td class="p-2 border border-black">{{ $staff->spouse_mother_address_street.'၊'.$staff->spouse_mother_address_ward.'၊'.$staff->spouse_mother_address_township_or_town?->name.'၊'.$staff->spouse_mother_address_region?->name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

              
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၃။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ ဇနီး၏မိခင်၏ညီအစ်ကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">ကျား/ မ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">လူမျိုး</th>
                                    <th class="p-2 border border-black">ဘာသာ</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->spouseMotherSiblings as $index => $sibling)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->name }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->relation->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->place_of_birth }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->gender->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->occupation }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->ethnic->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->religion->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $sibling->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၄။ </label>
                        <h2 class="font-semibold text-base">ရရှိခဲ့သော Diploma/Certificateနှင့်
                            တက်ရောက်ထားသောသင်တန်းများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">Diploma/Certificate အမည်</th>
                                    <th class="p-2 border border-black">ကျောင်း/တက္ကသိုလ်/သင်တန်းအမည်</th>
                                    <th class="p-2 border border-black">မှ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">ထိ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">သင်တန်းကြေး</th>
                                    <th class="p-2 border border-black">Training<br>Type(local/foreign)</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->trainings as $index => $training)
                                <tr>
                                    <td class="p-2 border border-black">{{ $index + 1 }}.</td>
                                    <td class="p-2 border border-black">{{ $training->diploma_name }}</td>
                                    <td class="p-2 border border-black">{{ $training->trainingType->name ?? 'N/A' }}</td>
                                    <td class="p-2 border border-black">{{ $training->from_date }}</td>
                                    <td class="p-2 border border-black">{{ $training->to_date }}</td>
                                    <td class="p-2 border border-black">{{ $training->fees }}</td>
                                    <td class="p-2 border border-black">{{ $training->trainingLocation->name ?? 'N/A' }}</td>
                                    <td class="p-2 border border-black">{{ $training->remark }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

               
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၅။ </label>
                        <h2 class="font-semibold text-base">ရရှိခဲ့သောဆုတံဆိပ်များ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">ဆုတံဆိပ်အမျိူးအစား</th>
                                    <th class="p-2 border border-black">ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">အမိန့်စာအမှတ်နှင့်အမှတ်စဥ်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach ($staff->awards as $index => $award)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}။ </td>
                                        <td class="p-2 border border-black">{{ $award->awardType->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ \Carbon\Carbon::parse($award->order_date)->format('d-m-Y') }}</td>
                                        <td class="p-2 border border-black">{{ $award->order_no }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၆။ </label>
                        <h2 class="font-semibold text-base">နိုင်ငံခြားခရီးစဥ်များ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">သွား‌ရောက်သည့်နိုင်ငံ</th>
                                    <th class="p-2 border border-black">မှ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">ထိ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">သွား‌ရောက်သည့်အကြောင်းအရာ</th>
                                    <th class="p-2 border border-black">ထောက်ပံ့သည့်နိုင်ငံ/ အဖွဲ့အစည်း</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->abroads as $index => $abroad)
                                <tr>
                                    <td class="p-2 border border-black">{{ $index + 1 }}။ </td>
                                    <td class="p-2 border border-black">{{ $abroad->country->name ?? 'N/A' }}</td>
                                    <td class="p-2 border border-black">{{ $abroad->from_date }}</td>
                                    <td class="p-2 border border-black">{{ $abroad->to_date }}</td>
                                    <td class="p-2 border border-black">{{ $abroad->particular }}</td>
                                    <td class="p-2 border border-black">{{ $abroad->sponser }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

               
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၇။ </label>
                        <h2 class="font-semibold text-base">ယခင်လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">ဌာနအမည် (ဝန်ကြီးဌာန၊ ဦးစီးဌာန) အပြည့်အစုံဖော်ပြရန်</th>
                                    <th class="p-2 border border-black">ရာထူး</th>
                                    <th class="p-2 border border-black">မှ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">ထိ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">လစာစကေး</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->postings as $index => $posting)
                                <tr>
                                    <td class="p-2 border border-black">{{ $index + 1 }}။ </td>
                                    <td class="p-2 border border-black">{{ $posting->department->name ?? '-' }}</td>
                                    <td class="p-2 border border-black">{{ $posting->rank->name ?? '-' }}</td>
                                    <td class="p-2 border border-black">{{ $posting->from_date }}</td>
                                    <td class="p-2 border border-black">{{ $posting->to_date }}</td>
                                    <td class="p-2 border border-black">{{ $posting->rank->payscale->name ?? '-' }}</td>
                                    <td class="p-2 border border-black">{{ $posting->remark ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၈။ </label>
                        <h2 class="font-semibold text-base">လူမှုရေးလုပ်ဆောင်ချက်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အသင်းအဖွဲ့အမည်နှင့်လုပ်ဆောင်မှုများ</th>
                                    <th class="p-2 border border-black">မှ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">ထိ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->socialActivities as $index => $activity)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}။</td>
                                        <td class="p-2 border border-black">{{ $activity->particular }}</td>
                                        <td class="p-2 border border-black">{{ $activity->from_date }}</td>
                                        <td class="p-2 border border-black">{{ $activity->to_date}}</td>
                                        <td class="p-2 border border-black">{{ $activity->remark }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

               
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၆၉။ </label>
                        <h2 class="font-semibold text-base">ဘာသာစကားအချက်အလက်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">ဘာသာစကား</th>
                                    <th class="p-2 border border-black">အရေး</th>
                                    <th class="p-2 border border-black">အဖတ်</th>
                                    <th class="p-2 border border-black">အပြော</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($staff->staff_languages as $index => $language)
                                    <tr>
                                        <td class="p-2 border border-black">{{ $index + 1 }}။</td>
                                        <td class="p-2 border border-black">{{ $language->language->name ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $language->writing ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $language->reading ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $language->speaking ?? 'N/A' }}</td>
                                        <td class="p-2 border border-black">{{ $language->remark ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

              
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၇၀။ </label>
                        <h2 class="font-semibold text-base">ပြစ်ဒဏ်များ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center border-collapse border border-black">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">ပြစ်ဒဏ်</th>
                                    <th class="p-2 border border-black">မှ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">ထိ<br>ရက်-လ-နှစ်</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                @foreach($staff->punishments as $index => $punishment)
                                <tr>
                                    <td class="p-2 border border-black">{{ $index + 1 }}။</td>
                                    <td class="p-2 border border-black">{{ $punishment->penaltyType?->name ?? 'N/A' }}</td>
                                    <td class="p-2 border border-black">{{ \Carbon\Carbon::parse($punishment->from_date)->format('d/m/Y') }}</td>
                                    <td class="p-2 border border-black">{{ \Carbon\Carbon::parse($punishment->to_date)->format('d/m/Y') }}</td>
                                    <td class="p-2 border border-black">{{ $punishment->reason }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

            </div>


            <div class="flex justify-start space-x-2">
                <p>၇၁။ </p>
                <p class="mb-8">အထက်ပါအချက်အလက်များမှန်ကန်ကြောင်းလက်မှတ်ရေးထိုးပါသည်။</p>
            </div>

            <div class="p-4 float-right mr-32">
                <div class="flex justify-start mb-2">
                    <p class="w-32">လက်မှတ်</p>
                    <p class="w-40">-------------------------</p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="w-32">အမည်</p>
                    <p class="w-40">-------------------------</p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="w-32">ရာထူး</p>
                    <p class="w-40">-------------------------</p>
                </div>


                <div class="flex justify-start">
                    <p class="w-32">ဌာန</p>
                    <p class="w-40">-------------------------</p>
                </div>
            </div>


        </div>
    </div>
</div>
