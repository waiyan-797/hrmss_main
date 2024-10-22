<div class="w-full">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
    <br><br>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            
            <h1 class="font-bold text-center text-sm mb-3">ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
            <h2 class="font-bold text-center text-sm mb-3">၂၀၂၃-၂၀၂၄ခု ဘဏ္ဍာရေးနှစ်လစာ</h2>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>

                        <th class="border border-black text-center p-2">GivenName</th>
                        <th class="border border-black text-center p-2">ရာထူး</th>

                        <th class="border border-black text-center p-2">January</th>

                        <th class="border border-black text-center p-2">February</th>
                        <th class="border border-black text-center p-2">March</th>
                        <th class="border border-black text-center p-2">April</th>
                        <th class="border border-black text-center p-2">May</th>
                        <th class="border border-black text-center p-2">June</th>
                        <th class="border border-black text-center p-2">July</th>
                        <th class="border border-black text-center p-2">August</th>
                        <th class="border border-black text-center p-2">September</th>
                        <th class="border border-black text-center p-2">October</th>
                        <th class="border border-black text-center p-2">November</th>
                        <th class="border border-black text-center p-2">December</th>
                     
                        <th class="border border-black text-center p-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                  
               @foreach ($staffs as 
               $staff )
                       <tr>
                        <td>
                            {{$loop->index}}
                        </td>
                        <td class="border -black text-center p-2">     
                            {{-- {{$staff->name}} --}}
                            {{$staff->currentRank?->name}}
                            
                  
              </td>
              <td class="border -black text-center p-2">     
                  {{-- {{$staff->name}} --}}
                  {{$staff->currentRank?->name}}
                  
        
    </td>
                       </tr>

                   
               @endforeach

                    {{-- ညွှန်ကြားရေးမှူးချုပ်	*  --}}
                    
                </tbody>
            </table>
            

        </div>
    </div>
</div>
