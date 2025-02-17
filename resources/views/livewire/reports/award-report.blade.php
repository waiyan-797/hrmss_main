<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h1 class="font-bold text-center text-base mb-1">Award Report</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-left p-1">စဥ်</th>
                        <th class="border border-black text-left p-1">အမည်</th>
                        <th class="border border-black text-left p-1">ရာထူး</th>
                        <th class="border border-black text-left p-1">ဆုတံဆိပ်အမျိုးအစား</th>
                        <th class="border border-black text-left p-1">အမိန့်ကြော်ငြာစာ/
                            ရရှိသည့်ခုနှစ်
                            </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($staffs as $index => $staff)
                        @php
                            $uniqueAwardings = $staff->awardings->unique(fn($item) => $item->award?->name);
                            $awardingCount = $uniqueAwardings->count();
                        @endphp
                        @if ($awardingCount === 0)
                            <tr>
                                <td class="border border-black text-left p-1">{{ en2mm($startIndex++) }}</td>
                                <td class="border border-black text-left p-1">{{ $staff->name }}</td>
                                <td class="border border-black text-left p-1">{{ $staff->currentRank?->name }}</td>
                                <td class="border border-black text-left p-1">-</td>
                            </tr>
                        @else
                            <tr>
                                <td class="border border-black text-left p-1" rowspan="{{ $awardingCount }}">
                                    {{ en2mm($startIndex++) }}
                                </td>
                                <td class="border border-black text-left p-1" rowspan="{{ $awardingCount }}">
                                    {{ $staff->name }}
                                </td>
                                <td class="border border-black text-left p-1" rowspan="{{ $awardingCount }}">
                                    {{ $staff->currentRank?->name }}
                                </td>
                                <td class="border border-black text-left p-1">
                                    {{ $uniqueAwardings->first()?->award->name ?? '-' }}
                                </td>
                                <td class="border border-black text-left p-1">
                                    {{ $awarding->order_no ?? '-' }}
                                </td>
                            </tr>
                            @foreach ($uniqueAwardings->skip(1) as $awarding)
                                <tr>
                                    <td class="border border-black text-left p-1">
                                        {{ $awarding->award->name ?? '-' }}
                                    </td>
                                    <td class="border border-black text-left p-1">
                                        {{ $awarding->order_no ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach

                </tbody>
            </table>
            <div class="mt-4">
                {{ $staffs->links('pagination') }}
            </div>

        </div>
    </div>
</div>
