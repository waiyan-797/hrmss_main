<div class="w-full">
  <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
      <div class="w-full mx-auto px-3 py-4">
        <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
        <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
        <br><br>

          <h1 class="font-bold text-center text-base mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၄ခုနှစ်၊ ဧပြီလ ဝန်ထမ်းများ၏<br>ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း</h1>
          <table class="md:w-full">
            <thead>
              <tr class="font-bold">
                <th class="border border-black text-center p-2">စဥ်</th>
                <th class="border border-black text-center p-2">ဌာနခွဲ</th>
                <th class="border border-black text-center p-2">ဝန်ထမ်းအင်အား</th>
                <th class="border border-black text-center p-2">ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ</th>
                @foreach($leave_types as $leave_type)
                <th class="border border-black text-center p-2">{{ $leave_type->name}}</th>
                @endforeach
                <th class="border border-black text-center p-2">ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း</th>
              </tr>
            </thead>
            <tbody>
              @foreach($divisions as $division)
              <tr>
                <td class="border border-black text-center p-2">{{ $loop->index + 1 }}</td>
                <td class="border border-black text-center p-2">{{ $division->name }}</td>
                <td class="border border-black text-center p-2">{{ $division->staffCount }}</td>
                <td class="border border-black text-center p-2">{{ $division->leaveCount }}</td>
                @foreach($leave_types as $leave_type)
                <td class="border border-black text-center p-2">{{ $totalLeaveTypeCounts[$leave_type->id] ?? 0 }}</td>
                @endforeach
                <td class="border border-black text-center p-2">
                    {{ number_format($division->staffCount > 0 ? ($division->leaveCount / $division->staffCount) * 100 : 0, 2) }}%
                </td>
              </tr>
              @endforeach
              <tr class="font-bold">
                <td class="border border-black text-center p-2"></td>
                <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                <td class="border border-black text-center p-2">{{ $totalStaffCount }}</td>
                <td class="border border-black text-center p-2">{{ $totalLeaveCount }}</td>
                @foreach($leave_types as $leave_type)
                <td class="border border-black text-center p-2">{{ $totalLeaveTypeCounts[$leave_type->id] ?? 0 }}</td>
                @endforeach
                <td class="border border-black text-center p-2">
                    {{ number_format($totalStaffCount > 0 ? ($totalLeaveCount / $totalStaffCount) * 100 : 0, 2) }}%
                </td>
              </tr>
            </tbody>
          </table>
      </div>
  </div>
</div>












{{-- <div class="w-full">
    <div class="flex justify-center w-full h-[83vh] overflow-y-auto">
        <div class="w-full mx-auto px-3 py-4">
          <x-primary-button type="button" wire:click="go_pdf()">PDF</x-primary-button>
          <x-primary-button type="button" wire:click="go_word()">WORD</x-primary-button>
          <br><br>

            <h1 class="font-bold text-center text-base mb-4">ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန<br>၂၀၂၄ခုနှစ်၊ ဧပြီလ ဝန်ထမ်းများ၏<br>ခွင့်ခံစားမှုအရေအတွက်နှင့်ရာခိုင်နှုန်း</h1>
            <table class="md:w-full"><thead>
                <tr class="font-bold">
                  <th class="border border-black text-center p-2">စဥ်</th>
                  <th class="border border-black text-center p-2">ဌာနခွဲ</th>
                  <th class="border border-black text-center p-2">ဝန်ထမ်းအင်အား</th>
                  <th class="border border-black text-center p-2">ခွင့်ယူသည့်ဝန်ထမ်းဦးရေ</th>
                  @foreach($leave_types as $leave_type)
                  <th class="border border-black text-center p-2">{{ $leave_type->name}}</th>
                  @endforeach
                  <th class="border border-black text-center p-2">ခွင့်ယူသည့်အင်အားရာခိုင်နှုန်း</th>
                </tr></thead>
              <tbody>
                @foreach($divisions as $division)
                <tr>
                  <td class="border border-black text-center p-2">{{ $loop->index+1}}</td>
                  <td class="border border-black text-center p-2">{{ $division->name}}</td>
                  <td class="border border-black text-center p-2">{{ $division->staffCount}}</td>
                  <td class="border border-black text-center p-2">{{ $division->leaveCount}}</td>
                  @foreach($leave_types as $leave_type)
                  <td class="border border-black text-center p-2">{{ $leaveTypeCount }}</td>
                  @endforeach
                  <td class="border border-black text-center p-2">{{ number_format($division->leaveCount >0 ? ($division)) }}</td>
                </tr>
                @endforeach
                <tr class="font-bold">
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2">စုစုပေါင်း</td>
                  <td class="border border-black text-center p-2">{{ $totalStaffCount}}</td>
                  <td class="border border-black text-center p-2">{{ $totalLeaveCount}}</td>
                  @foreach($leave_types as $leave_type)
                  <td class="border border-black text-center p-2">{{ $totalLeaveTypeCounts[$leave_type->id]}}</td>
                  @endforeach
                  <td class="border border-black text-center p-2">{{ number_format($totalLeaveCount >0 ? ($totalLeaveCount / $totalStaffCount)*100:0,)}}</td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                  <td class="border border-black text-center p-2"></td>
                </tr>
              </tbody>
              </table>


        </div>
    </div>
</div> --}}

