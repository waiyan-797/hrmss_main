<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="text-center text-sm mb-2">နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
                နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏</h1>
            <h2 class="font-bold text-center text-sm mb-4">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့်
                အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်(၃၁-၅-၂၀၂၄)
            </h2>

            <table class="md:w-full font-bold text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black text-center p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာနှုန်း</th>
                        <th rowspan="2" class="border border-black text-center p-2">ရာထူးအဆင့်</th>
                        <th colspan="2" class="border border-black text-center p-2">ဦးရေ</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဘွဲ့အလိုက်<br>ချီးမြှင့်ငွေ</th>
                        <th rowspan="2" class="border border-black text-center p-2">အခြားချီးမြှင့်ငွေ/စရိတ်များ</th>
                        <th rowspan="2" class="border border-black text-center p-2">ဒေသစရိတ်</th>
                        <th rowspan="2" class="border border-black text-center p-2">လစာနှင့်စရိတ်ပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black text-center p-2">ခွင့်ပြု</th>
                        <th class="border border-black text-center p-2">ခန့်ပြီး</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black text-center p-2">၁</td>
                        <td class="border border-black text-center p-2">၂</td>
                        <td class="border border-black text-center p-2">၃</td>
                        <td class="border border-black text-center p-2">၄</td>
                        <td class="border border-black text-center p-2">၅</td>
                        <td class="border border-black text-center p-2">၆</td>
                        <td class="border border-black text-center p-2">၇</td>
                        <td class="border border-black text-center p-2">၈</td>
                        <td class="border border-black text-center p-2">၁၁</td>
                        <td class="border border-black text-center p-2">၁၂=၆+၇+၈+၉+၁၀+၁၁</td>
                    </tr>
                    @foreach ($first_ranks as $rank)
                            <tr>
                                <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                <td class="border border-black p-2">{{$rank->payscale->name}}</td>
                                <td class="border border-black p-2">{{$rank->name}}</td>
                                <td class="border border-black p-2">{{en2mm($rank->allowed_qty)}}</td>
                                <td class="border border-black p-2">{{en2mm($rank->staffs->count())}}</td>
                @foreach($salaries as  $salary)
        <td class="border border-black text-right p-2">{{ $salary->actual_salary ?? 0 }}</td>
        <td class="border border-black text-right p-2">{{ $salary->addition_education}}</td>
        <td class="border border-black text-right p-2">{{ $salary->addition}}</td>
        <td class="border border-black text-right p-2">{{ $salary->addition_ration ?? 0 }}</td>
        <td class="border border-black text-right p-2">{{ $salary->actual_salary + $salary->addition_education+$salary->addition + $salary->addition_ration }}</td>
    @endforeach 
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="3">{{$first_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($first_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                @foreach($salaries as  $salary)
                                <td class="border border-black text-right p-2">{{ $salary->actual_salary ?? 0 }}</td>
                                <td class="border border-black text-right p-2">{{ $salary->addition_education}}</td>
                                <td class="border border-black text-right p-2">{{ $salary->addition}}</td>
                                <td class="border border-black text-right p-2">{{ $salary->addition_ration ?? 0 }}</td>
                                <td class="border border-black text-right p-2">{{ $salary->actual_salary + $salary->addition_education + $salary->addition_ration }}</td>
                            @endforeach 
                            </tr>
                            @foreach ($second_ranks as $rank)
                                <tr>
                                    <td class="border border-black p-2">{{$loop->index + 1}}</td>
                                    <td class="border border-black p-2">{{$rank->payscale->name}}</td>
                                    <td class="border border-black p-2">{{$rank->name}}</td>
                                    <td class="border border-black p-2">{{en2mm($rank->allowed_qty)}}</td>
                                    <td class="border border-black p-2">{{en2mm($rank->staffs->count())}}</td>
                                    @foreach($salaries as  $salary)
                                    <td class="border border-black text-right p-2">{{ $salary->actual_salary ?? 0 }}</td>
                                    <td class="border border-black text-right p-2">{{ $salary->addition_education}}</td>
                                    <td class="border border-black text-right p-2">{{ $salary->addition}}</td>
                                    <td class="border border-black text-right p-2">{{ $salary->addition_ration ?? 0 }}</td>
                                    <td class="border border-black text-right p-2">{{ $salary->actual_salary + $salary->addition_education +$salary->addition+ $salary->addition_ration }}</td>
                                @endforeach 
                                </tr>
                            @endforeach
                            <tr>
                                <td class="border border-black p-2 font-semibold" colspan="3">{{$second_ranks[0]->staff_type->name}}စုစုပေါင်း</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_ranks->sum('allowed_qty')) }}</td>
                                <td class="border border-black p-2 font-semibold">{{ en2mm($second_ranks->sum(fn($rank) => $rank->staffs->count())) }}</td>
                                @foreach($salaries as  $salary)
                            <td class="border border-black text-right p-2">{{ $salary->actual_salary ?? 0 }}</td>
                            <td class="border border-black text-right p-2">{{ $salary->addition_education}}</td>
                            <td class="border border-black text-right p-2">{{ $salary->addition}}</td>
                            <td class="border border-black text-right p-2">{{ $salary->addition_ration ?? 0 }}</td>
                            <td class="border border-black text-right p-2">{{ $salary->actual_salary + $salary->addition_education +$salary->addition+ $salary->addition_ration }}</td>
                        @endforeach 
                            </tr>     
                </tbody>
            </table>
            <div class="mx-60 my-8">
                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">လက်မှတ်</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">အမည်</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">ရာထူး</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>

                <div class="flex justify-end mb-2">
                    <p class="md:w-1/5 text-right">ဆက်သွယ်ရန်ဖုန်း</p>
                    <p class="md:w-5 text-right">၊</p>
                    <p></p>
                </div>
            </div>


        </div>
    </div>
</div>
