<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>

            <h1 class="text-center text-sm mb-2">နိုင်ငံတော်စီမံအုပ်ချုပ်ရေးကောင်စီလက်ထက်<br>ရင်းနှီးမြှပ်နှံမှုနှင့်
                နိုင်ငံခြားစီးပွားဆက်သွယ်‌ရေးဝန်ကြီးဌာန၊ ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၏</h1>
            <h2 class="font-bold text-center text-sm mb-4">လစာ၊ ဘွဲ့အလိုက် ချီးမြှင့်ငွေနှင့်
                အခြားချီးမြှင့်ငွေ/စရိတ်များ ရရှိသည့်<br>ဝန်ထမ်းဦးရေနှင့် စုစုပေါင်း လစာစရိတ်စာရင်းချုပ်
                (၃၁-၅-၂၀၂၄)
            </h2>
{{-- <input type="date" wire:model.live='selectedDate'> --}}
             Date
            <x-date-picker wire:model.live='filterRange' />
            <br>
            <table class="md:w-full font-bold text-center text-sm">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black p-2">စဥ်</th>
                        <th rowspan="2" class="border border-black p-2">လစာနှုန်း</th>
                        <th rowspan="2" class="border border-black p-2">ရာထူးအဆင့်</th>
                        <th colspan="2" class="border border-black p-2">ဒီပလိုမာ</th>
                        <th colspan="2" class="border border-black p-2">Fellowship/Membership</th>
                        <th colspan="2" class="border border-black p-2">မဟာဘွဲ့</th>
                        <th colspan="2" class="border border-black p-2">ပါရဂူဘွဲ့</th>
                        <th colspan="2" class="border border-black p-2">စုစုပေါင်း</th>
                    </tr>
                    <tr>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                        <th class="border border-black p-2">ဝန်ထမ်းဦးရေ</th>
                        <th class="border border-black p-2">ချီးမြှင့်ငွေပေါင်း(ကျပ်သန်း)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-2">၁</td>
                        <td class="border border-black p-2">၂</td>
                        <td class="border border-black p-2">၃</td>
                        <td class="border border-black p-2">၄</td>
                        <td class="border border-black p-2">၅</td>
                        <td class="border border-black p-2">၆</td>
                        <td class="border border-black p-2">၇</td>
                        <td class="border border-black p-2">၈</td>
                        <td class="border border-black p-2">၉</td>
                        <td class="border border-black p-2">၈</td>
                        <td class="border border-black p-2">၉</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2"></td>
                    </tr>
                    @foreach ($high_staffs as $staff)
                        <tr>
                            <td class="border border-black p-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black p-2">{{ $staff->payscale->name }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">အရာထမ်းပေါင်း</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($high_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    </tr>
                    @foreach ($low_staffs as $staff)
                        <tr>
                            <td class="border border-black p-2">{{ en2mm($loop->index + 1) }}</td>
                            <td class="border border-black p-2">{{ $staff->payscale->name }}</td>
                            <td class="border border-black p-2">{{ $staff->name }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count()) }}</td>
                            <td class="border border-black p-2">{{ en2mm($staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education'))) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">အမှုထမ်းပေါင်း</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($low_staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">စုစုပေါင်း</td>
                        <td class="border border-black p-2"></td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 7)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 2)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 4)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', 5)->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->whereIn('education_group_id', [7, 2, 4, 5])->isNotEmpty())->count())) }}</td>
                        <td class="border border-black p-2">{{ en2mm($staffs->sum(fn($staff) => $staff->staffs->filter(fn($staff) => $staff->staff_educations->where('education_group_id', [7, 2, 4, 5])->isNotEmpty())->sum(fn($staff) => $staff->salaries->sum('addition_education')))) }}</td>
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
