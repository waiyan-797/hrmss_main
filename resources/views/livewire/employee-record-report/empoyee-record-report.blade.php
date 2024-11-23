 <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-base mb-2 font-arial text-green-700">Former Employee Record Report of April, 2021</h1>

            <table class="md:w-full font-arial">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-center p-1">နှုတ်ထွက်သည့်ရက်စွဲ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        {{-- <td class="border border-black text-center p-1">{{ $loop->index+1}}</td> --}}
                        <td class="border border-black text-left p-1">{{ $start++ }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->currentRank ? $staff->currentRank?->name : '-'}}</td>
                        <td class="border border-black text-center p-1">{{ $staff->retire_date}}</td>
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

