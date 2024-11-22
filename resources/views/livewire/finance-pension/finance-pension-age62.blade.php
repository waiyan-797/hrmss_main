<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-2">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန
            </h1>
            <h2 class="font-bold text-center text-base mb-2">၂၀၂၄-၂၀၂၅ ဘဏ္ဍာရေးနှစ်တွင် အသက် (၆၂)ပြည့်
                ပင်စင်ခံစားမည့်စာရင်း</h2>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">အမည်/ရာထူး</th>
                        <th class="border border-black text-center p-2">မွေးသက္ကရာဇ်</th>
                        <th class="border border-black text-center p-2">အလုပ်စတင်<br>ဝင်ရောက်သည့်<br>နေ့စွဲ</th>
                        <th class="border border-black text-center p-2">ကြိုတင်<br>ပြင်ဆင်ခွင့်</th>
                        <th class="border border-black text-center p-2">ပင်စင်ပြည့်<br>သည့်နေ့စွဲ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                        <td class="border border-black text-left p-2">{{ $staff->name}}/{{ $staff->currentRank?->name}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->dob}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->join_date}}</td>
                        <td class="border border-black text-center p-2">            {{ \Carbon\Carbon::parse($staff->dob)->addYears(62)->subMonths(4)->format('Y-m-d') }}
                        </td>
                        <td class="border border-black text-center p-2">{{ \Carbon\Carbon::parse($staff->dob)->addYears(62)->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
