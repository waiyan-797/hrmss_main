<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">Education Report</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ပညာအရည်အချင်း</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $index=> $staff)
                        <tr>
                            {{-- <td class="border border-black text-right p-1">{{ $loop->index + 1 }}</td> --}}
                            <td class="border border-black text-left p-1">{{ $startIndex++ }}</td>
                            <td class="border border-black text-left p-1">{{ $staff->name }}</td>
                            <td class="border border-black text-left p-1">{{ $staff->currentRank?->name }}</td>
                            <td class="border border-black text-left p-1">
                                @foreach ($staff->staff_educations as $edu)
                                    <div>
                                        <span>{{ $edu->education_group->name }}</span>
                                        <span>{{ $edu->education_type->name }}</span>
                                        <span>{{ $edu->education->name }}</span>
                                    </div>
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
