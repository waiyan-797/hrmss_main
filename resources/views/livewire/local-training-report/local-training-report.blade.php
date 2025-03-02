<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <div>
                {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
                <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
                <br><br>
                <h1 class="text-center text-sm font-bold ">ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h1 class="text-center text-sm font-bold mt-2">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <h1 class="text-center text-sm font-bold mt-2">
                    တတ်ရောက်ခဲ့သည့်သင်တန်းများ</h1>

                    <div>
                        <x-select class="mt-4" wire:model.live='trainingLocation' :values="[
                            ['id' => '', 'name' => 'ပြည်တွင်း ပြည်ပ ရွေးပါ'],
                            ['id' => 1, 'name' => 'ပြည်တွင်း'],
                            ['id' => 2, 'name' => 'ပြည်ပ'],
                        ]" />
                         <x-select wire:model.live="selectedRankId" :values="$ranks" placeholder='ရာထူးများအားလုံး' />
                    </div>

                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full border border-black">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-black text-center p-2">စဉ်</th>
                                <th class="border border-black text-center p-2">အမည်</th>
                                <th class="border border-black text-center p-2">ရာထူး</th>
                                <th class="border border-black text-center p-2">သင်တန်းအမည်</th>
                                <th class="border border-black text-center p-2">သင်တန်းကာလ(မှ)</th>
                                <th class="border border-black text-center p-2">သင်တန်းကာလ(အထိ)</th>
                                <th class="border border-black text-center p-2">သင်တန်းနေရာ/ဒေသ</th>
                                <th class="border border-black text-center p-2">သင်တန်းအမျိုးအစား</th>
                                <th class="border border-black text-center p-2">မှတ်ချက်</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($staffs as $staff)
                                @php
                                    $firstTraining = $staff?->trainings
                                        ->whereIn(
                                            'training_location_id',
                                            $trainingLocation == 3 ? [1, 2] : $trainingLocation,
                                        )
                                        ->first();

                                @endphp
                                @if ($firstTraining)
                                    <tr>
                                        <td class="border border-black border-b-0 text-center p-1">
                                            {{ en2mm($loop->index + 1) }}
                                        </td>
                                        <td class="border border-black border-b-0 text-left p-1">
                                            {{ $staff->name }}
                                        </td>
                                        <td class="border border-black border-b-0 text-left p-1">
                                            {{ $staff->currentRank->name }}
                                        </td>
                                        <!-- First training record -->
                                        <td class="border border-black text-center p-2">
                                            {{ $firstTraining->diploma_name }}
                                        </td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($firstTraining->from_date) }}
                                        </td>
                                        <td class="border border-black text-center p-2">
                                            {{ formatDMYmm($firstTraining->to_date) }}
                                        </td>
                                        <td class="border border-black text-center p-2">{{ $firstTraining->location }}
                                        </td>
                                        <td class="border border-black text-center p-2">
                                            {{ $firstTraining->training_location?->name }}
                                        </td>

                                        <td class="border border-black text-center p-2">
                                            {{ $firstTraining->remark }}
                                        </td>
                                    </tr>

                                    <!-- For remaining trainings, create new rows -->
                                    @foreach ($staff->trainings->whereIn('training_location_id', $trainingLocation == 3 ? [1, 2] : $trainingLocation)->skip(1) as $training)
                                        <tr>
                                            <td class="border border-black border-b-0 border-t-0 text-center p-1">

                                            </td>
                                            <td class="border border-black border-b-0 border-t-0 text-left p-1">

                                            </td>
                                            <td class="border border-black border-b-0 border-t-0 text-left p-1">

                                            </td>
                                            <td class="border border-black text-center p-2">
                                                {{ $training->training_type->name == 'အခြား' ? $training->diploma_name : $training->training_type->name }}
                                            </td>
                                            <td class="border border-black text-center p-2">
                                                {{ formatDMYmm($training->from_date) }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ formatDMYmm($training->to_date) }}</td>
                                            <td class="border border-black text-center p-2">{{ $training->location }}
                                            </td>
                                            <td class="border border-black text-center p-2">
                                                {{ $training->training_location?->name }}</td>
                                            <td class="border border-black text-center p-2">
                                                {{ $training->remark }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach



                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
