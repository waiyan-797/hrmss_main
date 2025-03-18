<?php

namespace App\Livewire\StaffDetail;

use App\Models\Abroad;
use Livewire\Component;

class Abroads extends Component
{

    public static function datas($abroads, $countries, $abroads_types)
    {
        return  [
            'modal_title' => 'လုပ်ကိုင်ခဲ့ဖူးသည့်အလုပ်အကိုင်',
            'column_names' => [
                'သွားရောက်ခဲ့သည့်နိုင်ငံ',
                'မြို့',
                'သွားရောက်ခဲ့သည့်အကြောင်း',
                'သင်တန်းဟုတ်/မဟုတ်',
                'သင်တန်းတက်ခြင်းဖြစ်လျှင် အောင်/မအောင်',
                'သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်',
                'ထောက်ပံ့သည့်အဖွဲ့အစည်း',
                'တွေ့ဆုံခဲ့သည့် ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန',
                'သွားသည့်နေ့ (ရက်၊ လ ၊ နှစ်)',
                'ပြန်သည့်နေ့ (ရက်၊ လ ၊ နှစ်)',
                'နိုင်ငံခြားသို့သွားရောက်မည်ံနေ့ (ရက်၊ လ ၊ နှစ်)',
                'ပြန်ရောက်လျှင်အမှုထမ်းမည့် ဌာန/ရာထူး'
            ],
            'column_vals' => $abroads,
            'column_types' => [
                [
                    'type' => 'multiple-select',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'country',
                    'select_values' => $countries,
                    'require' => true
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'towns',
                    'require' => false

                ],


                [
                    'type' => 'text',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'particular',
                    'require' => true

                ],

                // [
                //     'type' => 'checkbox',
                //     'wire_array_name' => 'abroads',
                //     'wire_array_key' => 'is_training',
                // ],

                [
                    'type' => 'select',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'abroad_type_id',
                    'select_values' => $abroads_types,
                    'next_col_update' => null,
                    'require' => true

                ],




                [
                    'type' => 'checkbox',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'training_success_fail',
                    'require' => false

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'training_success_count',
                    'require' => false

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'sponser',
                    'require' => false

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'meet_with',
                    'require' => false

                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'from_date',
                    'require' => true

                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'to_date',
                    'require' => true

                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'actual_abroad_date',
                    'require' => false

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'abroads',
                    'wire_array_key' => 'position',
                    'require' => false

                ],
            ],
            'del_method' => 'remove_abroads',
        ];
    }

    public static function rules()
    {
        return [
            'abroads_country' => 'required',
            'abroads_particular' => 'required',
            'abroads_from_date' => 'required',
            'abroads_to_date' => 'required',
            'abroads_abroad_type_id' => 'required',
        ];

       

    }

    public static function messages()
    {
       

        return[
            'abroads_country.required' => 'Country field is required.',
            'abroads_particular.required' => 'Particular field is required.',
            'abroads_from_date.required' => 'From Date field is required.',
            'abroads_to_date.required' => 'To Date field is required.',
            'abroads_abroad_type_id.required' => 'abroad type field is required.',
        ];

        
    }

    public function setCreate(
        $id,
        $staffId,
        $abroads_country,
        $abroads_towns,
        $abroads_particular,
        $abroads_abroad_type_id,
        $abroads_training_success_fail,
        $abroads_training_success_count,
        $abroads_sponser,
        $abroads_meet_with,
        $abroads_from_date,
        $abroads_to_date,
        $abroads_actual_abroad_date,
        $abroads_position,
    ){

        $ab = Abroad::updateOrCreate([
                        'id' => $id,
                    ], [
                        'staff_id' => $staffId,
                        'particular' => $abroads_particular,
                        'training_success_fail' => $abroads_training_success_fail,
                        'training_success_count' => $abroads_training_success_count,
                        'sponser' => $abroads_sponser,
                        'meet_with' => $abroads_meet_with,
                        'from_date' => $abroads_from_date == '' ? null : $abroads_from_date,
                        'to_date' => $abroads_to_date == '' ? null : $abroads_to_date,
                        'actual_abroad_date' => $abroads_actual_abroad_date == '' ? null : $abroads_actual_abroad_date,
                        'position' => $abroads_position,
                        'towns' => $abroads_towns,
                        'abroad_type_id' => $abroads_abroad_type_id
                    ]);
                    $ab->countries()->sync($abroads_country);
            return $ab;

    }
}
