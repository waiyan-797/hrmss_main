<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Local Training Report2</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <div  class=" w-52">
                <x-text-input wire:model.live='nameSearch'/>
                
            </div>
          <div
            class=" mt-9"
          >            <x-select 
         :all='true'
            wire:model.live='trainingLocation'
            
            :values="[
                 


(object) ['id' => 1, 'name' => 'ပြည်တွင်း'] ,   
        
                (object) ['id' => 2, 'name' => 'ပြည်ပ'] 
                 
            ]"
        />
          </div> 
            <h1 class="text-center text-sm font-bold">Local Training Report2</h1>

            <table class="md:w-full mt-9">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">အမည်</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူး</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပညာအရည်အချင်း</th>

                        <th colspan="2" class="border border-black text-center p-2">သွားရောက်သည့်ကာလ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ပြည်တွင်းသင်တန်း/ဆွေးနွေးပွဲတတ်ရောက်ခဲ့သည့်နေရာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">တတ်ရောက်ခဲ့သည့်အကြောင်းအရာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">သင်တန်းအမျိုးအစား</th>
                        
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">မှ</th>
                        <th class="border border-black text-center p-2">ထိ</th>
                       
                    </tr>
                </thead>
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
                       

                        
                        <td class="border border-black text-center p-2">@foreach($staff->trainings as $training){{ $training->location}}@endforeach</td>
                        <td class="border border-black text-center p-2">@foreach($staff->trainings as $training){{ $training->remark}}@endforeach</td>
                      
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
                                            <span>{{ $staff->staff_educations[$i]->education_group->name }}</span>
                                            <span>{{ $staff->staff_educations[$i]->education_type->name }}</span>
                                            <span>{{ $staff->staff_educations[$i]->education->name }}</span>
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
                
                
            </table>

        </div>
    </div>
</div>
