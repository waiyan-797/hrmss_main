<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">Social Report</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">လုပ်ဆောင်မှုများ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        {{-- <td class="border border-black text-right p-1">{{ $loop->index+1}}</td> --}}
                        <td class="border border-black text-left p-1">{{ $startIndex + $index }}</td>
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

        </div>
    </div>
    <div class="mt-4">
        {{ $staffs->links() }}
    </div>
</div>
