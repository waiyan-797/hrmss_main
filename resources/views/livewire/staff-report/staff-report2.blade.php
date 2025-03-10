<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            
            <h1 class="text-center mt-2 text-sm font-bold">
                ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                 {{-- {{mmDateFormat($year , $month )}} --}}ရက်နေ့  
                ညွှန်ကြားရေးမှူးများ၏ လက်ရှိဌာနသို့ ရောက်ရှိတာဝန်ထမ်းဆောင်သည့်စာရင်း</h1>
                
            <!-- <div   class=" w-44">
                <x-text-input 
                    wire:model.live='searchName'
                 
                />
            </div> -->
            <div  class="flex items-end gap-x-5" >
        <div class="w-40 ">
            <label class="block mb-2 text-sm font-medium text-gray-700">Start Date</label>
            <x-date-picker wire:model.live="startDate" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
        <div class="w-50">
            <label class="block mb-2 text-sm font-medium text-gray-700">Rank</label>
            <select wire:model.live="rankId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value=""></option>
                @foreach($ranks as $rank)
                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="w-50">
            <label class="block mb-2 text-sm font-medium text-gray-700">Department</label>
            <select wire:model.live="deptId" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value=""></option>
                @foreach($depts as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>
        </div> --}}
    </div>

                <!-- Department Filter -->
                <div class="w-48">
                    <select wire:model.live="deptId" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" style="color: grey;">ဌာနများအားလုံး</option>
                        @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Age Range Filter -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <x-input-label value="လုပ်သက်" class="whitespace-nowrap" />
                        <x-text-input wire:model.live="age" class="!w-20 !border-2 rounded-md" />
                    </div>
                    <span>မှ</span>
                    <x-text-input wire:model.live="ageTwo" class="!w-20 !border-2 rounded-md" />
                    <span>ထိ</span>
                </div>

                <!-- Age Range Type -->
                <div class="flex items-center space-x-2">
                    <x-input-label value="လုပ်သက်အပိုင်းအခြားရွေးပါ" class="whitespace-nowrap" />
                    <select wire:model.live="signID" class="w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                        <option value="all">အားလုံး</option>
                        <option value="between">နှစ်ကြား</option>
                        <option value=">">နှစ်အထက်</option>
                        <option value="=">နှစ်</option>
                        <option value="<">နှစ်အောက်</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto mt-7">

                <table class="min-w-full border border-gray-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">စဉ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">အမည်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ရာထူး</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">နိုင်ငံသားစိစစ်ရေး<br>အမှတ်
                            </th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">မွေးသက္ကရာဇ်</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>ရက်စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">လက်ရှိ<br>အဆင့်ရ<br>ရက်စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ဌာနခွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပညာအရည်အချင်း</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ပင်စင်ပြည့်သည့်နေ့စွဲ</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                            <tr class="border-b">
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{ en2mm($loop->index + 1)}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->name}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->currentRank?->name}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->nrc_region_id?->name . $staff->nrc_township_code?->name .'/'. $staff->nrc_sign?->name .en2mm( $staff->nrc_code ) }}</td>
                                
                                <td class="px-4 py-2 text-center text-sm text-gray-600">
                                    {{formatDMYmm($staff->dob)}}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->dob, now())}}
                                </td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">
                                    {{formatDMYmm($staff->government_staff_started_date)}}
                                    <br>
                                    {{dateDiffYMDWithoutDays($staff->government_staff_started_date, now())}}
                                </td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">
                                    {{formatDMYmm($staff->postings->sortByDesc('from_date')
                                    ->slice(1, 1)
                                    ->first()?->from_date)}}
                                    <br>
                                    {{dateDiffYMDWithoutDays(Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('j-n-Y') , now())}}
                                </td>

                                {{-- <td class="px-4 py-2 text-center text-sm text-gray-600">
                                    {{en2mm(Carbon\Carbon::parse($staff->current_rank_date)->format('j-n-Y'))}}
                                <br>
                                {{dateDiffYMDWithoutDays(Carbon\Carbon::parse($staff->current_rank_date)->format('j-n-Y') , now())}}
                                </td> --}}
                                <td class="px-4 py-2 text-center text-sm text-gray-600">{{$staff->current_division?->nick_name}}</td>
                                <td class="px-4 py-2 text-center text-sm text-gray-600">
                                    @foreach ($staff->staff_educations as  $key=>  $edu)
                                        <div class="mb-2">
                                            {{-- <span class="font-semibold">{{ $edu->education_group?->name }}</span> - --}}
                                            {{-- <span>{{ $edu->education_type?->name }}</span>, --}}
                                            <span>{{ $edu->education?->name }}</span>
                                            @if($key > 0 ) 
                                            ,
                                            @endif 
                                        </div>
                                    @endforeach
                                </td>
                                 <td class="text-sm text-left font-medium text-gray-600 px-2 py-3">
                                    {{-- {{ en2mm(Carbon\Carbon::parse($staff->dob)->year + $pension_year->year) }} --}}
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
