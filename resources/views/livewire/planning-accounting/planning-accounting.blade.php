<div class="w-full">
    <div class="flex justify-center w-full   h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>



            <select class="  " wire:model.live='selectedDivisionId' id="">
                @foreach ($divisions as $division)
                            <option value="{{$division->id}}">
                                {{
                    $division->name
                                                                                            }}
                            </option>
                @endforeach
            </select>

            <div class="w-full mb-4">
                <br>
                <h2 class="font-bold text-center text-base ">
                    ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                    {{getDivisionBy($selectedDivisionId)->name}}
                    ဝန်ထမ်းအင်အားစာရင်း
                </h2><br>
                <table class="w-full text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-black">စဉ်</th>
                            <th class="p-2 border border-black">အမည်</th>
                            <th class="p-2 border border-black">ရာထူး</th>
                            <th class="p-2 border border-black">မှတ်ချက်</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                        @foreach($staffs as $staff)
                            <tr>
                                <td class="border border-black p-2">{{ $start++}}</td>
                                <td class="border border-black p-2">{{ $staff->name}}</td>
                                <td class="border border-black p-2">{{ $staff->currentRank?->name}}</td>
                                <td class="border border-black p-2"></td>
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
</div>
</div>