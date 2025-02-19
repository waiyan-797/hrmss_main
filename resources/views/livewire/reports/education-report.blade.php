<div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full px-3 py-4 mx-auto">
            {{-- <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button> --}}
            <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
            <br><br>
            <h1 class="mb-1 text-base font-bold text-center">Education Report</h1>


            <div class="flex justify-around my-3" >

                <div class="w-96">

                    <x-searchable-select
                    placeholder="ပညာအရည်အချင်းအုပ်စု"
                    class="block w-full mt-1"
                    property="education_group_id" :values="$education_groups"
                       />
                </div>

                <div class="w-96">
                    <x-searchable-select
                    placeholder="ပညာအရည်အချင်းအမျိုးအစား"
                    class="block w-full mt-1"
                    property="education_type_id" :values="$education_types"
                       />


                </div>


                <div class=" w-96 ms-7">
                    <x-searchable-select
                    placeholder="ပညာအရည်အချင်း"
                    class="block w-full mt-1"
                    property="education_id" :values="$educations"
                       />
                   </div>



            </div>

            <table class="md:w-full">
                <thead>
                    <tr>
                        <th class="p-1 text-left border border-black">စဥ်</th>
                        <th class="p-1 text-left border border-black">အမည်</th>
                        <th class="p-1 text-left border border-black">ရာထူး</th>
                        <th class="p-1 text-left border border-black">ပညာအရည်အချင်း</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $index => $staff)
                        <tr>
                            {{-- <td class="p-1 text-right border border-black">{{ $loop->index + 1 }}</td> --}}
                            <td class="p-1 text-left border border-black">{{ en2mm($startIndex++) }}</td>
                            <td class="p-1 text-left border border-black">{{ $staff->name }}</td>
                            <td class="p-1 text-left border border-black">{{ $staff->currentRank?->name }}</td>
                            <td class="p-1 text-left border border-black">
                                @foreach ($staff->staff_educations as $edu)
                                    <div>

                                        <span>
                                            {{ $edu->education?->name }}</span>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $staffs->links('pagination') }}
            </div>


        </div>
    </div>

</div>
