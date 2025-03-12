<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <h1 class="text-center font-bold text-sm">ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန
            </h1>
            <h1 class="text-center font-bold text-sm">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="text-center font-bold text-sm">Report - 3</h1>

            <div class="flex justify-center items-center space-x-4 mb-1 mt-1">
                <div class="w-1/5">
                    <select wire:model.live="selectedEducationId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">ဘွဲ့ရွေးပါ</option>
                        @foreach ($educations as $education)
                            <option value="{{ $education->education_id }}">{{ $education->education?->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-1/5">
                    <select wire:model.live="selectedBloodId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">သွေးအုပ်စုရွေးပါ</option>
                        @foreach ($blood_types as $blood_type)
                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-1/5">
                    <select wire:model.live="selectedLanguageId"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="" style="color: grey;">တတ်ကျွမ်းသည့်ဘာသာစကား</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->language_id }}">{{ $language->language?->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap gap-4 justify-center mb-2">
                <div class="flex items-center mr-6">
                    <x-input-label value="အသက်" class="mr-2"/>
                    <x-text-input wire:model.live="age" class="!w-48 !border-2 rounded-md" />
                </div>
                မှ
                <div class="flex items-center">
                    <x-text-input wire:model.live="ageTwo" class="!w-48 !border-2 rounded-md" />
                </div>
                ထိ
                <div class="flex items-center">
                    <x-input-label value="အသက်အပိုင်းအခြားရွေးပါ" />
                    <select wire:model.live="signID"
                        class="ml-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                        <option value="all">အားလုံး</option>
                        <option value="between">နှစ်ကြား</option>
                        <option value=">">နှစ်အထက်</option>
                        <option value="=">နှစ်</option>
                        <option value="<">နှစ်အောက်</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap gap-4 justify-center mb-1">
                <div class="flex items-center mr-6">
                    <x-input-label value="လက်ရှိရာထူးရသောလုပ်သက်" class="mr-2"/>
                    <x-text-input wire:model.live="service" class="!w-48 !border-2 rounded-md" />
                </div>
                မှ
                <div class="flex items-center">
                    <x-text-input wire:model.live="serviceTwo" class="!w-48 !border-2 rounded-md" />
                </div>
                ထိ
                <div class="flex items-center">
                    <x-input-label value="လက်ရှိရာထူးရသောလုပ်သက်အပိုင်းအခြားရွေးပါ" />
                    <select wire:model.live="serviceSignID"
                        class="ml-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                        <option value="all">အားလုံး</option>
                        <option value="between">နှစ်ကြား</option>
                        <option value=">">နှစ်အထက်</option>
                        <option value="=">နှစ်</option>
                        <option value="<">နှစ်အောက်</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                {{ mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)) }}
            </div>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဝန်ထမ်းအမှတ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">အသက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လက်ရှိရာထူးရသောလုပ်သက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လုပ်သက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပညာအရည်အချင်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကျား/မ</th>
                        <th rowspan="2" class="border border-black text-center p-2">လူမျိုး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကိုးကွယ်သည့်ဘာသာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ
                        </th>
                        <th colspan="2" class="border border-black text-center p-2">သားသမီးအရေအတွက်</th>
                        <th colspan="2" class="border border-black text-center p-2">အိမ်ထောင်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကျန်းမာရေးအခြေအနေ</th>
                        <th rowspan="2" class="border border-black text-center p-2">သွေးအုပ်စု</th>
                        <th rowspan="2" class="border border-black text-center p-2">အရပ်အမြင့်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဝါသနာပါသောအားကစား</th>
                        <th rowspan="2" class="border border-black text-center p-2">သီးခြားတတ်ကျွမ်းသောဘာသာ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ကျား</th>
                        <th class="border border-black text-center p-2">မ</th>
                        <th class="border border-black text-center p-2">ရှိ</th>
                        <th class="border border-black text-center p-2">မရှိ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                                        <tr>
                                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
                                            <td style="word-wrap: break-word;white-space:normal" class="border border-black p-2">
                                                {{ $staff->name }}</td>
                                            <td style="word-wrap: break-word;white-space:normal"
                                                class="border border-black text-center p-2">{{ $staff->staff_no }}</td>
                                            <td style="word-wrap: break-word;white-space:normal" class="border border-black text-center">
                                                {{ $staff->current_rank?->name }}</td>
                                            @php
                                                $dob = \Carbon\Carbon::parse($staff->dob);
                                                $diff = $dob->diff(\Carbon\Carbon::now());
                                                $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                                            @endphp
                                            <td class="border border-black text-center p-2">
                                                {{ ' (' . en2mm($dob->format('d-m-Y')) . ')' . en2mm($age) }}</td>
                                            @php
                                                $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                                                $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                                                $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                                            @endphp
                                            <td class="border border-black text-center p-2">
                                                {{  ' (' . en2mm($current_rank_date->format('d-m-Y')) . ')' . en2mm($age)  }}</td>
                                            @php
                                                $join_date = \Carbon\Carbon::parse($staff->join_date);
                                                $diff = $join_date->diff(\Carbon\Carbon::now());
                                                $age = '(' . $diff->y . ' )နှစ် ' . '(' . $diff->m . ' )လ';
                                            @endphp
                                            <td class="border border-black text-center p-2">
                                                {{  ' (' . en2mm($join_date->format('d-m-Y')) . ')' . en2mm($age)  }}</td>
                                            <td style="word-wrap: break-word;" class="border border-black text-center p-2">
                                                @foreach ($staff->staff_educations as $education)
                                                    <div class="mb-2">{{ $education->education?->name }}</div>
                                                @endforeach
                                            </td>
                                            <td class="border border-black text-center p-2">{{ $staff->gender?->name }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff->ethnic?->name }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff->religion?->name }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{$staff->current_address_house_no . '၊' . $staff->current_address_street . '၊' . $staff->current_address_ward . '၊' . $staff->current_address_region?->name . '၊' . $staff->current_address_township_or_town?->name }}
                                            </td>
                                            <td class="border border-black text-center p-2">
                                                {{$staff->current_address_house_no . '၊' . $staff->permanent_address_street . '၊' . $staff->permanent_address_ward . '၊' . $staff->permanent_address_region?->name . '၊' . $staff->permanent_address_township_or_town?->name }}
                                            </td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($staff->children->where('gender_id', 1)->count()) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ en2mm($staff->children->where('gender_id', 2)->count()) }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff->spouse_name ? 'ရှိ' : '' }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff->spouse_name ? '' : 'မရှိ' }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff->health_condition }}</td>
                                            <td class="border border-black text-center p-2">{{ $staff->blood_type?->name }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ $staff->height_feet}}<br>{{$staff->height_inch }}</td>
                                            <td style="word-wrap: break-word;white-space:normal "
                                                class="border border-black text-center p-2">{{ $staff->habit }}</td>
                                            <td style="word-wrap: break-word;white-space:normal"
                                                class="border border-black text-center p-2">
                                                @foreach ($staff->staff_languages as $lang)
                                                    <div class="mb-2">{{ $lang?->language?->name }}</div>
                                                @endforeach
                                            </td>
                                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>