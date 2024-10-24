<div class="w-full">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
        <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
        <br><br>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        
            <div class="md:w-full p-4">
                <h1 class="text-center text-black font-semibold text-base">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>လစာမဲ့ ခွင့်လစာ တွက်ချက်မှုဇယား</h1>
                @foreach($leaves as $leave)
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">  
                        {{ $leave->staff->name ?? 'N/A' }}
                   </label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ရာထူး</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">
                        {{ $leave->staff->current_rank->name ?? 'N/A' }}
                  </label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ခွင့်အမျိုးအစား</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $leave->leave_type->name ?? 'N/A' }}</label>
                </div>
              
               
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"></label>
                    <label for="name" class="md:w-1/3">ခွင့်ယူသည့်ကာလ</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"> 
                        {{ \Carbon\Carbon::parse($leave->from_date)->format('Y-m-d') }} - {{ \Carbon\Carbon::parse($leave->to_date)->format('Y-m-d') }}

                    </label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ရုံးမိန့်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $leave->order_no }}</label>
                </div>
               
                @php
                    $fromDate = \Carbon\Carbon::parse($leave->from_date);
                    $toDate = \Carbon\Carbon::parse($leave->to_date);
                    $dateDifference = $fromDate->diffInDays($toDate) + 1;
                @endphp
              
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ဖြတ်တောက် ရမည့်ခွင့်လစာ</label>
                    <label for="" class="md:w-5">=</label>
                    <label for="name" class="md:w-3/5">{{ $leave->staff->current_salary/30*$dateDifference}}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>