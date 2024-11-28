<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">Age Report</h1>
            <x-text-input
                    wire:model.live='age'
                    class=' !w-48 !border-2'
            />
            <table class="md:w-full mt-5">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">မွေးရက်</th>

                      
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        {{-- <td class="border border-black text-right p-1">{{ $loop->index+1}}</td> --}}
                        <td class="border border-black text-left p-1">{{ $index++ }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank?->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->dob}}</td>
                       
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">

            </div>

        </div>
    </div>
    
</div>
