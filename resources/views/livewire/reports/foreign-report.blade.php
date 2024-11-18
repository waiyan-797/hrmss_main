<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-base mb-1">Foreign Report</h1>

            <table class="md:w-full border-collapse border border-black">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">သွားရောက်သည့်နိုင်ငံများ</th>
                        <th class="border border-black text-left p-1">သွားရောက်သည့်ရက်များ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-right p-1 align-top" rowspan="{{ max(1, $staff->abroads->count()) }}">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="border border-black text-left p-1 align-top" rowspan="{{ max(1, $staff->abroads->count()) }}">
                            {{ $staff->name }}
                        </td>

                        @if($staff->abroads->isNotEmpty())
                        
                        <td class="border border-black text-left p-1">{{ $staff->abroads[0]->country->name }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->abroads[0]->from_date }}</td>
                    </tr>
                    
                    @foreach($staff->abroads->skip(1) as $abroad)
                    <tr>
                        <td class="border border-black text-left p-1">{{ $abroad->country->name }}</td>
                        <td class="border border-black text-left p-1">{{ $abroad->from_date }}</td>
                    </tr>
                    @endforeach
                    @else
                    <!-- No abroads case -->
                    <td class="border border-black text-left p-1" colspan="2">no </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>

            <div>
                {{$staffs->links()}}
            </div>
        </div>
    </div>
</div>
