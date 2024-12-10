 <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
           

            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="font-bold text-center text-base mb-1">Punishment Report</h1>
            <input type="text" wire:model="search" placeholder="Search by Name" class="p-2 border border-gray-300 rounded mb-4">




            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">ဦးစီး</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">txtpenalty</th>
                    </tr>
                </thead>
                <tbody>
                    

                    @foreach($staffs as $index=> $staff)
                    <tr>
                        <td class="border border-black text-left p-1">{{ $startIndex++ }}</td>

                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank?->name}}</td>
                        
                        <td class="border border-black text-left p-1">
                            @foreach($staff->punishments as   $punishment )
                           
                              <h1>
                                <span>
                                    
                                                                </span>
                                {{ $punishment->penalty_type->name}} 
                              </h1>
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

