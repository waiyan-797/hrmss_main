<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff?->id}})">PDF</x-primary-button>
          <x-primary-button type="button" wire:click="go_word({{$staff?->id}})">WORD</x-primary-button>
          <br><br>
            <h1 class="font-bold text-base text-center mb-4">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>
                    
                {{mmDateFormat($startYr,$startMonth)}}
                မှ
               {{mmDateFormat($endYr,$endMonth)}}
                 ခွင့်ခံစားမှု အနည်းအများအလိုက် ရာခိုင်နှုန်းဇယား</h1>

                <div>
                    <input type="month" wire:model.live='fromDateRange'>
                    <input type="month" wire:model.live='toDateRange'>
                    
                </div><br>

                <div>
                    <select wire:model.live='dep_category' id="">
                      <option value="1">ရုံးချုပ်</option>
                      <option value="2">တိုင်းဒေသကြီး/ပြည်နယ်</option>
                    </select>
                  </div> <br>
            <table class="md:w-full">
                <thead>
                    <tr class="font-bold">
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">ဌာနခွဲ</th>

                        @foreach ($months as $month)
                            
                    {{-- @dd(explode('-', $month)); --}}
                        <th class="border border-black text-center p-2">
                             
                             {{mmDateFormat(explode('-' ,$month)[0],explode('-' ,$month)[1])}}
                            </th>

                        @endforeach
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>

                    </tr>
                </thead>
                <tbody>
                    
                   @foreach ($divisions as  $division)
                   
                   <tr>
                    <td class="border border-black text-center p-2">     
                        {{$division->id}}
                    </td>   
                    <td class="border border-black text-center p-2">
                       {{$division->name}}
                    </td>
                    @foreach ($months as $YearMonth)
                            
                    <td class="border border-black text-center p-2">
                        {{en2mm($this->leaveCount($division->id, $YearMonth ))}}
                    </td>


                        @endforeach
                    
            
                    <td class="border border-black text-center p-2">
                        @php
                                $totalLeaveCount =  0 ;
                        foreach ($months as $YearMonth) {
                            $totalLeaveCount = $this->leaveCount($division->id, $YearMonth );

                        }
                                @endphp
                        {{en2mm($totalLeaveCount)}}
                    </td>
                </tr>
                   @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
