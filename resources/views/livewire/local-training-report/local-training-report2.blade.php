<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Local Training Report2</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <div class=" w-52">
                <x-text-input wire:model.live='nameSearch' />

            </div>
<<<<<<< Updated upstream
          <div
            class=" mt-9"
          >            <x-select 
         :all='true'
            wire:model.live='trainingLocation'
            
            :values="[
                 


 ['id' => 1, 'name' => 'ပြည်တွင်း'] ,   
        
                 ['id' => 2, 'name' => 'ပြည်ပ'] 
                 
            ]"
        />
          </div> 
          <div class="w-1/3">
            <x-select
                wire:model="letter_type_id"
                :values="$letter_types"
                placeholder="စာအဆင့်အတန်းရွေးပါ"
                id="letter_type_id"
                name="letter_type_id"
                class="mt-11 block w-full"
                required
            />
            
            <x-input-error class="mt-2" :messages="$errors->get('letter_type_id')" />
        </div>
=======
            <div class=" mt-9"> <x-select : wire:model.live='trainingLocation' :values="[

        ['id' => 3, 'name' => 'အားလုံး'],

        ['id' => 1, 'name' => 'ပြည်တွင်း'],

        ['id' => 2, 'name' => 'ပြည်ပ']

    ]" />
            </div>
            <div class="w-1/3">
                <x-select wire:model="letter_type_id" :values="$letter_types" placeholder="စာအဆင့်အတန်းရွေးပါ"
                    id="letter_type_id" name="letter_type_id" class="mt-11 block w-full" required />

                <x-input-error class="mt-2" :messages="$errors->get('letter_type_id')" />
            </div>
            <br>
            <h1 class="text-center text-sm font-bold">ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
            <h1 class="text-center text-sm font-bold">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
>>>>>>> Stashed changes
            <h1 class="text-center text-sm font-bold">Local Training Report2</h1>


            <table class="md:w-full mt-9">
                <thead>
                    <tr>
                        <th  class="border border-black text-center p-2">စဉ်</th>
                        <th  class="border border-black text-center p-2">အမည်/ရာထူး</th>
                        
                        <th  class="border border-black text-center p-2">ပညာအရည်အချင်း</th>

                        <th  class="border border-black text-center p-2">သင်တန်းအမည်</th>
                        <th  class="border border-black text-center p-2">သင်တန်းကာလ(မှ)</th>
                        <th  class="border border-black text-center p-2">သင်တန်းကာလ(ထိ)</th>
                        <th  class="border border-black text-center p-2">သင်တန်းနေရာ/ဒေသ</th>
                        <th  class="border border-black text-center p-2">ရရှိသည့်အဆင့်</th>

                    </tr>
                    
                </thead>

                <tbody>

                    
                    @foreach ($staffs as $staff)
                    @php 
                            $firstTraining = $staff?->trainings->whereIn(
                            'training_location_id',
                            $trainingLocation == 3 ? [1, 2] : $trainingLocation

                        )->first();

                    @endphp
                    @if($firstTraining)
                    
                        <tr>
                            <td class="border border-black border-b-0 text-center p-1">
                                {{-- {{ en2mm($loop->index + 1) }} --}}
                                {{ en2mm(++$count) }}
                            </td>
                            <td class="border border-black border-b-0 text-left p-1">
                                {{ $staff->name }}<br>{{$staff->currentRank->name}}
                            </td>
                            {{-- <td class="border border-black border-b-0 text-left p-1">
                                {{  }}
                            </td>  --}}

                            <!-- First training record -->
                            
                                    <td class="border border-black border-b-0 text-center p-2">
                                        @foreach ($staff->staff_educations as $edu)
                                        {{-- <span>{{ $edu->education_group?->name }}</span> --}}
                                        {{-- <span>{{ $edu->education_type?->name }}</span> --}}
                                        {{ $edu->education?->name }}<br>
                                        @endforeach
                                    </td>
                                
                            {{-- <td class="border border-black text-center p-2">{{ $firstTraining->education?->name }}
                            </td> --}}
                            <td class="border border-black text-center p-2">{{ $firstTraining->training_type->name == 'အခြား' ?$firstTraining->diploma_name : $firstTraining->training_type->name }}
                            </td>
                            <td class="border border-black text-center p-2">{{formatDMYmm($firstTraining->from_date) }}
                            </td>
                            <td class="border border-black text-center p-2">{{ formatDMYmm($firstTraining->to_date)}}
                            </td>
                            <td class="border border-black text-center p-2">{{ $firstTraining->location }}</td>
                            <td class="border border-black text-center p-2">{{ $firstTraining->remark }}
                            </td>

                            {{-- <td class="border border-black text-center p-2">
                                {{ $firstTraining->remark }}
                            </td> --}}
                        </tr>

                        <!-- For remaining trainings, create new rows -->
                        @foreach($staff->trainings->whereIn('training_location_id', $trainingLocation == 3 ? [1, 2] : $trainingLocation
                            )->skip(1) as $training)
                            <tr>
                                <td class="border border-black border-b-0 border-t-0 text-center p-1">
                                    
                                </td>
                                <td class="border border-black border-b-0 border-t-0 text-left p-1">
                                   
                                </td>
                                <td class="border border-black border-b-0 border-t-0 text-left p-1">
                                   
                                </td>
                                
                                
                                <td class="border border-black text-center p-2">{{ $training->training_type->name == 'အခြား' ? $training->diploma_name : $training->training_type->name }}</td>
                                <td class="border border-black text-center p-2">{{formatDMYmm($training->from_date) }}</td>
                                <td class="border border-black text-center p-2">{{formatDMYmm($training->to_date)}}</td>
                                <td class="border border-black text-center p-2">{{ $training->location }}</td>
                                <td class="border border-black text-center p-2">{{ $training->remark }}</td>
                                {{-- <td class="border border-black text-center p-2">
                                    {{ $training->remark }}
                                </td> --}}
                            </tr>
                        @endforeach
                    @endif
                @endforeach



                </tbody>

                {{-- <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->name}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->current_rank->name}}</td>

                        <td class="border border-black text-center p-2">
                            @foreach($staff->abroads as $abroad){{ $abroad->from_date}}
                            @endforeach
                        </td>
                        <td class="border border-black text-center p-2">@foreach($staff->abroads as $abroad)
                            {{ $abroad->to_date}}@endforeach</td>



                        <td class="border border-black text-center p-2">@foreach($staff->trainings as $training){{
                            $training->location}}@endforeach</td>
                        <td class="border border-black text-center p-2">@foreach($staff->trainings as $training){{
                            $training->remark}}@endforeach</td>

                        <td class="border border-black text-left p-1">
                            @foreach ($staff->staff_educations as $edu)
                            <div>
                                <span>{{ $edu->education_group->name }}</span>
                                <span>{{ $edu->education_type->name }}</span>
                                <span>{{ $edu->education->name }}</span>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
