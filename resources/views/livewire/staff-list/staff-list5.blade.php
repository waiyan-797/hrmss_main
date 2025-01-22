<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
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
            <br>

            <h1 class="font-bold text-center text-base mb-4">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                {{getDivisionBy($selectedDivisionId)->name}}
                ကျားမအင်အားစာရင်း
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
                            <td class="border border-black text-center p-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()) }}
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း အရာထမ်း</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 2)->count())) }}
                        </td>
                    </tr> --}}
                    @foreach ($second_ranks as $rank)
                        <tr>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($loop->index + 1 + $first_ranks->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ $rank->name }}</td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()) }}
                            </td>
                            <td class="border border-black text-center p-2">
                                {{ en2mm($rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count()) }}
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း အမှုထမ်း</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 2)->count())) }}
                        </td>
                    </tr> --}}
                    <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($first_second_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">နေ့စား</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($third_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id', 11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id', 11)->where('gender_id', 2)->count())) }}
                        </td>
                    </tr>
                    {{-- <tr class="font-bold">
                        <td class="border border-black text-center p-2"></td>
                        <td class="border border-black text-center p-2">စုစုပေါင်း ဝန်ထမ်းဦးရေ</td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 1)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 2)->count())) }}
                        </td>
                        <td class="border border-black text-center p-2">
                            {{ en2mm($all_ranks->sum(fn($rank) => $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 1)->count() + $rank->staffs->where('current_division_id',
                            11)->where('gender_id', 2)->count())) }}
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>