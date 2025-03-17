<?php

namespace App\Livewire\StaffDetail;

use App\Models\Punishment;
use Livewire\Component;

class Punishments extends Component
{
    public static function datas($penalty_types){
        return [
            'modal_title' => 'ပြစ်ဒဏ်ခံရခြင်း',
            'column_names' => ['ပြစ်ဒဏ်အမျိုးအစား', 'ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရင်း', 'မှ', 'ထိ'],
            'column_types' => [
                [
                    'type' => 'select',
                    'wire_array_name' => 'punishments',
                    'next_col_update' => null,
                    'wire_array_key' => 'penalty_type',
                    'select_values' => $penalty_types,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'punishments',
                    'wire_array_key' => 'reason',
                    'require' => false,
                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'punishments',
                    'wire_array_key' => 'from_date',
                    'require' => false,
                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'punishments',
                    'wire_array_key' => 'to_date',
                    'require' => false,
                ],
            ]
        ];
        
    }
    public static function rules(): array
    {
        return [
            'punishments_penalty_type' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'punishments_penalty_type.required' => 'penalty_type field is required.',
        ];
    }

    public function punishmentCreate($id,$staffId,$punishments_penalty_type, $punishments_reason, $punishments_from_date, $punishments_to_date){
        $punishment = Punishment::updateOrCreate([
            'id'=>$id
        ],
            [
        'staff_id' => $staffId,
            'penalty_type_id' => $punishments_penalty_type == '' ? null : $punishments_penalty_type,
            'reason' => $punishments_reason == '' ? null : $punishments_reason,
            'from_date' => $punishments_from_date == '' ? null : $punishments_from_date,
            'to_date' => $punishments_to_date == '' ? null : $punishments_to_date,
          ]);
  
          return $punishment;
      }

      
}
