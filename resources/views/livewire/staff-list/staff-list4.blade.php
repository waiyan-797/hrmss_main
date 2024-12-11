<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
             {{-- <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button> --}}
            <br><br>
            <h1 class="font-bold text-center text-base">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
                <br>
                {{ is_null($selectedRankId) ? 'ဝန်ထမ်း' : getRankById($selectedRankId)->name }}များစာရင်း
            </h1>
            <x-select wire:model.live="selectedRankId" :values="$ranks" placeholder='All' />
            <h1 class=" text-end ">
                ရက်စွဲ - {{ getTdyDateInMyanmarYearMonthDay(1) }}
            </h1>

            <table class="md:w-full mt-3">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-left p-2">အမည်/ရာထူး</th>
                        <th class="border border-black text-left p-2">မူလဌာန</th>
                        <th class="border border-black text-center p-2">ခုနှစ်<br>မှ-ထိ</th>
                        <th class="border border-black text-left p-2">ပြောင်းရွေ့ဌာန</th>
                        <th class="border border-black text-center p-2">ခုနှစ်<br>မှ-ထိ</th>
                        <th class="border border-black text-center p-2">လက်ရှိဌာန<br>ရောက်ရှိ ရက်စွဲ</th>
                        <th class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        @php
                            $latestPosting = $staff->postings->sortByDesc('from_date')->first();
                        @endphp
                        <tr>
                            <td class="border border-black text-center p-2">{{ en2mm($start++) }}</td>
                            <td class="border border-black text-left p-2">
                                {{ $staff->name }} <br>
                                {{ $staff->currentRank?->name }}
                            </td>
                            <td class="border border-black text-left p-2">
                                {{ $staff->postings->first()?->department->name ?? '' }}
                                (
                                {{ $staff->postings->first()?->division?->nick_name ?? '' }}
                                )
                            </td>
                            <td class="border border-black text-center p-2">
                                @if ($staff->postings->isNotEmpty())
                                    @php
                                        $firstPosting = $staff->postings->first();
                                    @endphp
                                    {{ en2mm($firstPosting->from_date ? \Carbon\Carbon::parse($firstPosting->from_date)->format('d-m-Y') : '') }}
                                    မှ
                                    <br>
                                    {{ en2mm($firstPosting->from_date ? \Carbon\Carbon::parse($firstPosting->from_date)->format('d-m-Y') : '') }}
                                    ထိ
                                @else
                                    -
                                @endif
                            </td>
                            <td class="border border-black text-left p-2">

                                @foreach ($staff->postings->slice(1, $staff->postings->count() - 2) as $oldPost)
                                    {{ $oldPost->department?->name ?? '' }}
                                    ({{ $oldPost->division?->nick_name ?? '' }})
                                    <br>
                                @endforeach

                            </td>

                            <td class="border border-black text-left p-2">

                                @foreach ($staff->postings->slice(1, $staff->postings->count() - 2) as $oldPost)
                                    {{ ($oldPost->from_date ? en2mm(\Carbon\Carbon::parse($oldPost->from_date)->format('d-m-y')) : '') .
                                        'မှ' .
                                        ($oldPost->to_date ? en2mm(\Carbon\Carbon::parse($oldPost->to_date)->format('d-m-y')) : '') .
                                        'ထိ' }}
                                    <br>
                                @endforeach

                            </td>


                            </td>

                            <td class="border border-black text-center p-2">
                                {{-- {{ $latestPosting->department->name ?? '' }} --}}

                                {{ $latestPosting->division?->nick_name ?? '' }}

                                <br>
                                {{ $latestPosting?->from_date ? en2mm(\Carbon\Carbon::parse($latestPosting->from_date)->format('d-m-y')) : '' }}
                            </td>
                            <td class="border border-black text-center p-2"></td>
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
