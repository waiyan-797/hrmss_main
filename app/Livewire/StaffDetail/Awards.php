<?php

namespace App\Livewire\StaffDetail;

use App\Models\Awarding;
use Livewire\Component;

class Awards extends Component
{
    public static function datas($award_types,$awardsId){
        return [
            'modal_title' => 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်',
            'column_names' => ['ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်', 'အမိန့်အမှတ်/ခုနှစ်','မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'awards',
                    'wire_array_key' => 'award_type',
                    'select_values' => $award_types,
                ],
               
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'awards',
                    'wire_array_key' => 'awardId',
                    'select_values' => $awardsId,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'awards',
                    'wire_array_key' => 'order_no',
                ],
                
                [
                    'type' => 'text',
                    'wire_array_name' => 'awards',
                    'wire_array_key' => 'remark',
                ],
            ]
        ];
        
    }
    public static function rules(): array
    {
        return [
            'awards_award_type' => 'required',
            'awards_award' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'awards_award_type.required' => 'award_type eield is required.',
            'awards_award.required' => 'from awards is required.',
        ];
    }

    public function setCreate($staffId,$award_type, $award_name, $order_no, $remark)
{
    $award = Awarding::updateOrCreate(
        [
            'staff_id' => $staffId,
            'award_type_id' => $award_type == '' ? null : $award_type,
            'award_id' => $award_name == '' ? null : $award_name,
            'order_no' => $order_no == '' ? null : $order_no,
            'remark' => $remark == '' ? null : $remark,
        ]
    );

    return $award;
}

public function setEditData($editId,$staffId, $award_type, $award_name, $order_no, $remark)
{
    $award = Awarding::findOrFail($editId);
    $award->staff_id = $staffId;
    $award->award_type_id = $award_type == '' ? null : $award_type;
    $award->award_id = $award_name == '' ? null : $award_name;
    $award->order_no = $order_no == '' ? null : $order_no;
    $award->remark = $remark == '' ? null : $remark;

    $award->save();

    return $award;
}


}
