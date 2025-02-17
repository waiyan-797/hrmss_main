 <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">Punishment Report</h1>
             <div   class=" w-44">
                <x-text-input 
                    wire:model.live='search'  placeholder="Search by Name"
                />
            </div>
            <br>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဉ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ပြစ်ဒဏ်</th>
                        <th class="border border-black text-left p-1">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        <td class="border border-black text-left p-1">{{ en2mm($startIndex++) }}</td>

                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank?->name}}</td>
                        <td class="border border-black text-left p-1">
                            {{$staff->punishments->map(function ($punishment) {
                                return $punishment->penalty_type?->name;
                               })->join(', ')}}
                        </td>
                       
                        <td class="border border-black text-left p-1">
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

