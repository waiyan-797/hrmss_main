<?php

namespace App\Livewire\Reports;

use App\Exports\A05;
use App\Models\BloodType;
use App\Models\Staff;
use App\Models\StaffEducation;
use App\Models\StaffLanguage;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class Report3 extends Component
{
    // Filter properties
    public $selectedEducationId = '';
    public $selectedLanguageId = '';
    public $selectedBloodId = '';
    
    // Age filter
    public $signID = '';
    public $age = '';
    public $ageTwo = '';
    
    // Service years filter
    public $serviceSignID = '';
    public $service = '';
    public $serviceTwo = '';

    protected function getFilteredStaffs()
    {
        $query = Staff::query();

        // Education filter
        if ($this->selectedEducationId) {
            $query->whereHas('staff_educations', function ($q) {
                $q->where('education_id', $this->selectedEducationId);
            });
        }

        // Language filter
        if ($this->selectedLanguageId) {
            $query->whereHas('staff_languages', function ($q) {
                $q->where('language_id', $this->selectedLanguageId);
            });
        }

        // Blood type filter
        if ($this->selectedBloodId) {
            $query->where('blood_type_id', $this->selectedBloodId);
        }

        // Age filter with range support
        if ($this->signID !== 'all') {
            $today = Carbon::today();
            
            switch ($this->signID) {
                case '=':
                    if ($this->age) {
                        $query->whereYear('dob', '=', $today->subYears($this->age)->year);
                    }
                    break;
                case '>':
                    if ($this->age) {
                        $query->whereDate('dob', '<=', $today->subYears($this->age));
                    }
                    break;
                case '<':
                    if ($this->age) {
                        $query->whereDate('dob', '>=', $today->subYears($this->age));
                    }
                    break;
                case 'between':
                    if ($this->age && $this->ageTwo) {
                        $fromDate = $today->copy()->subYears(max($this->age, $this->ageTwo));
                        $toDate = $today->copy()->subYears(min($this->age, $this->ageTwo));
                        $query->whereBetween('dob', [$fromDate, $toDate]);
                    }
                    break;
            }
        }

        // Service years filter with range support
        if ($this->serviceSignID !== 'all') {
            $today = Carbon::today();
            
            switch ($this->serviceSignID) {
                case '=':
                    if ($this->service) {
                        $query->whereYear('current_rank_date', '=', $today->subYears($this->service)->year);
                    }
                    break;
                case '>':
                    if ($this->service) {
                        $query->whereDate('current_rank_date', '<=', $today->subYears($this->service));
                    }
                    break;
                case '<':
                    if ($this->service) {
                        $query->whereDate('current_rank_date', '>=', $today->subYears($this->service));
                    }
                    break;
                case 'between':
                    if ($this->service && $this->serviceTwo) {
                        $fromDate = $today->copy()->subYears(max($this->service, $this->serviceTwo));
                        $toDate = $today->copy()->subYears(min($this->service, $this->serviceTwo));
                        $query->whereBetween('current_rank_date', [$fromDate, $toDate]);
                    }
                    break;
            }
        }

        return $query->get();
    }

    public function go_excel() 
    {
        $filteredStaffs = $this->getFilteredStaffs();
        return Excel::download(new A05($filteredStaffs), 'A05.xlsx');
    }

    public function render()
    {
        return view('livewire.reports.report3', [
            'staffs' => $this->getFilteredStaffs(),
            'educations' => StaffEducation::all(),
            'blood_types' => BloodType::all(),
            'languages' => StaffLanguage::all(),
        ]);
    }
}