<<<<<<< Updated upstream
                <tbody>
                    @foreach($staffs as $staff)
                        @php 
                            $abroadCount = $staff->abroads->count();
                            $trainingCount = $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count(); // Filter by training location
                            $educationCount = $staff->staff_educations->count();
                            $maxRows = max($abroadCount, $trainingCount, $educationCount); // Find the maximum count of related items
                        @endphp
                
                        @for ($i = 0; $i < $maxRows; $i++)
                            <tr>
                                @if($i == 0)
                                    <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $loop->index + 1 }}</td>
                                    <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->name }}</td>
                                    <td class="border border-black text-center p-2" rowspan="{{ $maxRows }}">{{ $staff->currentRank?->name }}</td>
                                @endif
                                <td class="border border-black text-left p-1">
                                    @if(isset($staff->staff_educations[$i]))
                                        <div>
                                            <span>{{ $staff->staff_educations[$i]->education_group?->name }}</span>
                                            <span>{{ $staff->staff_educations[$i]->education_type?->name }}</span>
                                            <span>{{ $staff->staff_educations[$i]->education?->name }}</span>
                                        </div>
                                    @endif
                                </td>
                                <!-- Abroads -->
                                <td class="border border-black text-center p-2">
                                    {{ optional($staff->abroads[$i] ?? null)->from_date ?? '' }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ optional($staff->abroads[$i] ?? null)->to_date ?? '' }}
                                </td>
                
                                <!-- Trainings (filtered by training location) -->
                                <td class="border border-black text-center p-2">
                                    {{ optional($staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->values()[$i] ?? null)->location ?? '' }}
                                </td>
                                <td class="border border-black text-center p-2">
                                    {{ optional($staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->values()[$i] ?? null)->remark ?? '' }}
                                </td>
                
                                <!-- Staff Educations -->
                            
                                <td class="border border-black text-center p-2">
                                သင်တန်းအမျိုးအစား
                                </td>

                                            </tr>
                                        @endfor
                    @endforeach
                </tbody>
=======
                
>>>>>>> Stashed changes


            </table>

        </div>
    </div>
</div>