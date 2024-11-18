<div>
    <div class="flex space-x-4">


        <button wire:click="changeCurrentPage(1)" 
            class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            စာကြမ်း
        </button>
    
        <button wire:click="changeCurrentPage(2)" 
            class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            form 
        </button>
    </div>
    
    @if($currentPage == 1 )
    <div class=" mx-auto p-6 bg-white border border-gray-300 shadow-md w-full h-[83vh] overflow-y-auto">
        <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button><br>
           <h1 class="text-center font-bold text-xl mb-4">Last Pay Certificate</h1>
       
           <div class="mb-2">
               <label class="block font-semibold">
                Certificate  of 
                {{$staff->gender->id == 1 ? 'ဦး' : 'ေဒါ်'}} 
                {{$staff->name}} 

                ({{$staff->current_rank->name}} )
                
            </label>
               
               <p class="text-justify">
                    <span> of the  {{$staff->current_division->name}}<br>
                proceeding on 

             
                သို့ ပြောင်းရွေ့တာဝန်ထမ်းဆောင်ခြင်း <br>to-

                
                        {{$toDivisionName}}
                
                 {{-- ordered_date --}}
                 {{$ordered_date ?? '_________'}}
                 စာအမှတ်၊
                 ( {{$order_no ?? '_________'}})
                  </span> 
               </p>
                
           </div>
       
          
       
           <div class="mb-4">
               <p><strong>2.</strong> He has been paid up to- 
                {{-- till to date  --}}
                {{$paid_up_to_date ?? '_________'}}
                <br> at the following rates:</p>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">Pay</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">Particulars</label>
                       <p>................</p>
                       <p>................</p>
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">Rate</label>
                     {{$amount ?? '_________'}}
                   </div>
               </div>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">Officiating Pay</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">Particulars</label>
                       <p>................</p>
                       
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">Rate</label>
                      <p>.................</p>
                   </div>
               </div>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">Special Pay</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">Particulars</label>
                       <p>................</p>
                       
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">Rate</label>
                      <p>.................</p>
                   </div>
                  
               </div>
               
           </div>
           <div class="w-1/2">
              
              <p>
                နိုင်ငံ့ဝန်ထမ်းထောက်ပံ့ကြေး 
                {{  getStartOfMonth($paid_up_to_date)}}
                မှ 
              
              {{$paid_up_to_date}}
              ထိ 
                {{$amount ?? '_'}}
                အားထုတ်ပေးပြီးဖြစ်ပါသည်
               <br>
              </p>
           </div>
       
           <div class="mb-4">
               <p><strong>3.</strong> He made over charge of the office of <span class="underline">
                {{$staff->current_division->name}}
            </span><br> on the <span class="underline">နံနက်ပိုင်း
                </span> noon of <span class="underline">
                {{getNextDay($paid_up_to_date)}}
                </span>.</p>
           </div>
       
           <div class="mb-4">
               <p><strong>4.</strong> Recoveries are to be made from the pay of the Government servant as detailed on the reverse.</p>
           </div>
       
           <div class="mb-4">
               <p><strong>5.</strong> He has been paid leave salary as detailed below. Deductions have been made as noted on the reverse:</p>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">Officiating Pay</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">Particulars</label>
                       <p>................</p>
                       
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">Rate</label>
                      <p>.................</p>
                   </div>
               </div>
           </div>
       
           <div class="mb-4">
               <p><strong>6.</strong> He is entitled to draw the following:              {{$paid_up_to_date}}
                 အထိ လစာထုတ် ပေးပြီး ဖြစ်ပါသည်</p>
               
           </div>
           <div class="mb-4">
               <p><strong>7.</strong>The details of the income-tax revocered from him up to the date from the beginning of the current year are noted on the reverse.</p>
               
           </div>
       
           <div class="mb-4">
               <p><strong>7(a).</strong> He has taken <span>..........</span> days casual leave during the current year.</p>
           </div>
       
           <div class="mb-4">
               <p><strong>8.</strong> He/I assumed charge of the office of <span >...................</span><br> on the <span>.....................</span> noon of <span>..............</span>.</p>
           </div>
       
           <div class="flex justify-between mt-8">
               <div class="text-center">
                   <p>...................................</p>
                   <p class="font-semibold">(Signature)</p>
                   <p class="text-sm">(Designation)</p>
               </div>
               <div class="text-center">
                   <p>...................................</p>
                   <p class="font-semibold">(Signature of Head of Office/Gazetted Officer)</p>
                   <p class="text-sm">(Designation)</p>
               </div>
           </div>
       
           <h2 class="text-center font-bold text-xl mb-4">REVERSE</h2>
           <h3 class="text-center font-semibold mb-4">Details of Recoveries</h3>
       
          
           <div class="mb-2">
               <label class="block font-semibold">Nature of recovery 
                {{$staff->gender->id == 1 ? 'ဦး' : 'ေဒါ်'}}  /
                {{$staff->name}} 

                ({{$staff->current_rank->name}} )
            </label>
               
               <p class="text-justify">
                    <span> Amount K........................................................................................<br>To be recovered in ........................... instalments.</span> 
               </p>
                
           </div>
       
           
       
           <!-- Deductions Details -->
            <div class="mb-4">
               <p class="font-semibold text-center">Deductions made from leave salary</p>
              </div>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">From</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">to</label>
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">on account of K</label>
                   </div>
               </div>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">From</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">to</label>
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">on account of K</label>
                   </div>
               </div>
               <div class="flex justify-between mt-2">
                   <div class="w-1/2">
                       <label class="block font-semibold">From</label>
                       
                   </div>
                   <div class="w-1/2">
                       <label class="block font-semibold">to</label>
                   </div>
                   <div class="w-1/2 pl-4">
                       <label class="block font-semibold">on account of K</label>
                   </div>
               </div>
               
       
           <!-- Pay and Deductions Table -->
           <div class="overflow-x-auto mb-6">
               <table class="w-full border border-gray-300">
                   <thead>
                       <tr class="bg-white">
                           <th class="border border-gray-300 p-2 text-left">Names of months</th>
                           <th class="border border-gray-300 p-2 text-left">Pay</th>
                           <th class="border border-gray-300 p-2 text-left">အပိုထောက်<br>
                               ပံ့ကြေး</th>
                           <th class="border border-gray-300 p-2 text-left">Gratuity, Fee, etc.</th>
                           <th class="border border-gray-300 p-2 text-left">Funds and other Deductions</th>
                           <th class="border border-gray-300 p-2 text-left">Amount of income-tax recovered</th>
                           <th class="border border-gray-300 p-2 text-left">Remarks</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td class="border border-gray-300 p-2">June -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">July -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">August -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">September -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">October -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">November -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">December -2023</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">January -2024</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">February -2024</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">March -2024</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">April -2024</td>
                           <td class="border border-gray-300 p-2">၂၁၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2">၃၀,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၂၄၈,၀၀၀.၀၀</td>
                           <td class="border border-gray-300 p-2"></td>
                       </tr>
                       <tr>
                           <td class="border border-gray-300 p-2">May -2024</td>
                           <td class="border border-gray-300 p-2">၁၆၁,၇၄၁.၉၃</td>
                           <td class="border border-gray-300 p-2">၂၂,၂၅၈.၀၆</td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2"></td>
                           <td class="border border-gray-300 p-2">၁၈၃,၉၉၉.၉၉</td>
                           <td class="border border-gray-300 p-2">၂၃-၅-၂၄ အထိလစာပေးပြီး</td>
                       </tr>
                       
                   </tbody>
               </table>
           </div>
       
           <!-- Instructions Section -->
           <div class="mt-6">
               <h3 class="font-semibold mb-2 text-center">INSTRUCTIONS</h3>
               <ol class="list-decimal list-inside space-y-2">
                   <li>If the Government servant is employed at Rangoon, the certificate should be given by the Accountant-General, Burma. If elsewhere, by the Treasury Officer concerned.</li>

                   <li>If he has to pass through Rangoon in proceeding to duty in another province, the certificate should be given by the officer-in-charge of the Treasury from which he last drew pay, and countersigned by the Accountant-General, Burma.</li>

                   <li class="mt-2">Exception._As an exception to Rules (1) and (2) above, the last pay certificates of non-gazette officers transferred from one province or circle of audit to another, or from one place to another in the same province or circle of audit, may be given by the head of the office, and need not be counter-signed by the Audit Officer concerned.</li>

                   <li class="mt-2">A Government servant who has drawn his leave salary in India should before returning to duty obtain a last pay certificate from the Audit Officer by whom or within whose jurisdiction his leave salary was last paid.</li>
               </ol>
           </div>
        </div>
    
       
    

        @else
        
        <form
        wire:submit='submitForm'
        class="space-y-4 p-4 bg-gray-50 rounded-lg shadow-md w-full max-w-md mx-auto">
            <div>
