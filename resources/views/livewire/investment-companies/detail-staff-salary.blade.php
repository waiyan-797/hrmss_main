<div class=" mx-auto p-6 bg-white border border-gray-300 shadow-md  w-full h-[83vh] overflow-y-auto">
    <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
    <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button><br>
    <h1 class="text-center font-bold text-xl mb-4 ">ဝန်ထမ်းများ၏ လစာငွေတောင်းခံလွှာ</h1>

    <div>
        
      
        <select wire:model.live='staff_id'>
            @foreach ($staffs as $staff)
            <option value="{{$staff->id}}">{{$staff->name}}</option>

            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label class="block font-semibold">ဝန်ထမ်းအမည်   {{$staff->gender_id ==  1 ? "ဦိး" : "ဒေါ်" }} {{$staff->name}}<br>
            
        </label>
        
        <p class="text-justify">
             <span> မြို့နယ် ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန </span> 
        </p>
         
    </div>

   
<hr class="border-black">
    <div class="mb-4">
       
        <div class="flex justify-between mt-2">
           <div class="w-1/2">

           </div>
            <div class="w-1/2">
                <label class="block font-semibold">ငွေစာရင်း‌ခေါင်းစဉ်</label>
                
            </div>
            <div class="w-1/2 pl-4">
                <label class="block font-semibold">ငွေပေးလွှာအမှတ်................</label>
                <label class="block font-semibold">ချက်လက်မှတ်အမှတ်................</label>
                <label class="block font-semibold">နေ့စွဲ၊၃၀-၄-၂၀၂၃................</label>
               
            </div>
        </div>
    </div>
    <hr class="border-black">
    <div class="mb-4">
       
        <div class="flex justify-between mt-2">
    <div class="w-1/2">
    <label class="block font-semibold">
        နေ့စွဲ၊၂၀၂၃ခုနှစ်၊ဧပြီလအတွက် တောင်းခံအပ်ပါသည်(ကာလကိုဖော်ပြရန်)<br>
        ...............................<br>
        လက်ထောက်ညွှန်ကြားရေးမှူး အဖြစ် ကျွန်ုပ်၏လစာ<br>
        ...............................<br>
        လစာအဖြစ် သတ်မှတ်ထားသော အခြားလစဉ်<br>
        ဝင်ငွေများ(သီးခြားဖော်ပြရန်)<br>
        ယခင်လမှ ဝင်ငွေခွန် အားလစာ စရိတ်တွင်<br>
        ပြန်ပေါင်းထည့်ထားပါသည်
    </label>
    </div>
    <div class="w-1/2">
        (က)  လစာ  ......<br>
        (ခ) ....  ........<br>
        (ဂ).....  ......<br>
        ......    .......<br>
        .....    ........<br>
        .....    ........<br>
    </div>
    <div class="w-1/2 pl-4">
        
            <table class="table-auto w-full border-collapse border border-black">
                <thead>
                    <div class="font-semibold">လစာနှုန်း :</div>
                    <th class="border border-black text-center p-2">ကျပ်</th>
                    <th class="border border-black text-center p-2">ပြား</th>
                   
                    <th class="border border-black text-center p-2">ကျပ်</th>
                    <th class="border border-black text-center p-2" >ပြား</th>
                </thead>
                    <tbody>
                            <tr>
                                <td class="border border-black text-center p-2" >၃၁၆၀၀၀</td>
                                <td class="border border-black text-center p-2"></td>
                                
                                <td class="border border-black text-center p-2">၃၁၆၀၀၀</td>
                                <td class="border border-black text-center p-2"></td>
                                
                            </tr>
                            <tr>
                              <td>စုစုပေါင်းတောင်းခံလွှာ
                              </td>
                              <td></td>
                              <td class="border border-black text-center p-2">၃၁၆၀၀၀</td>
                              <td class="border border-black text-center p-2"></td>
                          </tr>
                          <tr>
                                <td class="p-2">နှုတ်-ကျောဘက်တွင် အသေးစိတ် ဖော်ပြထားသောရံပုံငွေ နှင့်အခြားဖြတ်တောက်မှုများ၏စုစုပေါင်း</td>
                                <td class="p-2"></td>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2"></td>
                            </tr>
                             <tr>
                                <td class="p-2">အသားတင်တောင်းခံငွေ</td>
                                <td class="p-2"></td>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2"></td>
                            </tr>
                            </tbody>
                </table>
               
              
               
    </div>
