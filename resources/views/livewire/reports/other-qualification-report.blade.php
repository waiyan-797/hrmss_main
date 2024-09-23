<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="font-bold text-center text-base mb-1">Other Qualification Report</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-right p-1">{{ $loop->index+1}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->current_rank->name}}</td>
                        @foreach ($staff->staff_educations as $education)
                        <td class="border border-black text-left p-1">{{$education->education->name}}</td>
                            @endforeach

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
