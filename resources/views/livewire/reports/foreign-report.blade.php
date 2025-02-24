<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">Foreign Report</h1>
            <table class="md:w-full border-collapse border border-black">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">သွားရောက်သည့်နိုင်ငံများ</th>
                        <th class="border border-black text-left p-1">သွားရောက်သည့်နေ့</th>
                        <th class="border border-black text-left p-1">ပြန်ရောက်သည့်နေ့</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    @php
                        $maxRows = $staff->abroads->count();
                    @endphp
            
                    @for($i = 0; $i < $maxRows; $i++)
                    <tr>
                        @if($i == 0)
                            <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                        @endif
                        @if(isset($staff->abroads[$i]))
                        <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->countries->pluck('name')->unique()->join(', ')}}</td>
                        <td class="border border-black text-center p-2">{{ formatDMYmm($staff->abroads[$i]->from_date )}}</td>
                        <td class="border border-black text-center p-2">{{ formatDMYmm($staff->abroads[$i]->to_date) }}</td>  
                        @else
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2"></td>
                            <td class="border border-black text-center p-2"></td> 
                        @endif
                    </tr>
                    @endfor
                @endforeach 
                </tbody>
            </table>

            <div class="mt-4">
                {{ $staffs->links('pagination') }}
            </div>
        </div>
    </div>
</div>