<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <h1 class="font-semibold text-base mb-2 text-center">
                    {{ $selectedEducationTypeName }}ရရှိခဲ့သူများစာရင်း</h1>
                <div class="mb-4">
                    <label for="education_type" class="block font-bold"></label>
                    <select wire:model.live="education_type_id" id="education_type" class="border rounded p-2">
                        <option value="">ပညာအရည်အချင်းအမျိုးအစားရွေးပါ</option>
                        @foreach ($educationTypes as $educationType)
                            <option value="{{ $educationType->id }}">{{ $educationType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full rounded-lg">
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                                @php
                                    $educationGroups = \App\Models\EducationGroup::whereBetween('id', [1, 5])->get();
                                @endphp
                                @foreach ($educationGroups as $educationGroup)
                                    <th colspan="3" class="border border-black text-center p-2">
                                        {{ strtoupper($educationGroup->name) }}
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">စုစုပေါင်း </th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">စုစုပေါင်း </th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">စုစုပေါင်း </th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">စုစုပေါင်း </th>
                                <th class="border border-black text-center p-2">ကျား</th>
                                <th class="border border-black text-center p-2">မ</th>
                                <th class="border border-black text-center p-2">စုစုပေါင်း </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($first_ranks as $rank)
                                @php
                                    $firstmaleCount1 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $firstfemaleCount1 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $firsttotalCount1 = $firstmaleCount1 + $firstfemaleCount1;
                                    $firsttotalMaleCount1 = collect($firstmaleCount1)->sum();
                                    $firsttotalFemaleCount1 = collect($firstfemaleCount1)->sum();
                                    $firsttotalMaleFemaleCount1 = collect($firsttotalCount1)->sum();

                                    $firstmaleCount2 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $firstfemaleCount2 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $firsttotalCount2 = $firstmaleCount2 + $firstfemaleCount2;
                                    $firsttotalMaleCount2 = collect($firstmaleCount2)->sum();
                                    $firsttotalFemaleCount2 = collect($firstfemaleCount2)->sum();

                                    $firsttotalMaleFemaleCount2 = collect($firsttotalCount2)->sum();

                                    $firstmaleCount3 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $firstfemaleCount3 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $firsttotalCount3 = $firstmaleCount3 + $firstfemaleCount3;
                                    $firsttotalMaleCount3 = collect($firstmaleCount3)->sum();
                                    $firsttotalFemaleCount3 = collect($firstfemaleCount3)->sum();

                                    $firsttotalMaleFemaleCount3 = collect($firsttotalCount3)->sum();

                                    $firstmaleCount4 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $firstfemaleCount4 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $firsttotalCount4 = $firstmaleCount4 + $firstfemaleCount4;
                                    $firsttotalMaleCount4 = collect($firstmaleCount4)->sum();
                                    $firsttotalFemaleCount4 = collect($firstfemaleCount4)->sum();

                                    $firsttotalMaleFemaleCount4 = collect($firsttotalCount4)->sum();

                                    $firstmaleCount5 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $firstfemaleCount5 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $firsttotalCount5 = $firstmaleCount5 + $firstfemaleCount5;
                                    $firsttotalMaleCount5 = collect($firstmaleCount5)->sum();
                                    $firsttotalFemaleCount5 = collect($firstfemaleCount5)->sum();

                                    $firsttotalMaleFemaleCount5 = collect($firsttotalCount5)->sum();
                                @endphp

                                <tr>
                                    <td class="border border-black text-center p-2"> {{ en2mm(++$count) }}</td>
                                    <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                                    <td class="border border-black text-center p-2">
                                        {{ en2mm($firstmaleCount1) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstfemaleCount1) }}
                                    </td>
                                    <td class="border border-black text-center p-2">
                                        {{ en2mm($firsttotalCount1) }}
                                    </td>

                                    <td class="border border-black text-center p-2">
                                        {{ en2mm($firstmaleCount2) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstfemaleCount2) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firsttotalCount2) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstmaleCount3) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstfemaleCount3) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firsttotalCount3) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstmaleCount4) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstfemaleCount4) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firsttotalCount4) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstmaleCount5) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firstfemaleCount5) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($firsttotalCount5) }}</td>
                                </tr>
                            @endforeach

                            @foreach ($second_ranks as $rank)
                                @php
                                    $secondmaleCount1 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $secondfemaleCount1 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $secondtotalCount1 = $secondmaleCount1 + $secondfemaleCount1;
                                    $secondtotalMaleCount1 = collect($secondmaleCount1)->sum();
                                    $secondtotalFemaleCount1 = collect($secondfemaleCount1)->sum();
                                    $secondtotalMaleFemaleCount1 = collect($secondtotalCount1)->sum();
                                    $secondmaleCount2 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $secondfemaleCount2 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $secondtotalCount2 = $secondmaleCount2 + $secondfemaleCount2;
                                    $secondtotalMaleCount2 = collect($secondmaleCount2)->sum();
                                    $secondtotalFemaleCount2 = collect($secondfemaleCount2)->sum();

                                    $secondtotalMaleFemaleCount2 = collect($secondtotalCount2)->sum();
                                    $secondmaleCount3 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $secondfemaleCount3 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $secondtotalCount3 = $secondmaleCount3 + $secondfemaleCount3;
                                    $secondtotalMaleCount3 = collect($secondmaleCount3)->sum();
                                    $secondtotalFemaleCount3 = collect($secondfemaleCount3)->sum();
                                    $secondtotalMaleFemaleCount3 = collect($secondtotalCount3)->sum();
                                    $secondmaleCount4 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $secondfemaleCount4 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $secondtotalCount4 = $secondmaleCount4 + $secondfemaleCount4;
                                    $secondtotalMaleCount4 = collect($secondmaleCount4)->sum();
                                    $secondtotalFemaleCount4 = collect($secondfemaleCount4)->sum();

                                    $secondtotalMaleFemaleCount4 = collect($secondtotalCount4)->sum();
                                    $secondmaleCount5 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 1)
                                        ->count();
                                    $secondfemaleCount5 = $rank->staffs
                                        ->where('education_group_id', 1)
                                        ->where('gender_id', 2)
                                        ->count();
                                    $secondtotalCount5 = $secondmaleCount5 + $secondfemaleCount5;
                                    $secondtotalMaleCount5 = collect($secondmaleCount5)->sum();
                                    $secondtotalFemaleCount5 = collect($secondfemaleCount5)->sum();

                                    $secondtotalMaleFemaleCount5 = collect($secondtotalCount5)->sum();
                                @endphp
                                <tr>
                                    <td class="border border-black text-center p-2">{{ en2mm(++$count) }}</td>
                                    <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                                    <td class="border border-black text-center p-2">
                                        {{ en2mm($secondmaleCount1) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondfemaleCount1) }}
                                    </td>
                                    <td class="border border-black text-center p-2">
                                        {{ en2mm($secondtotalCount1) }}
                                    </td>
                                    <td class="border border-black text-center p-2">
                                        {{ en2mm($secondmaleCount2) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondfemaleCount2) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondtotalCount2) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondmaleCount3) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondfemaleCount3) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondtotalCount3) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondmaleCount4) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondfemaleCount4) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondtotalCount4) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondmaleCount5) }}</td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondfemaleCount5) }}
                                    </td>
                                    <td class="border border-black text-center p-2">{{ en2mm($secondtotalCount5) }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2">ပေါင်း </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount1 + $secondtotalMaleCount1) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalFemaleCount1 + $secondtotalFemaleCount1) }}
                                </td>

                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount1 + $secondtotalMaleCount1 + $firsttotalFemaleCount1 + $secondtotalFemaleCount1) }}
                                </td>

                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount2 + $secondtotalMaleCount2) }}
                                </td>

                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalFemaleCount2 + $secondtotalFemaleCount2) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount2 + $secondtotalMaleCount2 + $firsttotalFemaleCount2 + $secondtotalFemaleCount2) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount3 + $secondtotalMaleCount3) }} </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalFemaleCount3 + $secondtotalFemaleCount3) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount3 + $secondtotalMaleCount3 + $firsttotalFemaleCount3 + $secondtotalFemaleCount3) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount4 + $secondtotalMaleCount4) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalFemaleCount4 + $secondtotalFemaleCount4) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount4 + $secondtotalMaleCount4 + $firsttotalFemaleCount4 + $secondtotalFemaleCount4) }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount5 + $secondtotalMaleCount5) }} </td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalFemaleCount5 + $secondtotalFemaleCount5) }}</td>
                                <td class="border border-black text-center p-2">
                                    {{ en2mm($firsttotalMaleCount5 + $secondtotalMaleCount5 + $firsttotalFemaleCount5 + $secondtotalFemaleCount5) }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>


            </div>



        </div>
    </div>
</div>
