<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">Social Report</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">လူမှုရေးလှုပ်ရှားမှု</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        <td class="border border-black text-left p-1">{{ en2mm($start++) }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank?->name}}</td>
                        <td class="border border-black text-left p-1">
                       @foreach($staff->socialActivities as $activity)
                       {{ $activity->particular}}
                       @endforeach
                        </td>  
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
