<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံ့မှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">Language Report</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">တတ်ကျွမ်းသည့်ဘာသာစကား</th>
                        <th class="border border-black text-left p-1">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        <td class="border border-black text-left p-1">{{ en2mm($start++) }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank?->name}}</td>
                       
                        <td class="border border-black text-left p-1">
                            @foreach($staff->staff_languages as $index=>  $language)
                            @if($index >0 ) 
                             ,
                            @endif {{ $language->language?->name}}
                            @endforeach
                        </td>
                        <td class="border border-black text-left p-1"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $staffs->links('pagination') }}
            </div>

        </div>
    </div>
    
</div>
