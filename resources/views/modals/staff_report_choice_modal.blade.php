<div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto text-left bg-gray-900 bg-opacity-20"
    wire:ignore.self>
    <!-- Modal Content -->
    <div class="p-4 bg-white rounded-lg shadow-xl dark:bg-gray-800 w-96">
        <!-- Modal Content -->
        <h2 class="mb-4 text-lg font-semibold text-gray-500 uppercase dark:text-white font-arial">{{ $modal_title }}
        </h2>
        <div class="flex flex-col gap-2 mb-4">
            <button type="button" class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 15)">ကိုယ်ရေးမှတ်တမ်း(၁၅)ချက်</button>
            <button type="button" class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 17)">ကိုယ်ရေးမှတ်တမ်း(၁၇)ချက်</button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 18)">ကိုယ်ရေးမှတ်တမ်း(၁၈)ချက်</button>
                {{-- Route::get('/staff-report19/{staff_id?}',StaffReport19::class)->name('staff_report19'); --}}
                <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 20)">ကိုယ်ရေးမှတ်တမ်း(၁၉)ချက်(၁)</button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 19)">ကိုယ်ရေးမှတ်တမ်း(၁၉)ချက်(၂)</button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 53)">ကိုယ်‌ရေးမှတ်တမ်း(၅၃)ချက်</button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, 68)">ကိုယ်ရေးမှတ်တမ်း(၆၈)ချက်</button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, '_leave_3')">Leave 3</button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, '_last_pay_main')">Last Pay Certificate</button>

            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, '_salary-negotiation-promotion')">
                လစာညှိနှိုင်း(ရာထူးတိုး)
            </button>
            <button type="button"
                class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                wire:click="go_report({{ $staff_id }}, '_salary-adjustment-annual-increase')">
                လစာညှိနှိုင်း(နှစ်တိုး)
            </button>


            {{-- $loop->iteration
                          @if (!$this->check($staff_id)) --}}
                <button type="button"
                    class="w-full h-auto py-2 text-white bg-blue-500 rounded font-arial hover:bg-blue-600"
                    wire:click="go_report({{ $staff_id }}, '_staff_list_2')">ဝန်ထမ်းလုပ်သက်အတွက်အမှတ်ပေးခြင်း</button>

            {{-- @endif --}}



        </div>
        <button type="button" wire:click="$set('open_staff_report', false)"
            class="px-4 py-2 text-white bg-gray-500 rounded font-arial hover:bg-gray-600">Cancel</button>
    </div>
</div>
