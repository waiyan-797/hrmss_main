<?php

namespace App\Livewire\StaffDetail;

use App\Models\Training;
use Livewire\Component;

class Trainings extends Component
{
    public static function datas($training_types,$countries,$training_locations){
        return [
            'modal_title' => 'သင်တန်း',
            'column_names' => ['သင်တန်းအမည်','သင်တန်းအမှတ်စဉ်' , 'မှ', 'ထိ', 'နေရာ', 'နိုင်ငံ', 'သင်တန်းအမျိုးအစား','အဆင့်အတန်း'],
            'column_types' => [
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'training_type',
                    'select_values' => $training_types,
                    'require' => true,
                ],
               
                [
                    'type' => 'text',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'batch',
                    'require' => false,

                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'from_date',
                    'require' => false,

                ],
                [
                    'type' => 'date',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'to_date',
                    'require' => false,

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'location',
                    'require' => true,

                ],
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'country',
                    'select_values' => $countries,
                    'require' => true,

                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'trainings',
                    'next_col_update' => null,
                    'wire_array_key' => 'training_location',
                    'select_values' => $training_locations,
                    'require' => false,

                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'trainings',
                    'wire_array_key' => 'remark',
                    'require' => false,

                ],
            ]
        ];
        
    }

    public static function rules(): array
    {
        return [
            'trainings_training_type' => 'required',
            'trainings_country' => 'required',
            'trainings_training_location' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'trainings_training_type.required' => 'training_types eield is required.',
            'trainings_country.required' => 'from countries is required.',
            'trainings_training_location.required' => 'to location field is required.',
        ];
    }

    public function setCreate($id,$staffId, $training_type, $from_date, $to_date, $location, $country, $training_location, $batch, $remark)
    {
        $training = Training::updateOrCreate([
            'id' => $id,
        ],
            [
                'staff_id' => $staffId,
                'training_type_id' => $training_type == '' ? null : $training_type,
                'batch' => $batch == '' ? null : $batch,
                'from_date' => $from_date == '' ? null : $from_date,
                'to_date' => $to_date == '' ? null : $to_date,
                'location' => $location == '' ? null : $location,
                'country_id' => $country == '' ? null : $country,
                'training_location_id' => $training_location == '' ? null : $training_location,
                'remark' => $remark == '' ? null : $remark,
            ]
        );
    
        return $training;
    }
    
     
    public function setEditData($editId, $staffId, $training_type, $from_date, $to_date, $location, $country, $training_location, $batch, $remark)
{
    $training = Training::findOrFail($editId);
    $training->staff_id = $staffId;
    $training->batch = $batch == '' ? null : $batch;
    $training->training_type_id = $training_type == '' ? null : $training_type;
    $training->from_date = $from_date == '' ? null : $from_date;
    $training->to_date = $to_date == '' ? null : $to_date;
    $training->location = $location == '' ? null : $location;
    $training->country_id = $country == '' ? null : $country;
    $training->training_location_id  = $training_location == '' ? null : $training_location;
    $training->remark = $remark == '' ? null : $remark;

    $training->save();

    return $training;
}

}
