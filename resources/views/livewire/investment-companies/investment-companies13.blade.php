<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            {{-- <x-primary-button type="button" wire:click="go_excel()">Excel</x-primary-button> --}}
            <br><br>
            <h2 class="font-semibold text-base text-center">ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန</h2>
            <h2 class="font-semibold text-base text-center">ဘွဲ့ရရှိသူများစာရင်း</h2>
            <br>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black p-2 text-center">စဉ်</th>
                        <th class="border border-black p-2 text-center">အမည်</th>
                        <th class="border border-black p-2 text-center">ရာထူး</th>
                        <th class="border border-black p-2 text-center">ပညာအရည်အချင်း</th>
                        <th class="border border-black p-2 text-center">နိုင်ငံ</th>
                        <th class="border border-black p-2 text-center">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $serialNumber = 1; // Initialize serial number counter
                    @endphp
                    @foreach($staffs as  $staff)
                        <tr>
                            <td class="border border-black p-2 text-center">{{en2mm($serialNumber++)}}</td>
                            <td class="border border-black p-2 text-center">{{ $staff->name }}</td>
                            <td class="border border-black p-2 text-center">{{ $staff->current_rank ? $staff->current_rank->name : null }}</td>
                            <td class="border border-black p-2 text-center">
                                {{ 
                                    $staff->staff_educations->isNotEmpty() 
                                    ? $staff->staff_educations->pluck('education.name')->filter()->implode(', ') 
                                    : null 
                                }}
                            </td>
                            <td class="border border-black p-2 text-center">
                                {{ 
                                    $staff->staff_educations->isNotEmpty() 
                                    ? $staff->staff_educations->pluck('country.name')->filter()->implode('၊ ') 
                                    : null 
                                }}
                            </td>
                            <td class="border border-black p-2 text-center"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
