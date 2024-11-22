<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-900 bg-opacity-20 flex justify-center items-center text-left"
    wire:ignore.self>
    <!-- Modal Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 p-4">
        <!-- Modal Content -->
        <h2 class="text-lg font-semibold mb-4 text-gray-500 dark:text-white font-arial uppercase">{{ $modal_title }}
        </h2>
        <div class="mb-4 flex flex-col gap-2">
            <button type="button" class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, 15)">Report 15</button>
            <button type="button" class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, 17)">Report 17</button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, 18)">Report 18</button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, 19)">Report 19</button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, 53)">Report 53</button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, 68)">Report 68</button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, '_leave_3')">Leave 3</button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, '_last_pay_main')">Last Pay Certificate</button>

            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, '_salary-negotiation-promotion')">
                လစာညှိနှိုင်း(ရာထူးတိုး)
            </button>
            <button type="button"
                class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                wire:click="go_report({{ $staff_id }}, '_salary-adjustment-annual-increase')">
                လစာညှိနှိုင်း(နှစ်တိုး)
            </button>

            @if (!$this->check($staff_id))
                <button type="button"
                    class="font-arial bg-blue-500 hover:bg-blue-600 text-white w-full h-auto py-2 rounded"
                    wire:click="go_report({{ $staff_id }}, '_staff_list_2')">ဝန်ထမ်းလုပ်သက်အတွက်အမှတ်ပေးခြင်း</button>
            @endif



        </div>
        <button type="button" wire:click="$set('open_staff_report', false)"
            class="font-arial bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancel</button>
    </div>
</div>