</div>
</div>

    <div class="mb-4">
        <div class="flex justify-between mt-2">
            
        <div class="w-1/2">
        <p>ကျပ်(စာဖြင့်) နှစ်သိန်းကိုးသောင်းငါးထောင်လေးရာ<br>
            ......................<br>
             ခြောက်ဆယ့်ခြောက်နှင့်ပြား ၆၇တိတိ<br>
            နေ့စွဲ၊၂၀၂၃ခုနှစ်၊ဧပြီလ<br>
            ...................
        </p>
    </div>
    <div class="w-1/2 pl-4">
        ထိုးမြဲလက်မှတ်နှင့်ရာထူး
    </div>
        </div>
    </div>
    <hr class="border-black">

    

    <div class="mb-4">
        
        <div class="flex justify-between mt-2">
            <div class="w-1/2">
                <label class="block font-semibold">ငွေပေါင်းကျပ်(စာဖြင့်)နှစ်သိန်းကိုးသောင်းငါးထောင်လေးရာခြောက်ဆယ့်နှင့်ပြား၆၇တိတိကို လက်ခံရရှိပါကြောင်း</label>
                
            </div>
            
            <div class="w-1/2 pl-4">
                <label class="block font-semibold">ငွေတောင်းခံသူလက်မှတ်</label>
            </div>
           
        </div>
    </div>
    <div class="mb-4">
        
        <div class="flex justify-between mt-2">
            <div class="w-1/2">
                <label class="block font-semibold">နေ့စွဲ၊၂၀၂၃ခုနှစ်၊ဧပြီလ<br>..................</label>
                
            </div>
            
        </div>
    
        <hr class="border-black">

    <div class="mb-4">
        <div class="flex justify-between mt-2">
            <div class="w-1/2">
                <label class="block font-semibold">ချက်လက်မှတ်ကို...............ဘဏ်ရှိစာရင်းအမှတ်...........သို့ပို့ပေးပါရန်<br>‌ေမတ္တာရပ်ခံအပ်ပါသည်</label>
                
            </div>
            <div class="w-1/2 pl-4">
                <label class="block font-semibold">ငွေတောင်းခံသူလက်မှတ်</label>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="flex justify-between mt-2">
            <div class="w-1/2">
                <label class="block font-semibold">နေ့စွဲ၊၂၀၂၃ခုနှစ်၊ဧပြီလ<br>
                    ...................</label>
                
            </div>
            
        </div>
        
    </div>
    <hr class="border-black">

    <div class="mb-4">
        <div class="flex justify-between mt-2">
            <div class="w-1/2">
                <label class="block font-semibold">ကျပ်(၂၉၅,၄၆၆/၆၇)ကျပ် နှစ်သိန်းကိုးသောင်းငါးထောင်လေးရာခြောက်ဆယ့်နှင့်ပြား၆၇တိတိကို ထုတ်ပေးပါ။</label>
                
            </div>
            <div class="w-1/2 pl-4">
                <label class="block font-semibold">စစ်ဆေးပြီး ဌစ-ပုံစံ ၉-တွင် ရေးသွင်းပြီး<br>စာရင်းကိုင်</label>
            </div>
        </div>
    </div>

    

    <div class="flex justify-between mt-8">
        <div class="text-center">
            <p>နေ့စွဲ...................................စစ်ဆေးသူ ငွေထုတ်သူအရာရှိ</p>
            
        </div>
        <div class="text-center">
            <p>နေ့စွဲ...................................ငွေထုတ်သူအရာရှိ</p>
           
        </div>
    </div>
    <br><br>
   
        <div class="container mx-auto">
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class=" p-2" colspan="4">ရှေ့မျက်နှာတွင် ဖော်ပြထားသည့် ရံပုံငွေနှင့်
                            အခြားဖြတ်တောက်ငွေများ၏ အသေးစိတ်
                            စာရင်း။	</th>
                        <th class="border border-black p-2"></th>
                        <th class="border border-black p-2"></th>
                        <th class="border border-black p-2" >ကျပ်</th>
                        <th class="border border-black p-2">ပြား</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td class="border border-black" rowspan="12">၁။<br>
                        ၂။<br>၃။<br>၄။<br>၅။<br><br>၆။<br><br>၇။<br><br>၈။<br><br>၉။<br><br>၁၀။<br><br>၁၁။<br>၁၂။<br><br></td>
                        <td class="border border-black p-2" rowspan="12">အသက်အာမခံ...<br>ဝင်ငွေခွန်...<br>အိမ်လုံခ...<br>အိုနာစာရံပုံငွေ...<br>နယ်ပြောင်းရွေ့ရာတွင်လစာ<br>ကြိုတင်ထုတ်ပေးငွေ<br>နယ်ခရီးစရိတ်<br>ကြိုတင်ထုတ်ပေးငွေ<br>နယ်လှည့်ခရီးစရိတ်<br>ကြိုတင်ထုတ်ပေးငွေ<br>မီးဘေ လေဘေး ‌ရေဘေး<br>ကြိုတင်ထုတ်ပေးငွေ<br>မိုးတွင်းရိတ်ခါသိုလှောင်‌ရေး အတွက်<br>ကြိုတင်ထုတ်ပေးငွေ<br>ပိုငွေများပြန်လည်<br>ဖြတ်တောက်ခြင်း<br>ခွင့်လစာ<br>နှစ်လစာအတိုးမဲ့ထုတ် ချေးငွေပြန်လည်<br>ဖြတ်တောက်ခြင်း......	
                        </td>
                        <td class="border border-black" rowspan="12">ကျပ်<br><br><br><br><br><br><br>၂၀၅၃၃<br><br><br>
                        <hr class="border-black"></td>
                        <td class="border border-black" rowspan="12">ပြား<br><br><br><br><br><br><br>၃၃<br><br><br> <hr class="border-black"></td>
                        <td class="border border-black p-2" rowspan="30"><br><br><br><br><br><br>၁။<br>
                            ၂။<br>၃။<br>၄။<br>၅။<br><br>၆။<br><br>၇။<br><br>၈။<br><br>၉။<br><br>၁၀။<br><br>၁၁။<br>၁၂။<br><br></td>
                        <td class="border border-black  p-2" rowspan="30">(၄-၂၀၂၃)<br><br><br><br><br>ပေါင်း<hr class="border-black">မြီရှင်<br>အသက်အာမခံ...<br>ဝင်ငွေခွန်...<br>အိမ်လုံခ...<br>အိုနာစာရံပုံငွေ...<br>နယ်ပြောင်းရွေ့ရာတွင်လစာ<br>ကြိုတင်ထုတ်ပေးငွေ<br>နယ်ခရီးစရိတ်<br>ကြိုတင်ထုတ်ပေးငွေ<br>နယ်လှည့်ခရီးစရိတ်<br>ကြိုတင်ထုတ်ပေးငွေ<br>မီးဘေ လေဘေး ‌ရေဘေး<br>ကြိုတင်ထုတ်ပေးငွေ<br>မိုးတွင်းရိတ်ခါသိုလှောင်‌ရေး အတွက်<br>ကြိုတင်ထုတ်ပေးငွေ<br>ပိုငွေများပြန်လည်<br>ဖြတ်တောက်ခြင်း<br>ခွင့်လစာ<br>နှစ်လစာအတိုးမဲ့ထုတ် ချေးငွေပြန်လည်<br>ဖြတ်တောက်ခြင်း......	</td>
                        <td class="border border-black p-2" rowspan="30"></td>
                        <td class="border border-black p-2" rowspan="30"></td> 
                      
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
                    <tr>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                        <td class=" p-2"></td>
                    </tr>
</div>