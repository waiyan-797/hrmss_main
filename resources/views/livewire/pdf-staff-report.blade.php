<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">PDF Staff Report</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- @include('table', [
                'data_values' => $religion_types,
                'modal' => 'modals/religion_modal',
                'id' => $religion_type_id,
                'title' => 'PDF Staff Report',
                'search_id' => 'religion_type_search',
                'columns' => ['No', 'Name', 'Action'],
                'column_vals' => ['name'],
            ]) --}}


            <div class="md:w-full p-4">
                <h1 class="text-center font-semibold text-base">ကိုယ်ရေးမှတ်တမ်း</h1>
                <img src="{{ $staff->staff_photo }}" alt="" class="w-20 h-20 float-right mr-28">
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁။ </label>
                    <label for="name" class="md:w-1/3">ဝန်ထမ်းအမှတ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->staff_no }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂။ </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">ငယ်အမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->nick_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">အခြားအမည်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->other_name }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">မွေးသက္ကရာဇ်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->dob }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">လူမျိုး</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5">{{ $staff->ethnic_id ? $staff->ethnic->name : 'error' }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">ဘာသာ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5">{{ $staff->religion_id ? $staff->religion->name : 'error' }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">အရပ်အမြင့်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->height_feet }}/{{ $staff->height_inch }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">ဆံပင်အရောင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->hair_color }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">မျက်စိအရောင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->eye_color }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">ထင်ရှားသည့်အမှတ်အသား</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->prominent_mark }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">အသားအရောင်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->skin_color }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">ကိုယ်အလေးချိန်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->weight }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၄။ </label>
                    <label for="name" class="md:w-1/3">မွေးဖွားရာဇာတိ</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->place_of_birth }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၅။ </label>
                    <label for="name" class="md:w-1/3">ကျား/မ</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->gender_id ? $staff->gender->name : 'error' }}</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၆။ </label>
                    <label for="name" class="md:w-1/3">သွေးအုပ်စု</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->blood_type_id }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၇။ </label>
                    <label for="name" class="md:w-1/3">ဖုန်းနံပါတ်</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->phone }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၈။ </label>
                    <label for="name" class="md:w-1/3">ရုံး</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->mobile }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၁၉။ </label>
                    <label for="name" class="md:w-1/3">လက်ကိုင်ဖုန်း</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->mobile }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၂၀။ </label>
                    <label for="name" class="md:w-1/3">အီး‌မေးလ်</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->email }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၂၁။ </label>
                    <label for="name" class="md:w-1/3">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->nrc }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၂၂။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->current_address_township_or_town_id }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5">၂၃။ </label>
                    <label for="name" class="md:w-1/3">အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ</label>
                    <label for="name" class="md:w-5">-</label>

                    <label for="name"
                        class="md:w-3/5">{{ $staff->permanent_address_township_or_town_id }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၄။ </label>
                    <label for="name"
                        class="md:w-1/3">ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က
                        တပ်လိပ်စာဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->previous_addresses }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂၅။ </label>
                    <label for="name" class="md:w-1/3">ပညာအရည်အချင်း(ရရှိထားသောတက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->staff_educations }}</label>

                </div>
            </div>

            <div class="md:w-full p-4">
                <h1 class="text-center font-semibold text-base mb-4">အလုပ်အကိုင်</h1>
                <div class="mb-4">
                    <div class="flex justify-start w-full mb-2">
                        <label for="" class="w-8">၁။ </label>
                        <h2>တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်</h2>
                    </div>
                    <div class="w-full ml-8">
                        <div class="flex justify-start mb-2">
                            <label for="" class="md:w-5">(က) </label>
                            <label for="name" class="md:w-96 ml-4">ကိုယ်ပိုင်အမှတ်</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_solider_no }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(ခ) </label>
                            <label for="name" class="md:w-96 ml-4">တပ်သို့ဝင်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_join_date }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(ဂ) </label>
                            <label for="name" class="md:w-96 ml-4">ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_dsa_no }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(ဃ) </label>
                            <label for="name" class="md:w-96 ml-4">ပြန်တမ်းဝင်ဖြစ်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_gazetted_date }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(င) </label>
                            <label for="name" class="md:w-96 ml-4">တပ်ထွက်သည့်နေ့</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_leave_date }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(စ) </label>
                            <label for="name" class="md:w-96 ml-4">ထွက်သည့်အကြောင်း</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_leave_reason }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(ဆ) </label>
                            <label for="name" class="md:w-96 ml-4">အမှုထမ်းဆောင်ခဲ့သောတပ်များ</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_served_army }}</label>

                        </div>
                        <div class="flex justify-start w-full mb-2">
                            <label for="" class="md:w-5">(ဇ) </label>
                            <label for="name" class="md:w-96 ml-4">တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name"
                                class="md:w-3/5 ml-4">{{ $staff->military_brief_history_or_penalty }}</label>

                        </div>
                        <div class="flex justify-start w-full">
                            <label for="" class="md:w-5">(ဈ) </label>
                            <label for="name" class="md:w-96 ml-4">အငြိမ်းစားလစာ</label>
                            <label for="" class="md:w-5 ml-1">-</label>

                            <label for="name" class="md:w-3/5 ml-4">{{ $staff->military_pension }}</label>

                        </div>
                    </div>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၂။</label>
                    <label for="name"
                        class="md:w-1/3">ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->is_parents_citizen_when_staff_born }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၃။ </label>
                    <label for="name" class="md:w-1/3">ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်နေ့</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->join_date }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">ဝန်ကြီးဌာန</label>
                    <label for="" class="md:w-5">-</label>s
                    <label for="name"
                        class="md:w-3/5">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၅။</label>
                    <label for="name" class="md:w-1/3">ဦးစီးဌာန</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name"
                        class="md:w-3/5">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">လစာဝင်ငွေ</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->payscale_id }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၇။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိအလုပ်အကိုင်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->current_rank_id }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိရာထူးရသည့်နေ့</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->current_rank_date }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">ပြောင်းရွေ့သည့်မှတ်ချက်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">စစ်မှုထမ်းခြင်းမှမသန်မစွမ်းမှုဖြင့်အကျူံးမဝင်မှု</label>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name" class="md:w-1/3">တွဲဖက်အင်အား ဖြစ်လျှင်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->side_department_id }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">လစာနှင့် စရိတ်ကျခံမည့်ဌာန</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->salary_paid_by }}</label>

                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၂။ </label>
                    <label for="name" class="md:w-1/3">လက်ရှိ အလုပ်အကိုင်ရလာပုံ</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->form_of_appointment }}</label>

                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->is_direct_appointed }}</label>

                </div>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-3">
                        <label>၁၄။ </label>
                        <h2 class="font-semibold text-base">အလုပ်အကိုင်အတွက် ထောက်ခံသူများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ထောက်ခံသူ</th>
                                    <th class="p-2 border border-black">ဝန်ကြီးဌာန</th>
                                    <th class="p-2 border border-black">နေရာ</th>
                                    <th class="p-2 border border-black">မှ</th>
                                    <th class="p-2 border border-black">ထိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">

                                <tr>
                                    <td class="border border-black p-2">{{ $staff->recommend_by }}</td>
                                    <td class="border border-black p-2">မရှိပါ</td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                    <td class="border border-black p-2"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-3">
                        <label>၁၅။ </label>
                        <h2 class="font-semibold text-base ">ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ရာထူး/အဆင့်</th>
                                    <th class="p-2 border border-black">တပ်/ဌာန</th>
                                    <th class="p-2 border border-black">နေရာ</th>
                                    <th class="p-2 border border-black">မှ</th>
                                    <th class="p-2 border border-black">ထိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="border border-black p-2">ဒုတိယဗိုလ်</td>
                                    <td class="border border-black p-2">အမှတ်(၁)ခြေမြန်တပ်ရင်း</td>
                                    <td class="border border-black p-2">သထုံ</td>
                                    <td class="border border-black p-2">၁-၁၂-၂၀၁၇</td>
                                    <td class="border border-black p-2">၃၀-၁၁-၂၀၁၈</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <h1 class="font-semibold text-base mb-2 text-center">မိဘဆွေမျိုးများ</h1>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <!-- <thead>
                      <tr class="bg-gray-100">
                        <th class="p-2 w-14 border border-black">၁။</th>
                        <th class="p-2 w-100 border border-black">တပ်/ဌာန</th>
                        <th class="w-6 border border-black">-</th>
                        <th class="p-2 w-28 border border-black">မှ</th>
                      </tr>
                    </thead> -->
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 w-14 border border-black">၁။</td>
                                    <td class="p-2 w-100 border border-black">အဘအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာနှင့်
                                        အလုပ်အကိုင်</td>
                                    <td class="p-2 w-6 border border-black">-</td>
                                    <td class="p-2 w-100 border border-black">
                                        ဦးရန်မျိုးအောင်၊ဗမာ၊ဗုဒ္ဓဘာသာ၊တောင်သူ
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 w-14 border border-black">၂။</td>
                                    <td class="p-2 w-100 border border-black">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</td>
                                    <td class="p-2 w-6 border border-black">-</td>
                                    <td class="p-2 w-100 border border-black">
                                        လယ်တာငယ်ရွာ၊နတ္တလင်းမြို့၊ပဲခူးတိုင်းဒေသကြီး</td>
                                </tr>
                            </tbody>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 w-14 border border-black">၃။</td>
                                    <td class="p-2 w-100 border border-black">အမိအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာနှင့်
                                        အလုပ်အကိုင်</td>
                                    <td class="p-2 w-6 border border-black">-</td>
                                    <td class="p-2 w-100 border border-black">ဒေါ်အေးအေးဆွေ၊ဗမာ၊ဗုဒ္ဓဘာသာ၊မှီခို။
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 w-14 border border-black">၄။</td>
                                    <td class="p-2 w-100 border border-black">၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ</td>
                                    <td class="p-2 w-6 border border-black">-</td>
                                    <td class="p-2 w-100 border border-black">
                                        လယ်တာငယ်ရွာ၊နတ္တလင်းမြို့၊ပဲခူးတိုင်းဒေသကြီး</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၅။ </label>
                        <h2 class="font-semibold text-base">ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                                    <td class="p-2 border border-black">ဒေါ်ယုယုနိုင်</td>
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
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၆။ </label>
                        <h2 class="font-semibold text-base">အဘ၏ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                                    <td class="p-2 border border-black">ဦးဇော်မျိုး</td>
                                    <td class="p-2 border border-black">ဗမာ၊ဗုဒ္ဓဘာသာ</td>
                                    <td class="p-2 border border-black">နတ္တလင်းမြို့</td>
                                    <td class="p-2 border border-black">တောင်သူ</td>
                                    <td class="p-2 border border-black">
                                        လယ်တာငယ်ရွာ၊နတ္တလင်းမြို့၊ပဲခူးတိုင်းဒေသကြီး။
                                    </td>
                                    <td class="p-2 border border-black">ညီ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၇။ </label>
                        <h2 class="font-semibold text-base">အမိ၏ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                                    <td class="p-2 border border-black">ဦးကျော်စိုး</td>
                                    <td class="p-2 border border-black">ဗမာ၊ဗုဒ္ဓဘာသာ</td>
                                    <td class="p-2 border border-black">ဇီးကုန်းမြို့</td>
                                    <td class="p-2 border border-black">တောင်သူ</td>
                                    <td class="p-2 border border-black">
                                        မြို့ပါတ်လမ်း၊ဇီးကုန်းမြို့၊ပဲခူးတိုင်းဒေသကြီး။
                                    </td>
                                    <td class="p-2 border border-black">မောင်</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၈။ </label>
                        <h2 class="font-semibold text-base">ဇနီး၊ခင်ပွန်း</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                                    <td class="p-2 border border-black">မရှိပါ</td>
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
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၉။ </label>
                        <h2 class="font-semibold text-base">သားသမီးများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                                    <td class="p-2 border border-black">မရှိပါ</td>
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
                    <div class="mb-2 flex justify-start space-x-3">
                        <label>၁၀။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                    <div class="mb-2 flex justify-start space-x-3">
                        <label>၁၁။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊
                            လူမျိုး၊
                            ဘာသာ၊ ဇာတိ၊
                            အလုပ်အကိုင်နှင့်နေရပ် လိပ်စာ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
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
                                    <td class="p-2 border border-black">မရှိပါ</td>
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
                    <div class="mb-2 flex justify-start space-x-3">
                        <label>၁၂။ </label>
                        <h2 class="font-semibold text-base">ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ၏ အမည်၊
                            လူမျိုး၊
                            ဘာသာ၊ ဇာတိ၊
                            အလုပ်အကိုင်နှင့်နေရပ် လိပ်စာ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 w-50 border border-black">အမည်</th>
                                    <th class="p-2 w-60 border border-black">လူမျိုး/ဘာသာ</th>
                                    <th class="w-50 border border-black">ဇာတိ</th>
                                    <th class="p-2 w-40 border border-black">အလုပ်အကိုင်</th>
                                    <th class="p-2 w-100 border border-black">နေရပ်လိပ်စာ</th>
                                    <th class="p-2 w-40 border border-black">တော်စပ်ပုံ</th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-between w-full mb-2">
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊
                        ညီအကိုမောင်နှမများ၊
                        သားသမီးများ နိုင်ငံရေးပါတီဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်)</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">မရှိပါ</label>
                </div>
            </div>

            <div class="w-full p-4">
                <h1 class="text-center font-semibold text-base">ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်</h1>
                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-4">
                        <label>၁။ </label>
                        <h2 class="font-semibold text-base">နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ရရှိခဲ့သော ဘွဲ့အမည်</th>
                                    <th class="p-2 border border-black">ကျောင်းအမည်</th>
                                    <th class="p-2 border border-black">မြို့</th>
                                    <th class="p-2 border border-black">ခုနှစ်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">မူ/လွန်တန်း</td>
                                    <td class="p-2 border border-black">အ.မ.က လယ်တာငယ်</td>
                                    <td class="p-2 border border-black">နတ္တလင်းမြို့</td>
                                    <td class="p-2 border border-black">၂၀၀၂မှ၂၀၀၉ထိ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၂။ </label>
                        <h2 class="font-semibold text-base">တက်ရောက်ခဲ့သော သင်တန်းများ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">သင်တန်းအမည်</th>
                                    <th class="p-2 border border-black">သင်တန်းကာလ(မှ)</th>
                                    <th class="p-2 border border-black">သင်တန်းကာလ(အထိ)</th>
                                    <th class="p-2 border border-black">သင်တန်းနေရာ/ဒေသ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">စစ်တက္ကသိုလ်ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်(၅၉)
                                    </td>
                                    <td class="p-2 border border-black">၂၅-၁၁-၂၀၁၃</td>
                                    <td class="p-2 border border-black">၁-၁၂-၂၀၁၇</td>
                                    <td class="p-2 border border-black">စတသ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၃။ </label>
                        <h2 class="font-semibold text-base">ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်များ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ဘွဲ့ထူး၊ ဂုဏ်ထူး တံဆိပ်အမည်</th>
                                    <th class="p-2 border border-black">အမိန့်အမှတ်/ခုနှစ်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">နိုင်ငံတော်စစ်မှုထမ်းတံဆိပ်</td>
                                    <td class="p-2 border border-black">၂၅/၂၀၁၇/လပခ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၄။ </label>
                    <label for="name" class="md:w-1/3">နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊
                        ဘာသာရပ်အတိအကျဖော်ပြရန်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->last_school_name }}</label>

                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၅။ </label>
                    <label for="name" class="md:w-1/3">ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး
                        ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊
                        တာဝန်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->student_life_political_social }}</label>

                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၆။ </label>
                    <label for="name" class="md:w-1/3">ဝါသနာပါပြီး၊
                        လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာ
                        အတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->habit }}</label>

                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၇။ </label>
                        <h2 class="font-semibold text-base">လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">အမည်</th>
                                    <th class="p-2 border border-black">ဦးစီးဌာန</th>
                                    <th class="p-2 border border-black">ဝန်ကြီးဌာန</th>
                                    <th class="p-2 border border-black">မှ</th>
                                    <th class="p-2 border border-black">အထိ</th>
                                    <th class="p-2 border border-black">မှတ်ချက်</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">ဗိုလ်ကြီးပြည့်စုံသူ</td>
                                    <td class="p-2 border border-black">ခမရ(၁)</td>
                                    <td class="p-2 border border-black">ကာကွယ်ရေးဝန်ကြီးဌာန</td>
                                    <td class="p-2 border border-black">၁-၁၂-၂၀၁၇</td>
                                    <td class="p-2 border border-black">၇-၃-၂၀၂၄</td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၈။ </label>
                    <label for="name" class="md:w-1/3">တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော
                        နယ်မြေတွင်
                        နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြရန်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->revolution }}</label>

                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၉။ </label>
                    <label for="name" class="md:w-1/3">အလုပ်အကိုင်
                        ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->transfer_reason_salary }}</label>

                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၀။ </label>
                    <label for="name"
                        class="md:w-1/3">အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊
                        မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အသင်း အဆင့်အတန်းနှင့်တာဝန်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->during_work_political_social }}</label>

                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၁။ </label>
                    <label for="name" class="md:w-1/3">စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင်
                        ခင်မင်ရင်းနှီးသော
                        မိတ်ဆွေများရှိ/ မရှိ</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->military_friend }}</label>

                </div>

                <div class="w-full mb-4">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၁၂။ </label>
                        <h2 class="font-semibold text-base">နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">သွားရောက်ခဲ့သည့်နိုင်ငံ</th>
                                    <th class="p-2 border border-black">သွားရောက်ခဲ့သည့်အကြောင်း</th>
                                    <th class="p-2 border border-black">တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန
                                    </th>
                                    <th class="p-2 border border-black">သွား၊ ပြန်သည့်နေ့</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
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
                    <label for="" class="md:w-5">၁၃။ </label>
                    <label for="name" class="md:w-1/3">မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက
                        မည်သည့်
                        အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည်</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->foreigner_friend_name }}</label>

                </div>

                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5">၁၄။ </label>
                    <label for="name" class="md:w-1/3">မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက်အရာရှိ/
                        မြို့နယ်/ ကျေးရွာ/
                        ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)</label>
                    <label for="" class="md:w-5">-</label>

                    <label for="name" class="md:w-3/5">{{ $staff->recommended_by_military_person }}</label>

                </div>

                <div class="w-full">
                    <div class="mb-2 flex justify-start space-x-5">
                        <label>၁၅။ </label>
                        <h2 class="font-semibold text-base">ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ</h2>
                    </div>
                    <div class="w-full rounded-lg">
                        <table class="w-full text-center ml-9">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2 border border-black">ပြစ်ဒဏ်</th>
                                    <th class="p-2 border border-black">ပြစ်ဒဏ်ချမှတ်ခံရသည့်အကြောင်းအရင်း</th>
                                    <th class="p-2 border border-black">မှ</th>
                                    <th class="p-2 border border-black">ထိ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center h-8 p-2">
                                <tr>
                                    <td class="p-2 border border-black">မရှိပါ</td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                    <td class="p-2 border border-black"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <p class="mb-8">အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း
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
                    <p class="md:w-1/3 ml-36">အဆင့်/ရာထူး</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ဦးစီးအရာရှိ</p>
                </div>

                <div class="flex justify-start mb-2">
                    <p class="md:w-1/3 ml-36">အမည်</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ပြည့်စုံသူ</p>
                </div>

                <div class="flex justify-start mb-4">
                    <p class="md:w-1/3 ml-36">တပ်ဌာန</p>
                    <p class="md:w-5">၊</p>
                    <p class="md:w-3/5">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</p>
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
