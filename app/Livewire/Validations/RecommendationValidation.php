<?php

namespace App\Livewire\Validations;

use Livewire\Component;

class RecommendationValidation extends Component
{
    public static function rules(): array
    {
        return [
            'recommend_by' => 'required|string|max:255',
        ];
    }

    public static function messages(): array
    {
        return [
            'recommend_by.required' => 'ထောက်ခံသူ အမည် ဖြည့်ရန်လိုအပ်ပါသည်။',
            'recommend_by.string' => 'ထောက်ခံသူ အမည်သည် စာသားဖြစ်ရပါမည်။',
            'recommend_by.max' => 'ထောက်ခံသူ အမည်သည် ၂၅၅ လုံးထက် မပိုရပါ။',
        ];
    }
}
