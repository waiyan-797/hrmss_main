<div class="overflow-x-auto  h-[83vh] overflow-y-auto">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
    <br><br>
    <table class="w-full border-collapse border border-black mt-4">
        <thead class="bg-white">
            <tr>
                <th class="border border-black p-2" rowspan="2">Indicator(s)</th>
                <th class="border border-black p-2" colspan="12">1.4.A Women holding senior positions in the Civil Service (Director Level or equivalent and Above Posts)<br>as (a) A Percentage of Total Senior Civil Servants and ,(b) Increase in Percentage points from previous year</th>
            </tr>
            <tr>
                <th class=" p-2">1.4.B Propotion of Positions by (a) Sex,(b) Age,(c) Persons with disabilitie,in public institutions<br>compared to national distribution</th>
                <th class=" p-2"></th>
            </tr>
        </thead>
        <thead class="bg-white">
            <tr>
                <th class="border border-black p-2" rowspan="3">Name of Ministries/Organizations</th>
            </tr>
            <tr>
                <th class="border border-black p-2" colspan="11"></th>
            </tr>
        </thead>
        <thead class="bg-white">
            <tr>
                <th class="border border-black p-2" rowspan="3">Sr No.</th>
                <th class="border border-black p-2" rowspan="3">Level of Position and Same Level</th>
                <th class="border border-black p-2" rowspan="3">Total Number</th>
                <th class="border border-black p-2" colspan="2">Gender</th>
                <th class="border border-black p-2" colspan="5">Age Group</th>
                <th class="border border-black p-2" colspan="2">Person with disabilities</th>
            </tr>
            <tr>
                <th class="border border-black p-2" rowspan="2">Male</th>
                <th class="border border-black p-2" rowspan="2">Female</th>
                <th class="border border-black p-2" rowspan="2">18 - 30</th>
                <th class="border border-black p-2" rowspan="2">31 - 40</th>
                <th class="border border-black p-2" rowspan="2">41 - 50</th>
                <th class="border border-black p-2" rowspan="2">51 - 60</th>
                <th class="border border-black p-2" rowspan="2">61 Above</th>
                <th class="border border-black p-2" rowspan="2">Male</th>
                <th class="border border-black p-2" rowspan="2">Female</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payscales as $payscale)
                <tr>
                    <td class="border border-black p-2">{{ $loop->index + 1 }}</td>
                    <td class="border border-black p-2">{{ $payscale->ranks[0]->name }}နှင့်အဆင့်တူ</td>
                    <td class="border border-black p-2">{{ en2mm($payscale->staff->count()) }}</td>
                    <td class="border border-black p-2">{{ en2mm($payscale->staff->where('gender_id', 1)->count()) }}</td>
                    <td class="border border-black p-2">{{ en2mm($payscale->staff->where('gender_id', 2)->count()) }}</td>
                    <td class="border border-black p-2">
                        {{ en2mm($payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 18 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 30
                        )->count()) }}
                    </td>

                    <td class="border border-black p-2">
                        {{ en2mm($payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 31 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 40
                        )->count()) }}
                    </td>
                    <td class="border border-black p-2">
                        {{ en2mm($payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 41 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 50
                        )->count()) }}
                    </td>
                    <td class="border border-black p-2">
                        {{ en2mm($payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 51 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 60
                        )->count()) }}
                    </td>
                    <td class="border border-black p-2">
                        {{ en2mm($payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 61
                        )->count()) }}
                    </td>
                    <td class="border border-black p-2"></td>
                    <td class="border border-black p-2"></td>
                </tr>
            @endforeach
            <tr>
                <td class="border border-black p-2 font-semibold" colspan="2">စုစုပေါင်း</td>
                <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->count())) }}</td>
                <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 1)->count())) }}</td>
                <td class="border border-black p-2 font-semibold">{{ en2mm($payscales->sum(fn($payscale) => $payscale->staff->where('gender_id', 2)->count())) }}</td>
                <td class="border border-black p-2 font-semibold">
                    {{ en2mm(
                        $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 18 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 30
                            )->count())
                    ) }}
                </td>
                <td class="border border-black p-2 font-semibold">
                    {{ en2mm(
                        $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 31 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 40
                            )->count())
                    ) }}
                </td>
                <td class="border border-black p-2 font-semibold">
                    {{ en2mm(
                        $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 41 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 50
                            )->count())
                    ) }}
                </td>
                <td class="border border-black p-2 font-semibold">
                    {{ en2mm(
                        $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 51 &&
                            \Carbon\Carbon::parse($staff->dob)->age <= 60
                            )->count())
                    ) }}
                </td>
                <td class="border border-black p-2 font-semibold">
                    {{ en2mm(
                        $payscales->sum(fn($payscale) => $payscale->staff->filter(fn($staff) =>
                            \Carbon\Carbon::parse($staff->dob)->age >= 61
                            )->count())
                    ) }}
                </td>
                <td class="border border-black p-2 font-semibold"></td>
                <td class="border border-black p-2 font-semibold"></td>
            </tr>
        </tbody>
    </table>
</div>
