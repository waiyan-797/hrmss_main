<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="text-center text-sm font-bold mb-2">Foreign Training Report</h1>
            <div class=" w-52">
                <x-text-input wire:model.live='nameSearch' />
            </div>

            <table class="md:w-full mt-6">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">သွားရောက်သည့်နိုင်ငံ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်ပသို့သွားရောက်ခဲ့သောအကြောင်းအရာ
                        </th>
                        <th rowspan="2" class="border border-black text-center p-2">ထောက်ပံ့သည့်အဖွဲ့အစည်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $serialNumber = 1;  // Initialize serial number counter
                    @endphp

                    @foreach($staffs as $staff)
                        @if($staff->abroads->isNotEmpty())
                            @php 
                                $abroadCount = $staff->abroads->count();
                            @endphp

                            @foreach ($staff->abroads as $index => $abroad)
                                <tr>
                                    @if($index == 0)
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}">
                                            {{ $serialNumber++ }}</td> <!-- Use and increment serialNumber -->
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}">{{ $staff->name }}
                                        </td>
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}">
                                            {{ $staff->current_rank->name }}</td>
                                    @endif

                                    <td class="border border-black text-center p-2">{{ $abroad->from_date }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->to_date }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->country?->name }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->particular }}</td>
                                    <td class="border border-black text-center p-2">{{ $abroad->sponser }}</td>

                                    @if($index == 0)
                                        <td class="border border-black text-center p-2" rowspan="{{ $abroadCount }}"></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>