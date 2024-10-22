<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Report1</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="text-center font-bold text-sm mb-2">Report - 1</h1>
            <div class=" w-52 ">

                <x-text-input wire:model.live='nameSearch' />
            </div>
            <table class="md:w-full mt-6">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပညာအရည်အချင်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">အသက်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လူမျိုး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကိုးကွယ်သည့်ဘာသာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ယခုနေထိုင်သည့်နေရပ်လိပ်စာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမြဲတမ်းဆက်သွယ်နိုင်သောနေရပ်လိပ်စာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ကျား/မ</th>
                        <th colspan="2" class="border border-black text-center p-2">သားသမီးအရေအတွက်</th>
                        <th colspan="2" class="border border-black text-center p-2">အိမ်ထောင်</th>
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
                            
                            <td class="border border-black text-center p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->current_rank?->name }}</td>
                            <td class="border border-black text-center p-2">
                                @foreach ($staff->staff_educations as $edu)
                                    <div class="mb-2">
                                        <span class="font-semibold">{{ $edu->education_group->name }}</span> -
                                        <span>{{ $edu->education_type->name }}</span>,
                                        <span>{{ $edu->education->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                            
                            <td class="border border-black text-center p-2">{{ en2mm(Carbon\Carbon::parse($staff->dob)->age).'နှစ်' }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->ethnic?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->religion?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff?->current_address_street.'/'.$staff?->current_address_ward.'/'.$staff?->current_address_region?->name.'/'.$staff?->current_address_district?->name.'/'.$staff?->current_address_township_or_town?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff?->permanent_address_street.'/'.$staff?->permanent_address_ward.'/'.$staff?->permanent_address_region?->name.'/'.$staff?->permanent_address_district?->name.'/'.$staff?->permanent_address_township_or_town?->name }}</td>
                            <td class="border border-black text-center p-2">{{ $staff?->gender?->name }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($staff->children->where('gender_id', 1)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($staff->children->where('gender_id', 2)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->spouse_name ? '✓' : '-' }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->spouse_name ? '-' : '✓' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
