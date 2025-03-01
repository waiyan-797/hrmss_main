<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">EEN</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>

            <h1 class="font-bold text-base text-center mb-4">၂၀၂၃ ခုနှစ်၊ သြဂုတ်လ ၂၁ရက်နေ့မှ စက်တင်ဘာလ ၁ရက်နေ့အထိ E-Learning
                စနစ်ဖြင့် ဖွင့်လှစ်မည့်<br>"English for Effective Negotiations" သင်တန်းတက်ရောက်ရန်အတွက်
                အဆိုပြုသင်တန်းသား အမည်စာရင်း</h1>

            <table class="md:w-full">
                <thead>
                    <tr class="font-bold">
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">အမည် (မြန်မာ/<br>အင်္ဂလိပ်)၊<br>Email၊ ဖုန်း</th>
                        <th class="border border-black text-center p-2">ရာထူး/ဌာန</th>
                        <th class="border border-black text-center p-2">ပညာအရည်အချင်း(ပြည်ပဘွဲ့/ဒီပလိုမာများ နိုင်ငံ/ခုနှစ် ဖော်ပြရန်)</th>
                        <th class="border border-black text-center p-2">အသက်(ရက်/လ/နှစ်)(မွေးသက္ကရာဇ်)</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်းဝန်ထမ်းလုပ်သက်(ရက်၊လ၊နှစ်)</th>
                        <th class="border border-black text-center p-2">တာဝန်ယူဆောင်ရွက်နေသည့်လုပ်ငန်းနယ်ပယ်</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td class="border border-black text-center p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->name. ', ' .$staff->email. ', ' .$staff->phone }}</td>
                            <td class="border border-black text-center p-2">{{ $staff->current_rank?->name. ', ' .$staff->current_department?->name }}</td>
                            <td class="border border-black text-center p-2">
                                @foreach ($staff->staff_educations as $edu)
                                    <div class="mb-2">
                                        <span class="font-semibold"></span> -
                                        {{-- <span>{{ $edu->education_type->name }}</span>, --}}
                                        {{-- <span>{{ $edu->education->name }}</span> --}}
                                        <span></span>,
                                        <span>{{ $edu->education?->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm(Carbon\Carbon::parse($staff->join_date)->format('d-m-y')) }}</td>
                            <td class="border border-black text-center p-2">
                                @php
                                    $currentDate = Carbon\Carbon::now();
                                    $rankDate = Carbon\Carbon::parse($staff->current_rank_date);
                                    $diff = $rankDate->diff($currentDate);
                                @endphp
                                {{ $diff->y == 0 ? '' : en2mm($diff->y) .' နှစ်'}} {{ $diff->m == 0 ? '' : en2mm($diff->m) .' လ' }} {{ $diff->d == 0 ? '' : en2mm($diff->d) .' ရက်' }}
                            </td>
                            <td class="border border-black text-center p-2">{{ $staff->current_division?->name }}</td>
                            <td class="border border-black text-center p-2"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
