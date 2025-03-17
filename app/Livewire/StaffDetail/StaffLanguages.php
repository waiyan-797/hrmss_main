<?php

namespace App\Livewire\StaffDetail;

use App\Models\StaffLanguage;
use Livewire\Component;

class StaffLanguages extends Component
{
    public static function datas($languages){
        return [
            'modal_title' => 'ဘာသာစကားကျွမ်းကျင်မှု',
            'column_names' => ['ဘာသာစကား', 'အဆင့်', 'အရေး', 'အဖတ်', 'အပြော', 'မှတ်ချက်'],
            'column_types' => [
                [
                    'type' => 'search_select',
                    'wire_array_name' => 'staff_languages',
                    'wire_array_key' => 'language',
                    'select_values' => $languages,
                    'require' => true,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_languages',
                    'wire_array_key' => 'rank',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_languages',
                    'wire_array_key' => 'writing',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_languages',
                    'wire_array_key' => 'reading',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_languages',
                    'wire_array_key' => 'speaking',
                    'require' => false,
                ],
                [
                    'type' => 'text',
                    'wire_array_name' => 'staff_languages',
                    'wire_array_key' => 'remark',
                    'require' => false,
                ],
            ]
        ];
        
    }
    public static function rules(): array
    {
        return [
            'staff_languages_language' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'staff_languages_language.required' => 'Language Field is required.',
        ];
    }

    public function setCreate($staffId, $staff_languages_language, $staff_languages_rank, $staff_languages_writing, $staff_languages_reading, $staff_languages_speaking, $staff_languages_remark)
    {
        $language = StaffLanguage::updateOrCreate(
            [
                'staff_id' => $staffId,
                'language_id' => $staff_languages_language == '' ? null : $staff_languages_language,
                'rank' => $staff_languages_rank == '' ? null : $staff_languages_rank,
                'writing' => $staff_languages_writing == '' ? null : $staff_languages_writing,
                'reading' => $staff_languages_reading == '' ? null : $staff_languages_reading,
                'speaking' => $staff_languages_speaking == '' ? null : $staff_languages_speaking,
                'remark' => $staff_languages_remark == '' ? null : $staff_languages_remark,
            ]
        );
    
        return $language;
    }
    
    public function setEditData($editId, $staffId, $staff_languages_language, $staff_languages_rank, $staff_languages_writing, $staff_languages_reading, $staff_languages_speaking, $staff_languages_remark)
    {
        $post = StaffLanguage::findOrFail($editId);
    
        $post->staff_id = $staffId;
        $post->language_id = $staff_languages_language == '' ? null : $staff_languages_language;
        $post->rank = $staff_languages_rank == '' ? null : $staff_languages_rank;
        $post->writing = $staff_languages_writing == '' ? null : $staff_languages_writing;
        $post->reading = $staff_languages_reading == '' ? null : $staff_languages_reading;
        $post->speaking = $staff_languages_speaking == '' ? null : $staff_languages_speaking;
        $post->remark = $staff_languages_remark == '' ? null : $staff_languages_remark;
    
        $post->save();
    
        return $post;
    }
}
