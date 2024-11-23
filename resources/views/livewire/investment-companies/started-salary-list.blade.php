<div class="w-full">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
    <br><br>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
       
            <div class="md:w-full p-4">
                <h1 class="text-center text-black font-semibold text-base">ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန<br>ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>စတင်ခန့်ထားသည့်ဝန်ထမ်းများ၏လစာတွက်ချက်မှု</h1>
                
                @foreach($staffs as $staff)
                <div class="flex justify-between w-full mb-2">
                    <label for="name" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">အမည်</label>
                    <label for="name" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ရာထူး</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->currentRank?->name}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">စတင်ထမ်းဆောင်သည့်နေ့</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5">{{ $staff->join_date}}</label>
                </div>
               
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ရုံးမိန့်</label>
                    <label for="" class="md:w-5">-</label>
                    <label for="name" class="md:w-3/5"></label>
                </div>
               
                
              
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ဖေဖော်ဝါရီလ လစာ</label>
                    <label for="" class="md:w-5">=</label>
                    <label for="name" class="md:w-3/5">{{ en2mm($staff->current_salary*(25/29))}}</label>
                </div>
                <div class="flex justify-between w-full mb-4">
                    <label for="" class="md:w-5"> </label>
                    <label for="name" class="md:w-1/3">ဖေဖော်ဝါရီလ အပိုထောက်ပံ့ငွေ</label>
                    @foreach($salaries as $salary)
                    <label for="" class="md:w-5">=</label>
                    <label for="name" class="md:w-3/5">{{ en2mm($salary->addition)}}</label>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>