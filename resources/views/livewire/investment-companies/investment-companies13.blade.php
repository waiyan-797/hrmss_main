<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
            <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="border border-black p-2 text-center">စဥ်</th>
                        <th class="border border-black p-2 text-left">အမည်/ရာထူး/ဌာန</th>
                        <th class="border border-black p-2 text-left">ရရှိခဲ့သည့်ဘွဲ့နှင့် အထူးပြုဘာသာရပ်</th>
                        <th class="border border-black p-2 text-left">တက္ကသိုလ်/ကျောင်း</th>
                        <th class="border border-black p-2 text-left">နိုင်ငံ</th>
                        <th class="border border-black p-2 text-left">ဘွဲ့ရရှိခဲ့သည့်နှစ်</th>
                        <th class="border border-black p-2 text-left">မှတ်ချက်</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($staffs as $staff)
          
                <tr>
                    <td class="border border-black p-2 text-center">{{ $loop->index + 1 }}</td>
                    <td class="border border-black p-2 text-left">{{ $staff->name }} / {{ $staff->current_rank?->name }} / {{ $staff?->side_department->name }}</td>
                    @foreach($staff->schools as $school)
                    <td class="border border-black p-2 text-left">{{ $school->education?->name }}၊ {{ $school->major }}</td>
                    <td class="border border-black p-2 text-left">{{ $school->name }}</td>
                    <td class="border border-black p-2 text-left">{{ $school->country?->name }}</td>
                    <td class="border border-black p-2 text-left">{{ $school->year }}</td>
                    <td class="border border-black p-2 text-left">{{ $school->remark }}</td>
                </tr>
            
        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
