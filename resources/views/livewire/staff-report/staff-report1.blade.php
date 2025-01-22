<div class="w-full">
    {{-- @dd($year , $month) --}}

    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <div class="flex gap-2 items-center">
                <input type="text" wire:model.live='nameSearch'>
                <input type="month" wire:model.live='filterRange'>
                <x-select :values="$depts" wire:model.live='deptId' class="mt-1 block w-full"/>
            </div>

            <h1 class="text-center mt-2 text-sm font-bold">
                ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                {{ mmDateFormat($year, $month) }} ရက်နေ့
                <strong>{{ $nameSearch }}</strong>များ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း
            </h1>

            <div class="overflow-x-auto mt-2">
                <table class="min-w-full border border-gray-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">စဉ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">အမည်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ရာထူး</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">
                                နိုင်ငံသားစိစစ်ရေး<br>အမှတ်
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">မွေးနေ့သက္ကရာဇ်</th>
                           
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">
                                အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">
                                လက်ရှိဌာန<br>ရောက်ရှိ<br>ရက်စွဲ
                            </th>
                            {{-- <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">
                                နိုင်ငံ့ဝန်ထမ်း<br>နည်းဥပဒေ
                                ၃၃အရ<br>သတ်မှတ်ချက်
                            </th> --}}
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ဌာနခွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပညာအရည်အချင်း</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
                            {{-- <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပင်စင်ပြည့်သည့်နေ့စွဲ
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $staff)
                            <tr>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{ en2mm($loop->index + 1)}}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">{{ $staff->name }}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{ $staff->current_rank?->name }}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{ $staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code }}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{ en2mm(Carbon\Carbon::parse($staff->dob)->format('d-m-Y')) }}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{ formatDMYmm($staff->join_date) }}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->join_date, now())}}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{formatDMYmm($staff->current_rank_date) }}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->current_rank_date, now())}}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{ formatDMYmm($staff->current_rank_date) }}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->current_rank_date, now())}}

                                </td>
                                {{-- <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{formatDMYmm($staff->postings->sortByDesc('from_date')->first()?->from_date)}}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->postings->sortByDesc('from_date')->first()?->from_date, now())}}

                                </td> --}}
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{-- {{ $staff->side_department?->name }} --}}
                                    {{ $staff->current_division?->name }}
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    @foreach ($staff->staff_educations as $edu)
                                        <div class="mb-2">
                                            {{-- <span class="font-semibold">{{ $edu->education_group?->name }}</span> - --}}
                                            {{-- <span>{{ $edu->education_type?->name }}</span>, --}}
                                            <span>{{ $edu->education?->name }}</span>
                                    </div>@endforeach
                                </td>
                                <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{-- {{en2mm(Carbon\Carbon::parse($staff->dob)->year + $pension_year->year) }} --}}
                                    {{ formatDMYmm(Carbon\Carbon::parse($staff->dob)->addYears($pension)->format('d-m-Y')) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>