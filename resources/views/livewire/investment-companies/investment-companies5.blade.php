<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            {{-- <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel">
                Excel
            </x-primary-button>

            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <h2 class="font-semibold text-base mb-2 text-center">ဝန်ထမ်းအင်အားစာရင်း</h2>
                <div class="w-full rounded-lg">
                    <table class="w-full text-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border border-black">စဥ်</th>
                                <th class="p-2 border border-black">ရာထူး</th>
                                <th class="p-2 border border-black">ခွင့်ပြုအင်အား</th>
                                <th class="p-2 border border-black">ခန့်ပြီးအင်အား</th>
                                <th class="p-2 border border-black">လစ်လပ်အင်အား</th>
                            </tr>
                        </thead>
                        <tbody class="text-center h-8 p-2">
                            @foreach ($payscales as $index=> $payscale)
                                <tr>
                                    <td class="border border-black p-2">{{en2mm($loop->index + 1)}}</td>
                                    <td class="border border-black p-2">
                                        @if($index == 0 )
                                        {{$payscale->ranks[0]->name}} / ဦးဆောင်ညွှန်ကြားရေးမှူးနှင့်အဆင့်တူ

                                        @else 
                                        {{$payscale->ranks[0]->name}}နှင့်အဆင့်တူ
                                        @endif 
                                    </td>
                                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->staff->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm(
                               $payscale->staff->count() -            $payscale->allowed_qty)}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm(
              $payscales->sum(fn($payscale) => $payscale->staff->count()) -                        $payscales->sum('allowed_qty')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
