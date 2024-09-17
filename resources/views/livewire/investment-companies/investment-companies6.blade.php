<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Investment Companies6 နောက်ဆက်တွဲ(ခ)</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
          <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
          <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
          <br><br>


            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h2 class="font-semibold text-base mb-2 text-center">----ခုနှစ်၊ ---လအတွင်း တာဝန်ပျက်ကွက်သူဝန်ထမ်းများအား
                    အရေးယူဆောင်ရွက်ပြီးစီးမှုနှင့် ဆောင်ရွက်ဆဲစာရင်း</h2>
                <div class="w-full rounded-lg">


                    <table><thead>
                        <tr>
                          <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                          <th rowspan="2" class="border border-black text-center p-2">ဌာနအမည်</th>
                          <th colspan="7" class="border border-black text-center p-2">နိုင်ငံ့ဝန်ထမ်းဥပ‌‌ဒေနည်းပညာအရ အရေးယူမှုပြီးစီးမှု</th>
                          <th rowspan="2" class="border border-black text-center p-2">ပုဒ်မ၅၀၅ဖြင့်အရေးယူပြီးစီးမှု</th>
                          <th rowspan="2" class="border border-black text-center p-2">အရေးယူဆောင်ရွက်ဆဲအင်အား</th>
                          <th rowspan="2" class="border border-black text-center p-2">စုစုပေါင်း</th>
                          <th rowspan="2" class="border border-black text-center p-2">CDM မှပြန်လည်တာဝန်ထမ်းဆောင်သူဦးရေ</th>
                        </tr>
                        <tr>
                          <th class="border border-black text-center p-2">စာဖြင့် သတိပေးခြင်း</th>
                          <th class="border border-black text-center p-2">နှစ်တိုးလစာ<br>ရပ်ဆိုင်းခြင်း</th>
                          <th class="border border-black text-center p-2">ရာထူးတိုးမြှင့်ခြင်းကိုရပ်ဆိုင်းခြင်း</th>
                          <th class="border border-black text-center p-2">လစာနှုန်းအတွင်းလစာလျှော့ချခြင်း</th>
                          <th class="border border-black text-center p-2">ရာထူးအဆင့်လျှော့ချခြင်း</th>
                          <th class="border border-black text-center p-2">ရာထူးမှထုတ်ပယ်ခြင်း</th>
                          <th class="border border-black text-center p-2">ရာထူးအဖြစ်မှထုတ်ပစ်ခြင်း</th>
                        </tr></thead>
                      <tbody>
                        <tr>
                          <td class="border border-black text-center p-2">(က)</td>
                          <td class="border border-black text-center p-2">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                        </tr>
                        <tr>
                          <td class="border border-black text-center p-2"></td>
                          <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                          <td class="border border-black text-center p-2">-</td>
                        </tr>
                      </tbody>
                      </table>


                </div>
            </div>

        </div>
    </div>
</div>
