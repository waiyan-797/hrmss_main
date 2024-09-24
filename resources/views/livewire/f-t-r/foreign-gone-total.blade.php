<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="font-bold text-center text-base mb-2">
                ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>နိုင်ငံခြားသွားရောက်ခဲ့သောအကြိမ်ရေစုစုပေါင်းနှင့်အကြောင်းအရာ
            </h1>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black text-center p-2">စဥ်</th>
                        <th class="border border-black text-center p-2">အမည်</th>
                        <th class="border border-black text-center p-2">ရာထူး</th>
                        <th class="border border-black text-center p-2">သွားရောက်သည့်နိုင်ငံ</th>
                        <th class="border border-black text-center p-2">သင်တန်း</th>
                        <th class="border border-black text-center p-2">အခြား</th>
                        <th class="border border-black text-center p-2">စုစုပေါင်း</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                        <td class="border border-black text-left p-2">{{ $staff->name}}</td>
                        <td class="border border-black text-center p-2">{{ $staff->current_rank->name}}</td>
                        <td class="border border-black text-center p-2">
                            @foreach($staff->abroads as $abroad)
                                <span>{{ $abroad->country->name}}</span>
                            @endforeach
                        </td>
                        <td class="border border-black text-center p-2">{{ en2mm($staff->trainings->count()) }}   
                        </td>

                        <td class="border border-black text-center p-2">{{ en2mm($staff->abroads->count()) }}</td>

                        <td class="border border-black text-center p-2">
                            {{ en2mm($staff->trainings->count() + $staff->abroads->count()) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
