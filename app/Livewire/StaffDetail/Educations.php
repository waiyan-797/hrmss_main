<?php

namespace App\Livewire\StaffDetail;

use App\Models\Education;
use App\Models\StaffEducation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Educations extends Component
{
    use WithFileUploads;

    public static function datas($educations, $_educations, $education_types, $education_groups, $_countries, $degree_certificate)
    {
        return  [
            'column_names' => [
                'ပညာအရည်အချင်း',
                'ပညာအရည်အချင်း အုပ်စု',
                'ပညာအရည်အချင်း အမျိုးအစား',
                'ပေးအပ်သည့်နိုင်ငံ',
                'ဘွဲ့လက်မှတ်'
            ],
            'column_vals' => $educations,

            'column_types' => [
                [
                    'type' => 'select',
                    'wire_array_name' => 'educations',
                    'wire_array_key' => 'education',
                    'select_values' => is_array($_educations) ? $_educations : collect($_educations)->toArray(),
                    'next_col_update' => 'education_type',
                    'next_col_model' => 'education_type',
                    'next_col_model_related' => 'education_group',
                    'ini_array' => 'eduTypesAndGroups',
                    'disabled' => false,
                    'require' => true

                ],
                [
                'type' => 'show',
                'wire_array_name' => 'educations',
                // 'wire_array_key' => 'education_type',
                'wire_array_key' => 'education_type_text',

                // 'select_values' => $education_types,
               

               

                'disabled' => true ,
                    'require' => false




                ],
                [
                    'type' => 'show',
                'wire_array_name' => 'educations',
                // 'wire_array_key' => 'education_group',
                'wire_array_key' => 'education_group_text',

                
                'disabled' => true ,
                    'require' => false


                ],
                [
                    'type' => 'select',
                    'wire_array_name' => 'educations',
                    'wire_array_key' => 'country_id',
                    'select_values' => $_countries,

                    'require' => false

                ],
                [
                    'type' => 'file',
                    'wire_array_name' => 'educations',
                    'wire_array_key' => 'degree_certificate',
                    'require' => true

                ],
            ],
            'del_method' => 'removeEdu',
        ];
    }

    public static function rules()
    {
        return [
            'educations_education' => 'required',
           
        ];
    }

    public static function messages()
    {


        return [
            'educations_education.required' => 'Education group field is required.',
           
        ];
    }

//     public function setCreate(
//         $id,
//         $staffId,
//         $education_id,
//         $country_id,
//         // $degree_path,
//         $degree_certificate
       
//     ) {


           

       
//         ($degree_certificate)
//         ? $degree_path = $degree_certificate
//         : $degree_path = Storage::disk('upload')->put('staffs', $degree_certificate);

//    $ab =  StaffEducation::updateOrCreate([
//         'id' => $id,
//     ], [
//         // 'education_group_id' => $education['education_group'] == '' ? null : $education['education_group'],
//         // 'education_type_id' => $education['education_type'] == '' ? null : $education['education_type'],
//         'education_id' => $education_id,
//         'staff_id' => $staffId,
//         'country_id' => $country_id,
//         'degree_certificate' => $degree_path,
//     ]);
//         return $ab;
//     }

//     public function setCreate($id, $staffId, $education,$education_types,$education_groups, $country_id, $degree_certificate)
// {
   
//     $degree_path = (str_starts_with($degree_certificate, 'staffs/') && $degree_certificate)
//         ? $degree_certificate
//         : Storage::disk('upload')->put('staffs', $degree_certificate);
    
//     $education = StaffEducation::updateOrCreate([
//         'id' => $id,
//     ], [
//         'education_id' => $education == '' ? null : $education,
//         'staff_id' => $staffId,
//         'country_id' => $country_id == '' ? null : $country_id,
//         'degree_certificate' => $degree_path,
//     ]);
    
//     return $education;
// }

public function setCreate($id, $staffId, $education, $education_types, $education_groups, $country_id, $degree_certificate)
{
    $educationRecord = StaffEducation::find($id);
    $old_degree_path = $educationRecord ? $educationRecord->degree_certificate : null;
    
    $degree_path = (str_starts_with($degree_certificate, 'staffs/') && $degree_certificate)
        ? $degree_certificate
        : Storage::disk('upload')->put('staffs', $degree_certificate);

    // Create or update the education record
    $education = StaffEducation::updateOrCreate(
        ['id' => $id],
        [
            'education_id' => $education == '' ? null : $education,
            'staff_id' => $staffId,
            'country_id' => $country_id == '' ? null : $country_id,
            'degree_certificate' => $degree_path,
        ]
    );

    \Log::info('Old degree path: ' . $old_degree_path);
    \Log::info('New degree path: ' . $degree_path);

    if ($educationRecord && $old_degree_path && $old_degree_path !== $degree_path) {
        if (Storage::disk('upload')->exists($old_degree_path)) {
            Storage::disk('upload')->delete($old_degree_path);
        } else {
            \Log::warning('Old degree certificate file does not exist: ' . $old_degree_path);
        }
    }

    return $education;
}

}