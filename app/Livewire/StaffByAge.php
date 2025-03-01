<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Carbon\Carbon;
class StaffByAge extends Component
{
    public $staffs;
    public $age;
    public $ageTwo;
    public $signID;
    public function render()
    {
        $now = Carbon::now();
        $query = Staff::query();
        if (!empty($this->age) && is_numeric($this->age)) {
            $birthDate = $now->copy()->subYears($this->age);

            if ($this->signID === '>') {
                $query->where('dob', '<=', $birthDate);
            } elseif ($this->signID === '<') {
                $query->where('dob', '>', $birthDate);
            } elseif ($this->signID === '=') {
                $query->whereYear('dob', '=', $birthDate->year);
            } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
                $birthDateFrom = $now->copy()->subYears($this->age);
                $birthDateTo = $now->copy()->subYears($this->ageTwo);
                $query->whereBetween('dob', [$birthDateTo, $birthDateFrom]);
            }
        }

        $this->staffs = $query->get();
        return view('livewire.staff-by-age', [
            'staffs' => $this->staffs,
        ]);
    }

    public function getSignName($signID)
    {
        return match ($signID) {
            'all' => 'အားလုံး',
            'between' => 'နှစ်ကြား',
            '>' => 'နှစ်အထက်',
            '=' => 'နှစ်',
            '<' => 'နှစ်အောက်',
            default => '',
        };
    }

}

