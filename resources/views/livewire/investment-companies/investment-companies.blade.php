<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Ethnic</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <br><br>


            <div class="w-full mb-4">
                <h2 class="font-semibold text-base">ဦးစီးဌာန ၊ ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h2>
                <table class="w-full text-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-black">အမှတ်စဥ်</th>
                            <th class="p-2 border border-black">လစာနှုန်း (ကျပ်)</th>
                            <th class="p-2 border border-black">ခွင့်ပြုအင်အား</th>
                            <th class="p-2 border border-black">ကချင်</th>
                            <th class="p-2 border border-black">ကယား</th>
                            <th class="p-2 border border-black">ကရင်</th>
                            <th class="p-2 border border-black">ချင်း</th>
                            <th class="p-2 border border-black">မွန်</th>
                            <th class="p-2 border border-black">ရခိုင်</th>
                            <th class="p-2 border border-black">ရှမ်း</th>
                            <th class="p-2 border border-black">စစ်ကိုင်း</th>
                            <th class="p-2 border border-black">မန္တလေး</th>
                            <th class="p-2 border border-black">နေပြည်တော်</th>
                            <th class="p-2 border border-black">ရန်ကုန်</th>
                            <th class="p-2 border border-black">ရန်ကုန်ရုံးချုပ်</th>
                            <th class="p-2 border border-black">မကွေး</th>
                            <th class="p-2 border border-black">ပဲခူး</th>
                            <th class="p-2 border border-black">တနင်သာရီ</th>
                            <th class="p-2 border border-black">ဧရာဝတီ</th>
                            <th class="p-2 border border-black">စုစုပေါင်း</th>
                        </tr>
                    </thead>
                    <tbody class="text-center h-8 p-2">
                        <tr>
                            <td class="border border-black p-2">၁</td>
                            <td class="border border-black p-2">၅၀၀၀၀၀</td>
                            <td class="border border-black p-2">၄၁၈၀၀၀-၄၀၀၀-၄၃၈၀၀၀</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                            <td class="border border-black p-2">၁၂</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
