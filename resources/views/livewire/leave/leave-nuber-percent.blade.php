<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Leaves</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
          <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
          <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
          <br><br>

            <h1 class="font-bold text-center text-base mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၄ခုနှစ်၊ ဧပြီလ ဝန်ထမ်းများ၏<br>ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း</h1>
            <table class="md:w-full"><thead>
                <tr class="font-bold">
                  <th class="border border-black text-center p-2">စဥ်</th>
                  <th class="border border-black text-center p-2">ဌာနခွဲ</th>
                  <th class="border border-black text-center p-2">ဝန်ထမ်းအင်အား</th>
                  <th class="border border-black text-center p-2">ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ</th>
                  <th class="border border-black text-center p-2">ရှောင်တခင်ခွင့်ရက်ပေါင်း</th>
                  <th class="border border-black text-center p-2">လုပ်သက်ခွင့်ရက်ပေါင်း</th>
                  <th class="border border-black text-center p-2">မီးဖွားခွင့်/သားပျက်ခွင့်</th>
                  <th class="border border-black text-center p-2">ဆေးခွင့်ရက်ပေါင်း</th>
                  <th class="border border-black text-center p-2">လစာမဲ့ခွင့်</th>
                  <th class="border border-black text-center p-2">ကြိုတင်ပြင်ဆင်ခွင့်ရက်ပေါင်း</th>
                  <th class="border border-black text-center p-2">ကလေးပြုစုစောင့်ရှောက်ခွင့်ရက်ပေါင်း</th>
                  <th class="border border-black text-center p-2">ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း</th>
                </tr></thead>
              <tbody>
                <tr>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                </tr>
                <tr class="font-bold">
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                </tr>
              </tbody>
              </table>


        </div>
    </div>
</div>

