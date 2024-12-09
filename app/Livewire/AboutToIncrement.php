<?php 

namespace App\Livewire;

use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class AboutToIncrement extends Component
{
    public $endDate, $startDate;
    public $staffs;
    public $staff_id;

    public function render()
    {

        $startDate = $this->startDate;
        $endDate = $this->endDate ;

                $staffsA = Staff::all();
                $this->staffs = Staff::all()->filter(function ($staff) use ($startDate, $endDate) {
            
                    $totalLeaveDays = $staff->leaves->where('leve_type','5')->  reduce(function ($carry, $leave) {
                        $fromDate = Carbon::parse($leave->from_date);
                        $toDate = Carbon::parse($leave->to_date);
                        return $carry + $fromDate->diffInDays($toDate);
                    }, 0);
                
                    
                    if ($staff->increments->isNotEmpty()) {
                        // Get the last increment date
                        $lastIncrementDate = $staff->increments->last()->increment_date;
                
                        // Adjust the last increment date by adding leave days
                        $adjustedIncrementDate = Carbon::parse($lastIncrementDate)
                        ->addDays($totalLeaveDays)
                        ;
                
                        // Calculate the 2-year mark based on the adjusted increment date
                        $promotionDate = $adjustedIncrementDate->addYears(2);
                        $staff->promotionDate =  $promotionDate;
                    } else {

                        $adjustedJoinDate = Carbon::parse($staff->join_date)->addDays($totalLeaveDays);
                
                        $promotionDate = $adjustedJoinDate->addYears(2);
                        $staff->promotionDate =  $promotionDate;
                        
                    }
                    
                    // Check if the promotion date falls between startDate and endDate
                    return $promotionDate->between($startDate, $endDate);
                });
                

        return view('livewire.about-to-increment', [
            'staffs' => $this->staffs,
        ]);
    }

    public function mount()
    {
        $this->startDate = Carbon::now();
        $this->endDate = Carbon::now()->addWeeks(1) ;
     
    }
}