<label for="division_id">
    ပြောင်းရွေ့တာဝန်ထမ်းဆောင်ခြင်း
</label>
                <select 
                name="division_id" wire:model='to_division_id'>
                    @foreach ($divisions as $division)
                    <option value="{{$division->id}}">
                    {{$division->name}}
                    </option>
                    @endforeach    
                </select>


                <label for="ordered_date" class="block text-sm font-medium text-gray-700">Ordered Date</label>
                <input type="date" id="ordered_date" wire:model="ordered_date" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    placeholder="Enter ordered date">
            </div>
        
            <div>
                <label for="order_no" class="block text-sm font-medium text-gray-700">Order Number</label>
                <input type="text" id="order_no" wire:model="order_no" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    placeholder="Enter order number">
            </div>

            <div>
                <label for="transfer_date" class="block text-sm font-medium text-gray-700">transfer date</label>
                <input type="date" id="transfer_date" wire:model="transfer_date" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    placeholder="Enter order number">
            </div>



            
        
            <div>
                <label for="paid_up_to_date" class="block text-sm font-medium text-gray-700">Paid Up To Date</label>
                <input type="date" id="paid_up_to_date" wire:model="paid_up_to_date" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="number" id="amount" wire:model="amount" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    placeholder="Enter amount">
            </div>
        
            <div>
                <button type="submit" 
                
                    class="w-full px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Submit
                </button>
            </div>
        </form>
        
        @endif 

</div>