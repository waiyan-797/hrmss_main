<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <h1 class="font-bold text-center text-base mb-4">
                ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>ဝန်ထမ်းများ၏ သားသမီးများ စာရင်း
            </h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-left p-2">ဝန်ထမ်း၏အမည်/ရာထူး</th>
                        <th colspan="2" class="border border-black text-left p-2">သား/သမီးအရေအတွက်</th>
                        <th rowspan="2" class="border border-black text-left p-2">သား/သမီးအမည်</th>

                        <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-left p-2">ကျား</th>
                        <th class="border border-black text-left p-2">မ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td class="border border-black text-center p-2">{{ $start++ }}</td>
                            <td class="border border-black text-left p-2">{{ $staff->name }}
                                <br>

                                {{ $staff->currentRank->name }}

                            </td>

                            <td class="border border-black text-center p-2">
                                {{ en2mm($staff->children->where('gender_id', 1)->count()) }}
                            </td>
                            <td class="border border-black text-left p-2">
                                {{ en2mm($staff->children->where('gender_id', 2)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">

                                @foreach ($staff->children as $key => $child)
                                    {{ $child->name }}
                                @endforeach



                            </td>
                            <td class="border border-black text-left p-2">

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
