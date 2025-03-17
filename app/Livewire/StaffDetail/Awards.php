<?php

namespace App\Livewire\StaffDetail;

use App\Models\Awarding;
use Livewire\Component;

class Awards extends Component
{
    public static function datas($award_types,$award_id){
        return [
            'modal_title' => 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်',
            'column_names' => ['ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', 'ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်', 'အမိန့်အမှတ်/ခုနှစ်','မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'awards',
                    'wire_array_key' => 'award_type',
                    'select_values' => $award_types,
                    'require' => true,
                ],
               
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'awards',
                    'wire_array_key' => 'award_id',
                    'select_values' => $award_id,
                    'require' => true,
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
            'awards_award_id' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'awards_award_type.required' => 'award_type eield is required.',
            'awards_award_id.required' => 'from awards_id is required.',
        ];
    }

public function awardCreate($id,$staffId,$award_type, $award_id, $order_no, $remark){
    $award = Awarding::updateOrCreate([
        'id'=>$id
    ],
        [
            'staff_id' => $staffId,
            'award_type_id' => $award_type == '' ? null : $award_type,
            'award_id' => $award_id == '' ? null : $award_id,
            'order_no' => $order_no == '' ? null : $order_no,
            'remark' => $remark == '' ? null : $remark,
      ]);

      return $award;
  }
}
