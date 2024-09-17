<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">PDF Staff Report53</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <div class="w-full ml-4 mb-4">
                <h1 class="text-center font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                    <img src="{{ $staff->staff_photo }}" alt="" class="w-20 h-20 float-right mr-28">
               
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
                   
                        <label for="name" class="md:w-3/5">{{ $staff->nick_name }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">အခြားအမည်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->other_name }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/2 text-right">အသက်(မွေးသက္ကရာဇ်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->dob }}</label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုးနှင့် ကိုးကွယ်သည့်ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name"
                            class="md:w-3/5">{{ $staff->ethnic_name }}/{{ $staff->religion_name }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">အရပ်အမြင့်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name"
                            class="md:w-3/5">{{ $staff->height_feet }}/{{ $staff->height_inch }}</label>
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
                  
                        <label for="name" class="md:w-3/5">{{ $staff->nrc }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၄။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name"
                            class="md:w-3/5">{{ $staff->current_address_township_or_town_id }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၅။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name"
                            class="md:w-3/5">{{ $staff->permanent_address_township_or_town_id }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၆။ </label>
                    <label for="name"
                        class="md:w-1/3">ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာ
                        ဖော်ပြရန်)</label>
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
                           
                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_join_date }}</label>
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
                                    class="md:w-3/5 ml-4">{{ $staff->military_gazetted_date }}</label>
                                                    </div>
                        <div class="flex justify-start w-full mb-4 ml-1">
                            <label for="" class="md:w-5">(င) </label>
                            <label for="name" class="md:w-80 ml-3">တပ်ထွက်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-10">-</label>
                           
                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_leave_date }}</label>
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
                           
                                <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_pension }}</label>
                                                    </div>
                    </div>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၈။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5"></label>
                        @endforeach
                      
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၉။ </label>
                    <label for="name" class="md:w-1/3">အဘအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာနှင့် ဇာတိနှင့်
                        အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name" class="md:w-3/5">{{ $staff->father_name }}၊
                            {{ $staff->father_ethnic_id }}၊ {{ $staff->father_religion_id }}၊
                            {{ $staff->father_place_of_birth }}၊ {{ $staff->father_occupation }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၀။ </label>
                    <label for="name" class="md:w-1/3">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>
                        <label for="name"
                            class="md:w-3/5">{{ $staff->father_address_township_or_town_id }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၁။ </label>
                    <label for="name" class="md:w-1/3">အမိအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာနှင့် ဇာတိနှင့်
                        အလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->mother_name }}၊
                            {{ $staff->mother_ethnic_id }}၊ {{ $staff->mother_religion_id }}၊
                            {{ $staff->mother_place_of_birth }}၊ {{ $staff->mother_occupation }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၂။ </label>
                    <label for="name" class="md:w-1/3">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name"
                            class="md:w-3/5">{{ $staff->mother_address_township_or_town_id }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၃။ </label>
                    <label for="name" class="md:w-1/3">ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသားဟုတ်/
                        မဟုတ်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name"
                            class="md:w-3/5">{{ $staff->is_parents_citizen_when_staff_born }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၄။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->current_rank_id }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၅။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်စတင်ဝင်ရောက်သည့်နေ့နှင့်လက်ရှိရာထူးရသည့်နေ့</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->join_date }}/{{ $staff->current_rank_date}}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၆။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိအလုပ်အကိုင်ရလာပုံ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->form_of_appointment }}</label>
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
                   
                        <label for="name" class="md:w-3/5">{{ $staff->payscale_id }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂၉။</label>
                    <label for="name" class="md:w-1/3"> ဌာန၊ နေရာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊
                        ရန်ကုန်မြို့။</label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃၀။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->recommend_by }}</label>
                                    </div>
            </div>

            <div class="ml-4">
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၁။ </label>
                        <h2 class= "text-base">ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full ml-8">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                                    <th rowspan="2" class="border border-black text-center p-2">အဆင့်</th>
                                    <th colspan="2" class="border border-black text-center p-2">ကာလ</th>
                                    <th rowspan="2" class="border border-black text-center p-2">တပ်/ဌာန</th>
                                    <th rowspan="2" class="border border-black text-center p-2">နေရာ</th>
                                </tr>
                                <tr>
                                    <th class="border border-black text-center p-2">မှ</th>
                                    <th class="border border-black text-center p-2">ထိ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-black text-center p-2">(က)</td>
                                    <td class="border border-black text-center p-2"></td>
                                    <td class="border border-black text-center p-2">၂၂-၆-၂၀၀၉</td>
                                    <td class="border border-black text-center p-2">၂၀-၃-၂၀၁၁</td>
                                    <td class="border border-black text-center p-2">
                                        ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန။နေပြည်တော်</td>
                                    <td class="border border-black text-center p-2">သထုံ</td>
                                </tr>
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
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black">ဗမာ၊ဗုဒ္ဓဘာသာ</td>
                                    <td class="p-2 border border-black">နတ္တလင်းမြို့</td>
                                    <td class="p-2 border border-black">ဈေးသည်</td>
                                    <td class="p-2 border border-black">
                                        မြောင်းတကာရွာ၊မှော်ဘီမြို့၊ရန်ကုန်၊တိုင်းဒေသကြီး။</td>
                                    <td class="p-2 border border-black">အစ်မ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၃။ </label>
                        <h2 class= "text-base">အဘ၏ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">၁</td>
                                    <td class="p-2 border border-black">ဦးဇော်မျိုးခိုင်</td>
                                    <td class="p-2 border border-black">ဗမာ၊ဗုဒ္ဓဘာသာ</td>
                                    <td class="p-2 border border-black">နတ္တလင်းမြို့</td>
                                    <td class="p-2 border border-black">တောင်သူ</td>
                                    <td class="p-2 border border-black">လယ်တာငယ်ရွာ၊နတ္တလင်းမြို့၊ပဲခူးတိုင်းဒေသကြီး။
                                    </td>
                                    <td class="p-2 border border-black">ညီ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၄။ </label>
                        <h2 class= "text-base">အမိ၏ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">၁</td>
                                    <td class="p-2 border border-black">ဦးကျော်စိုး</td>
                                    <td class="p-2 border border-black">ဗမာ၊ဗုဒ္ဓဘာသာ</td>
                                    <td class="p-2 border border-black">နတ္တလင်းမြို့</td>
                                    <td class="p-2 border border-black">တောင်သူ</td>
                                    <td class="p-2 border border-black">မြို့ပါတ်လမ်း၊ဇီးကုန်းမြို့၊ပဲခူးတိုင်းဒေသကြီး။
                                    </td>
                                    <td class="p-2 border border-black">မောင်</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၅။ </label>
                        <h2 class= text-base">ခင်ပွန်း၊ ဇနီးသည်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၆။ </label>
                        <h2 class= "text-base">သားသမီးများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">၁</td>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၇။ </label>
                        <h2 class= "text-base">ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">၁</td>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၈။ </label>
                        <h2 class= "text-base">ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <h1 class= "text-base"> </h1>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၃၉။ </label>
                        <h2 class= "text-base">ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="p-2 border border-black">ဇာတိ</th>
                                    <th class="p-2 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 border border-black">တော်စပ်ပုံ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
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
                   
                        <label for="name" class="md:w-3/5">{{ $staff->family_in_politics }}</label>
                                    </div>
            </div>

            <div class="w-full p-4">
                <h1 class="text-center text-base mb-4">ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်</h1>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">အ.မ.က လယ်တာငယ် (၂၀၀၂မှ၂၀၀၉ထိ)<br>အ.ထ.က(ခွဲ) ကြိုးကြာကန်
                        (၂၀၀၉ မှ
                        ၂၀၁၀ထိ)<br>အ.ထ.က လေးမျက်နှာ (၂၀၁၀ မှ ၂၀၁၂ထိ)<br>စစ်တက္ကသိုလ်၊ ပြင်ဦးလွင် (၂၀၁၃ မှ
                        ၂၀၁၇ထိ)</label>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊
                        ဘာသာရပ်အတိအကျဖော်ပြရန်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->last_school_name }}၊
                            {{ $staff->last_school_subject }}၊ {{ $staff->last_school_row_no }}၊
                            {{ $staff->last_school_major }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး
                        ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊
                        တာဝန်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->student_life_political_social }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">ဝါသနာပါပြီး၊
                        လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊
                        အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->habit }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5"></label>
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
                        မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အဆင့်အတန်းနှင့်တာဝန်</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5">{{ $staff->during_work_political_social }}</label>
                                    </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင်
                        ခင်မင်ရင်းနှီးသော
                        မိတ်ဆွေများရှိ/ မရှိ</label>
                    <label for="" class="md:w-5">-</label>
                   
                        <label for="name" class="md:w-3/5"></label>
                                    </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-2">
                        <label>၁၀။ </label>
                        <h2 class= "text-base">နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-8">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">စဥ်</th>
                                    <th class="p-2 border border-black">သွားရောက်ခဲ့သည့်နိုင်ငံ</th>
                                    <th class="p-2 border border-black">သွားရောက်ခဲ့သည့်အကြောင်း</th>
                                    <th class="p-2 border border-black">တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန</th>
                                    <th class="p-2 border border-black">ကာလ(မှ-ထိ)</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
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
                   
                        <label for="name" class="md:w-3/5">{{ $staff->foreigner_friend_name }}</label>
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
                    <label for="name" class="md:w-3/5"></label>
                </div>
            </div>

            <div class="p-6">
                <p class="mb-8">အထက်ပါဇယားကွက်များအတွင်း ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း
                    တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။</p>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">လက်မှတ်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5"></p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်)</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5"></p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">၇/နတလ(နိုင်)၁၅၂၂၀၁</p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">အဆင့်၊ ရာထူး</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ဦးစီးအရာရှိ</p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">အမည်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ဦးပြည့်စုံသူ</p>
                </div>

                <div class="flex justify-start mb-4">
                    <p class="md:w-1/3 ml-36">တပ်/ဌာန</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန။</p>
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
