<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>

            <h1 class="text-center text-sm font-bold">Report - 4</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရရှိသောဒီပလိုမာ/ဘွဲ့</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲ</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                        @php
                            // Get the max number of rows needed (either from trainings or abroads)
                            $maxRows = max($staff->trainings->count(), $staff->abroads->count());
                        @endphp
                
                        @for($i = 0; $i < $maxRows; $i++)
                        <tr>
                            @if($i == 0)
                                <!-- Merge the first three columns for each staff -->
                                <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $loop->index + 1 }}</td>
                                <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                                <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->current_rank->name }}</td>
                            @endif
                
                            <!-- Training information -->
                            @if(isset($staff->trainings[$i]))
                                <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->diploma_name }}</td>
                                <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->training_type->name }}</td>
                                <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->from_date }}</td>
                                <td class="border border-black text-center p-2">{{ $staff->trainings[$i]->to_date }}</td>
                            @else
                                <!-- Empty cells if no training data -->
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                            @endif
                
                            <!-- Abroad information -->
                            @if(isset($staff->abroads[$i]))
                                <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->particular }}</td>
                                <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->from_date }}</td>
                                <td class="border border-black text-center p-2">{{ $staff->abroads[$i]->to_date }}</td>
                            @else
                                <!-- Empty cells if no abroad data -->
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                                <td class="border border-black text-center p-2"></td>
                            @endif
                        </tr>
                        @endfor
                    @endforeach
                </tbody>
                
            </table>

        </div>
    </div>
</div>
