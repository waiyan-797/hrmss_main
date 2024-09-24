<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>


            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">တိုင်း/ပြည်နယ်</th>
                        <th colspan="3" class="border border-black text-center p-2">ခန့်ပြီးအမြဲတမ်းဝန်ထမ်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">အရာထမ်း</th>
                        <th class="border border-black text-center p-2">အမှုထမ်း</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisions as $division)
                        <tr>
                            <td class="border border-black text-center p-2">{{ $loop->index + 1 }}</td>
                            <td class="border border-black text-left p-2">{{ $division->name }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 1)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($division->staffs->filter(fn($staff) => $staff->currentRank && $staff->currentRank->staff_type_id == 2)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ en2mm($division->staffs->count() )}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
