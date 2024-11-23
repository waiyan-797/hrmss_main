<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စီမံရေးနှင့်ငွေစာရင်းဌာနခွဲ
                ဝန်ထမ်းအင်အားစာရင်း
            </h1>

            <table class="md:w-full">
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
                            <td class="border border-black text-center p-2">{{ $start++ }}</td>
                            <td class="border border-black text-left p-2">
                                {{ $staff->name }}၊ {{ $staff->rank?->name }}
                            </td>
                            <td class="border border-black text-left p-2">
                                {{ $staff->postings->first()?->department->name ?? '' }}
                            </td>
                            <td class="border border-black text-center p-2">
                                @if ($staff->postings->isNotEmpty())
                                    @php
                                        $firstPosting = $staff->postings->first();
                                    @endphp
                                    {{ en2mm($firstPosting->from_date ?? '') }}<br>{{ en2mm($firstPosting->to_date ?? '') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="border border-black text-left p-2">
                                {{ $staff->side_department?->name ?? '' }}
                            </td>
                            <td class="border border-black text-center p-2">
                                @if ($latestPosting?->to_date)
                                    {{ en2mm(\Carbon\Carbon::parse($latestPosting->to_date)->format('d-m-Y')) }} 
                                    - {{ en2mm(\Carbon\Carbon::now()->format('d-m-Y')) }}
                                @else
                                    No Date Range
                                @endif
                            </td>
                            <td class="border border-black text-center p-2">
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

 
