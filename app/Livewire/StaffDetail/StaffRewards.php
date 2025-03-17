<?php

namespace App\Livewire\StaffDetail;

use App\Models\Reward;
use Livewire\Component;

class StaffRewards extends Component
{
    public static function datas(){
        return [
            'modal_title' => 'ဆုတံဆိပ်များ',
            'column_names' => ['အမျိုးအစား', 'ပြည်တွင်း/နိုင်းငံခြား', 'ခုနှစ်','မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'name',
                    'require'   => true,
                    ],
                    [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'type',
                    'require'   => true,
                    ],
                    [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'year',
                    'require'   => false,
                    ],
                    [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'remark',
                    'require'   => false,
                    ],
            ]
        ];
        
    }

    public static function rules(): array
    {
        return [
            'staff_rewards_name' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'staff_rewards_name.required' => 'name eield is required.',
        ];
    }
    public function rewardCeate($id,$staffId,$name, $type,$year, $remark){
        $reward = Reward::updateOrCreate([
            'id'=>$id
        ],
            [
                'staff_id' => $staffId,
                'name' => $name == '' ? null : $name,
                'type' => $type == '' ? null : $type,
                'year' => $year == '' ? null : $year,
                'remark' => $remark == '' ? null : $remark,
          ]);
  
          return $reward;
      }
    

}
