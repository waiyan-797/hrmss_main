<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <div>

                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
     <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" wire:model.live="nameSearch"  id="search" class="block  p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Search" required />

    </div> 
<div  class=" w-52">
        

</div>
    <x-select   class=" mt-11"
    wire:model.live='trainingLocation'
    :values="[
        (object) ['id' => 3, 'name' => 'အားလုံး'] ,

        (object) ['id' => 1, 'name' => 'ပြည်တွင်း'] ,

        (object) ['id' => 2, 'name' => 'ပြည်ပ'] ,
        
    ]"
/>


            </div> 
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full border border-black">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-black text-center p-2">စဥ်</th>
                            <th class="border border-black text-center p-2">အမည်</th>
                            <th class="border border-black text-center p-2">ရာထူး</th>
                            <th class="border border-black text-center p-2" colspan="2">သွားရောက်သည့်ကာလ</th>
                            <th class="border border-black text-center p-2">ပြည်တွင်းသင်တန်းတက်ရောက်ခဲ့သည်နေရာ</th>
                            <th class="border border-black text-center p-2">တက်ရောက်ခဲ့သည်အကြောင်းအရာ</th>
                            <th class="border border-black text-center p-2">ပညာအရည်အချင်း</th>
                            <th class="border border-black text-center p-2">ရရှိသည့်အဆင့်</th>
                        </tr>
                        <tr>
                            <th class="border border-black text-center p-2"></th>
                            <th class="border border-black text-center p-2"></th>
                            <th class="border border-black text-center p-2"></th>
                            <th class="border border-black text-center p-2">မှ</th>
                            <th class="border border-black text-center p-2">ထိ</th>
                            <th class="border border-black text-center p-2"></th>
                            <th class="border border-black text-center p-2"></th>
                            <th class="border border-black text-center p-2"></th>
                            <th class="border border-black text-center p-2"></th>
                          </tr>
                    </thead>
                   
                    <tbody>

                        @foreach ($staffs as $staff)
                        @php 
                        $firstTraining = $staff?->trainings->whereIn('training_location_id', 
                        $trainingLocation == 3 ? [1,2] : $trainingLocation
                        
                         )->first();
                         
                          @endphp
                        @if($firstTraining)
                            <tr>
                                <!-- First staff details row with first training -->
                                <td class="border border-black text-right p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">{{ $loop->index + 1 }}</td>
                                <td class="border border-black text-right p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">{{ $staff->name }}</td>
                                <td class="border border-black text-right p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">{{ $staff->currentRank->name }}</td>

                                <!-- First training record -->
                                <td class="border border-black text-center p-2">{{ $firstTraining->from_date }}</td>
                                
                                <td class="border border-black text-center p-2">{{ $firstTraining->to_date }}</td>
                                <td class="border border-black text-center p-2">{{ $firstTraining->location }}</td>
                                <td class="border border-black text-center p-2">  </td>
                                <td class="border border-black text-center p-1" rowspan="{{ $staff->trainings->whereIn('training_location_id', $trainingLocation ?? [1, 2])->count() }}">

                                    @foreach ($staff->staff_educations as $education)
                                    
                                        {{$education->education->name}}
                                    
                                                                
                            
                               
                                
            
                                @endforeach
                                </td>

                                <td class="border border-black text-center p-2">
                                    {{ $firstTraining->remark }}
                                </td>
                            </tr>

                            <!-- For remaining trainings, create new rows -->
                            @foreach($staff->trainings->whereIn('training_location_id',
                              $trainingLocation == 3 ? [1,2] : $trainingLocation
                            )->skip(1) as $training)
                                <tr>
                                    
                                    <td class="border border-black text-center p-2">{{ $training->from_date }}</td>
                                    <td class="border border-black text-center p-2">{{ $training->to_date }}</td>
                                    <td class="border border-black text-center p-2">{{ $training->location }}</td>

                                    <td class="border border-black text-center p-2">  </td>
                         
                                    
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

















