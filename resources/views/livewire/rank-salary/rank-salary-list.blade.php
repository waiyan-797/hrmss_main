<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="font-bold text-center text-sm mb-4">ရာထူးအလိုက်လစာနှုန်းထားစာရင်း</h1>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black p-2 text-center">စဥ်</th>
                        <th class="border border-black p-2 text-center">ရာထူးအမည်</th>
                        <th class="border border-black p-2 text-center">လစာနှုန်း</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-2 text-center">၁</td>
                        <td class="border border-black p-2 text-left">၂</td>
                        <td class="border border-black p-2 text-center">၃</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center"></td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center"></td>
                        <td class="border border-black p-2 text-center">စုစုပေါင်း</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
