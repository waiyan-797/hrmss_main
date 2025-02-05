<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            
            <div   class=" w-44">
                <x-text-input 
                    wire:model.live='searchName'
                 
                />
            </div>
        <table class="md:w-full  mt-6">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">တာဝန်ထမ်းဆောင်သည့်ဌာန</th>
                      
                        <th class="border border-black text-left p-1">မွေးသက္ကရာဇ်</th>
                        <th class="border border-black text-left p-1">ပင်စင်ယူသည့်ရက်စွဲ</th>
                        <th class="border border-black text-left p-1">ပင်စင်အမျိုးအစား</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-right p-1">{{ en2mm($loop->index+1)}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank?->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->current_division?->name}}</td>
                        @php
                        $dob = \Carbon\Carbon::parse($staff->dob);
                        $diff = $dob->diff(\Carbon\Carbon::now());
                        $age =  $diff->y . ' နှစ် ' .  $diff->m . ' လ';
                        @endphp
                        <td class="border border-black text-left p-1">{{ formatDMYmm($staff->dob).'('.en2mm($age).')'}}</td>
                        <td class="border border-black text-left p-1">{{ formatDMYmm($staff->retire_date)}}</td>
                        <td class="border border-black text-left p-1">
                            {{ $staff->pension_type?->name}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
