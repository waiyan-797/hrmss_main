<div class="w-full p-2">
    {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
    {{-- <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button> --}}
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <h2 class="font-semibold text-center">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုးဦးစီးဌာန</h2>

            <h2 class="font-semibold text-center">ရုံးချုပ် ဌာနခွဲများ၏အရာထမ်း၊ အမှုထမ်းများစာရင်း</h2>
          <h1 class=" text-end">
            {{getTdyDateInMyanmarYearMonthDay(2)}}
          </h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                    <th class="border border-black text-center p-2">စဉ်</th>
                    <th class="border border-black text-center p-2">ရာထူးအမည်</th>
                    <th class="border border-black text-center p-2">ကျား</th>
                    <th class="border border-black text-center p-2">မ</th>
                    <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($first_ranks as $rank)
                        <tr>
                            <td class="border border-black text-center p-2">
                                {{en2mm(++$count) }}
                                 </td>
                            <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->staffs->where('gender_id', 1)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->staffs->where('gender_id', 2)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()) }}</td>
                        </tr>
                    @endforeach
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">အရာထမ်းပေါင်း</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                    </tr>
                    @foreach ($second_ranks as $rank)
                        <tr>
                            <td class="border border-black text-center p-2">
                                {{en2mm(++$count) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->staffs->where('gender_id', 1)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->staffs->where('gender_id', 2)->count()) }}</td>
                            <td class="border border-black text-center p-2">{{ en2mm($rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count()) }}</td>
                        </tr>
                    @endforeach
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">အမှုထမ်းပေါင်း</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                    </tr>
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">ပေါင်း</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">နေ့စား</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('gender_id', 1)->count() + $rank->staffs->where('gender_id', 2)->count())) }}
                        </td>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>

