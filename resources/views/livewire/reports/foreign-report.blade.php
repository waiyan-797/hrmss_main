<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-base mb-1">Foreign Report</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">သွားရောက်သည့်နိုင်ငံ</th>
                        <th class="border border-black text-left p-1">သွားရောက်သည့်ရက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-right p-1">{{ $loop->index + 1 }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        @foreach ($staff->abroads as $abroad)
                            <td class="border border-black text-center p-2">{{$abroad->country->name}}</td>
                            <td class="border border-black text-center p-2">{{$abroad->from_date}}</td>
                    @endforeach
                    
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
