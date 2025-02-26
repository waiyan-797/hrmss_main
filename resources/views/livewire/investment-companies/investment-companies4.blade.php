<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            {{-- <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <br><br>
            <input type="month" wire:model.live='filterRange'>

            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <h2 class="font-semibold text-base mb-2 text-center">{{ mmDateFormat($year, $month) }}{{ $myanmarDate }} ရှိဝန်ထမ်းအင်အားစာရင်း</h2>
                <div class="w-full rounded-lg">
                    <table class="w-full text-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border border-black">စဉ်</th>
                                <th class="p-2 border border-black">လစာနှုန်း (ကျပ်)</th>
                                <th class="p-2 border border-black">ခွင့်ပြုအင်အား</th>
                                <th class="p-2 border border-black">ခန့်ပြီးအင်အား</th>
                                <th class="p-2 border border-black">လစ်လပ်အင်အား</th>
                            </tr>
                        </thead>
                        <tbody class="text-center h-8 p-2">
                            @foreach ($first_payscales as $payscale)
                                <tr>
                                    <td class="border border-black p-2">{{ en2mm(++$count) }}</td>
                                    <td class="border border-black p-2">{{$payscale->name}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->staff->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm( $payscale->staff->count()  - $payscale->allowed_qty)}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">{{$first_payscales[0]->staff_type->name}}ပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm((
                                    
                               $first_payscales->sum(fn($scale) => $scale->staff->count())  - $first_payscales->sum('allowed_qty')
                                )) }}</td>
                            </tr>

                            @foreach ($second_payscales as $payscale)
                                <tr>
                                    <td class="border border-black p-2">{{ en2mm(++$count) }}</td>
                                    <td class="border border-black p-2">{{$payscale->name}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($payscale->staff->count())}}</td>
                                    <td class="border border-black p-2">{{en2mm( 
                                        
                                        $payscale->staff->count() - $payscale->allowed_qty 
                                        )}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">{{$second_payscales[0]->staff_type->name}}ပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm(
                                     $second_payscales->sum(fn($scale) => $scale->staff->count() ) - $second_payscales->sum('allowed_qty')
                                    ) }}</td>
                            </tr>

                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="2">ပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum('allowed_qty') + $first_payscales->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count()) + $first_payscales->sum(fn($scale) => $scale->staff->count())) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_payscales->sum(fn($scale) => $scale->staff->count() ) - $second_payscales->sum('allowed_qty') + $first_payscales->sum(fn($scale) => $scale->staff->count() ) - $first_payscales->sum('allowed_qty')) }}</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
