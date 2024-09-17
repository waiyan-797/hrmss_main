<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Investment Companies4</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$staff->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$staff->id}})">WORD</x-primary-button>
            <br><br>


            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
                <div class="w-full rounded-lg">
                    <table class="w-full text-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border border-black">စဥ်</th>
                                <th class="p-2 border border-black">လစာနှုန်း (ကျပ်)</th>
                                <th class="p-2 border border-black">ခွင့်ပြုအင်အား</th>
                                <th class="p-2 border border-black">ခန့်ပြီးအင်အား</th>
                                <th class="p-2 border border-black">လစ်လပ်အင်အား</th>
                            </tr>
                        </thead>
                        <tbody class="text-center h-8 p-2">
                            <tr>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2">{{ $staff->military_pension }}</td>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2"></td>
                                <td class="border border-black p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
