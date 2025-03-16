<?php

namespace App\Livewire\StaffDetail;

use App\Models\Reward;
use Livewire\Component;

class StaffRewards extends Component
{
    public static function datas($rewards){
        return [
            'modal_title' => 'ဆုတံဆိပ်များ',
            'column_names' => ['အမျိုးအစား', 'ပြည်တွင်း/နိုင်းငံခြား', 'ခုနှစ်','မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'name',
                    'select_values' => $rewards,
                ],
               
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'year',
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_rewards',
                    'wire_array_key' => 'remark',
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
    public function setCreate($staffId, $name, $year, $remark)
    {
        $reward = Reward::updateOrCreate(
            [
                'staff_id' => $staffId,
                'name' => $name == '' ? null : $name,
                'year' => $year == '' ? null : $year,
                'remark' => $remark == '' ? null : $remark,
            ]
        );
    
        return $reward;
    }

    public function setEditData($editId, $staffId, $name, $year, $remark)
    {
        $reward = Reward::findOrFail($editId);
    
        $reward->staff_id = $staffId;
        $reward->name = $name == '' ? null : $name;
        $reward->year = $year == '' ? null : $year;
        $reward->remark = $remark == '' ? null : $remark;
    
        $reward->save();
    
        return $reward;
    }
    

}
