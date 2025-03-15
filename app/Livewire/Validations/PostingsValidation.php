<?php

namespace App\Livewire\Validations;

use Livewire\Component;

class PostingsValidation extends Component
{
    public static function rules(): array
    {
        return [
            'postings_rank' => 'required',
            'postings_from_date' => 'required',
            'postings_to_date' => 'required',
            'postings_ministry' => 'required',
            'postings_department' => 'required',

        ];
    }

    public static function messages(): array
    {
        return [
            'postings_rank.required' => 'rank eield is required.',
            'postings_from_date.required' => 'from date is required.',
            'postings_to_date.required' => 'to date field is required.',
            'postings_ministry.required' => 'ministry field is required.',
            'postings_department.required' => 'department field is required.',
        ];
    }
}
