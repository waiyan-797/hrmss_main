<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black text-center p-2">စဥ်</th>
                            <th class="border border-black text-center p-2">အမည်</th>
                            <th class="border border-black text-center p-2">ရာထူး</th>
                            <th class="border border-black text-center p-2">သင်တန်းအမည်</th>
                            <th class="border border-black text-center p-2">သင်တန်းကာလ(မှ)</th>
                            <th class="border border-black text-center p-2">သင်တန်းကာလ(အထိ)</th>
                            <th class="border border-black text-center p-2">သင်တန်းနေရာ/ဒေသ</th>
                            <th class="border border-black text-center p-2">သင်တန်းအမျိုးအစား</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $staff)
                        <tr>
                            <td class="border border-black text-right p-1">{{ $loop->index + 1 }}</td>
                            <td class="border border-black text-right p-1">{{ $staff->name }}</td>
                            <td class="border border-black text-right p-1">{{ $staff->current_rank->name }}</td>
                           
                                <td class="border border-black text-center p-2"> @foreach ($staff->trainings->where('training_location_id', 1) as $training){{ $training->training_type->name }}
                                    @endforeach
                                </td>
                                <td class="border border-black text-center p-2">
                                    @foreach ($staff->trainings->where('training_location_id', 1) as $training)
                                    {{ $training->from_date }}
                                @endforeach</td>
                                <td class="border border-black text-center p-2">
                                    @foreach ($staff->trainings->where('training_location_id', 1) as $training)
                                    {{ $training->to_date }}
                                    @endforeach
                                </td>
                                <td class="border border-black text-center p-2">
                                    @foreach ($staff->trainings->where('training_location_id', 1) as $training)
                                    {{ $training->location }}@endforeach</td>
                                <td class="border border-black text-center p-2">
                                    @foreach ($staff->trainings->where('training_location_id', 1) as $training)
                                    {{ $training->training_location?->name }}@endforeach</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
















{{-- <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-black-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black text-center p-2">စဥ်</th>
                            <th class="border border-black text-center p-2">အမည်</th>
                            <th class="border border-black text-center p-2">ရာထူး</th>

                            <th class="border border-black text-center p-2">သင်တန်းအမည်</th>
                            <th class="border border-black text-center p-2">သင်တန်းကာလ(မှ)</th>
                            <th class="border border-black text-center p-2">သင်တန်းကာလ(အထိ)</th>
                            <th class="border border-black text-center p-2">သင်တန်းနေရာ/ဒေသ</th>
                            <th class="border border-black text-center p-2">သင်တန်းအမျိုးအစား</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $staff)
                        <tr>
                            <td class="border border-black text-right p-1">{{ $loop->index+1}}</td>
                            <td class="border border-black text-right p-1">{{ $staff->name}}</td>
                            <td class="border border-black text-right p-1">{{ $staff->current_rank->name}}</td>
                            @foreach ($staff->trainings->where('training_location_id', 1) as $training)
                                <td class="border border-black text-center p-2">{{$training->training_type->name}}</td>
                                <td class="border border-black text-center p-2">{{$training->from_date}}</td>
                                <td class="border border-black text-center p-2">{{$training->to_date}}</td>
                                <td class="border border-black text-center p-2">{{$training->location}}</td>
                                <td class="border border-black text-center p-2">{{$training->training_location?->name}}</td>
                                @endforeach
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
 --}}
