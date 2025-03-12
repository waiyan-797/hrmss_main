<div class="flex justify-center w-full h-[83vh] overflow-y-auto">
    <div class="w-full mx-auto px-3 py-4">
        <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
        <h1 class="text-center mt-2 text-sm font-bold">
            ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
        </h1>
        <h1 class="text-center mt-2 text-sm font-bold">
            <h1 class="font-bold text-center text-base mb-2">
                အသက် {{ en2mm($age ?? '') }}
                @switch($signID)
                    @case('all') အားလုံး @break
                    @case('between') နှစ်ကြား @break
                    @case('>') နှစ်အထက် @break
                    @case('=') နှစ် @break
                    @case('<') နှစ်အောက် @break
                    @default
                @endswitch
                 ဝန်ထမ်းများ၏အမည်စာရင်း
            </h1>
        </h1>
        
        <div class="flex flex-wrap gap-4 justify-center mb-6">
            <div class="flex items-center">
                <x-input-label value="အသက်" />
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
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-black text-sm">
                <thead>
                    <tr>
                        <th class="border border-black px-4 py-2">စဥ်</th>
                        <th class="border border-black px-4 py-2">အမည်</th>
                        <th class="border border-black px-4 py-2">ရာထူး</th>
                        <th class="border border-black px-4 py-2">မွေးသက္ကရာဇ်</th>
                        <th class="border border-black px-4 py-2">အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ</th>
                        <th class="border border-black px-4 py-2">လက်ရှိအဆင့်ရရက်စွဲ</th>
                        <th class="border border-black px-4 py-2">ဌာနခွဲ</th>
                        <th class="border border-black px-4 py-2">ပညာအရည်အချင်း</th>
                        <th class="border border-black px-4 py-2">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td class="border border-black px-4 py-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black px-4 py-2">{{ $staff->name }}</td>
                            <td class="border border-black px-4 py-2">{{ $staff->currentRank?->name }}</td>
                            @php
                                $dob = \Carbon\Carbon::parse($staff->dob);
                                $diff = $dob->diff(\Carbon\Carbon::now());
                                $age =  $diff->y . ' နှစ်၊ ' .  $diff->m . ' လ';
                            @endphp
                            <td class="border border-black px-4 py-2">
                                {{ formatDMYmm($staff->dob) }}<br>
                                {{ en2mm($age) }}
                            </td>
                            @php
                                $join_date = \Carbon\Carbon::parse($staff->join_date);
                                $diff = $join_date->diff(\Carbon\Carbon::now());
                                $age =  $diff->y . ' နှစ်၊ ' .  $diff->m . ' လ';
                            @endphp
                            <td class="border border-black px-4 py-2">
                                {{ formatDMYmm($staff->join_date) }}<br>
                                {{ en2mm($age) }}</td>
                            @php
                                $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
                                $diff = $current_rank_date->diff(\Carbon\Carbon::now());
                                $age =  $diff->y . ' နှစ်၊ ' . $diff->m . ' လ';
                            @endphp
                            <td class="border border-black px-4 py-2">
                                {{ formatDMYmm($staff->current_rank_date)}}<br>
                                {{ en2mm($age) }}</td>
                            <td class="border border-black px-4 py-2">{{ $staff->current_division?->name }}</td>
                            @php
                                $educationNames = $staff->staff_educations
                                    ->map(fn($edu) => $edu->education?->name)
                                    ->implode(', ');
                            @endphp
                            <td class="border border-black px-4 py-2">{{ $educationNames }}</td>
                            <td class="border border-black px-4 py-2"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>
</div>
