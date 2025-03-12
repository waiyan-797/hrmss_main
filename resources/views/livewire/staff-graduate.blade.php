<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button>
            <div class="w-full mb-4">
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန</h1>
                <h1 class="font-semibold text-base mb-2 text-center">
                    ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h1>
               <h3 class="font-semibold text-base mb-2 text-center">
                {{ $selectedEducationTypeName }}များစာရင်း
                </h3>
                <div class="mb-4">
                    <label for="education_type" class="font-semibold">ဘွဲ့အမျိုးအစားရွေးပါ</label>
                    <select wire:model.live="education_type_id" id="education_type" class="border p-2">
                        <option value="">အားလုံး</option>
                        @foreach ($educationTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full rounded-lg">
                    <table class="md:w-full">
                        <thead>
                            <tr>
                                <th rowspan="2" class="border border-black text-center p-2">စဉ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">အမည်/ရာထူး</th>
                                <th rowspan="2" class="border border-black text-center p-2">ဌာန</th>
                                <th colspan="3" class="border border-black text-center p-2">ရရှိသည့်ဘွဲ့၊ဒီပလိုမာ
                                </th>
                                <th rowspan="2" class="border border-black text-center p-2">ဖုန်းနံပါတ်</th>
                                <th rowspan="2" class="border border-black text-center p-2">Email</th>
                                <th rowspan="2" class="border border-black text-center p-2">မှတ်ချက်</th>
                            </tr>
                            <tr>
                                <th class="border border-black text-center p-2">ဘွဲ့၊ဒီပလိုမာ</th>
                                <th class="border border-black text-center p-2">တက္ကသိုလ်</th>
                                <th class="border border-black text-center p-2">ခုနှစ်</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($staffs as $index => $staff)
                                <tr>
                                    <td class="border border-black text-center p-2">{{ en2mm($index + 1) }}</td>
                                    <td class="border border-black text-center p-2">{{ $staff->name }}</td>
                                    <td class="border border-black text-center p-2">
                                        {{ $staff->current_division?->name }}</td>
                                    <td class="border border-black text-center p-2">
                                        @foreach ($staff->staff_educations as $edu)
                                            <div>
                                                <span>
                                                    {{ $edu->education?->name }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td class="border border-black text-center p-2">
                                        @foreach ($staff->schools as $school)
                                            <div>
                                                <span>{{ $school->school_name }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td class="border border-black text-center p-2">
                                        @foreach ($staff->schools as $school)
                                            <div>
                                                <span>{{ $school->from_date }} - {{ $school->to_date }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td class="border border-black text-center p-2">{{ $staff->phone }}</td>
                                    <td class="border border-black text-center p-2">{{ $staff->email }}</td>
                                    <td class="border border-black text-center p-2"></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                
            </div>
        </div>
    </div>
</div>
