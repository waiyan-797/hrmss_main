<div class="w-full">
    <x-slot name="header">
        <h1 class="text-white font-semibold italic font-arial">Local Training Report</h1>
    </x-slot>
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf({{$trainings->id}})">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word({{$trainings->id}})">WORD</x-primary-button>
            <br><br>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border border-gray-300">စဥ်</th>
                            <th class="px-4 py-2 border border-gray-300">အမည်</th>
                            <th class="px-4 py-2 border border-gray-300">ရာထူး</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းအမည်</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းကာလ(မှ)</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းကာလ(အထိ)</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းနေရာ/ဒေသ</th>
                            <th class="px-4 py-2 border border-gray-300">သင်တန်းအမျိုးအစား</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

