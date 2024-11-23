<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-base mb-1">Religion Report</h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-left p-1">စဥ်</th>
                        <th rowspan="2" class="border border-black text-left p-1">အမည်</th>
                        <th rowspan="2" class="border border-black text-left p-1">ရာထူး</th>
                        <th colspan="2" class="border border-black text-left p-1">ဗုဒ္ဓဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">ခရစ်ယာန်ဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">ဟိန္ဒူဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">အစ္စလာမ်ဘာသာ</th>
                        <th colspan="2" class="border border-black text-left p-1">အခြား</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                        <th class="border border-black text-left p-1">ကျား</th>
                        <th class="border border-black text-left p-1">မ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                @endphp
                    @foreach($staffs as $index=> $staff)
                    <tr>
                        {{-- <td class="border border-black text-right p-1">{{ $loop->index+1}}</td> --}}
                        <td class="border border-black text-left p-1">{{ $start++ }}</td>
                        <td class="border border-black text-left p-1">{{ $staff->name}}</td>
                        <td class="border border-black text-left p-1">{{ $staff->current_rank?->name}}</td>

                        {{-- Buddhist --}}
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==1 && $staff->gender_id==1)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==1 && $staff->gender_id==2)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>

                        {{-- Christian --}}
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==2 && $staff->gender_id==1)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==2 && $staff->gender_id==2)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>

                        {{-- Hindu --}}
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==3 && $staff->gender_id==1)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==3 && $staff->gender_id==2)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>

                        {{-- Islam --}}
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==4 && $staff->gender_id==1)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==4 && $staff->gender_id==2)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>

                        {{-- Other Religion --}}
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==5 && $staff->gender_id==1)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>
                        <td class="border border-black text-left p-1">
                            @if($staff->religion_id==5 && $staff->gender_id==2)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                              </svg>
                              
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $staffs->links('pagination') }}
            </div>

        </div>
        
    </div>
  
   
</div>
