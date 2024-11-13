<?php
namespace App\Livewire;

use App\Models\Staff;
use App\Models\LabourAttendance;
use Livewire\Component;
use Carbon\Carbon;

class LeaveCalendar extends Component
{
    public $staff;
    public $selectedMonth;
    public $year, $month;
    public $attendances = [];
    public $totalAttDays ; 
    public $attDays;
// public $attendance;
    public function mount($id)
    {
        $this->staff = Staff::findOrFail($id);
        $this->selectedMonth = Carbon::now()->format('Y-m');
    }

    public function updateMonth()
    {
        $this->year = explode('-', $this->selectedMonth)[0];
        $this->month = explode('-', $this->selectedMonth)[1];
    }

    public function storeAttendance($day)
    {
        $this->year = explode('-', $this->selectedMonth)[0];
        $this->month = explode('-', $this->selectedMonth)[1];
        $year = $this->year;
        $month = $this->month;
        
        // Find the attendance record for this month and year
        $attendance = LabourAttendance::where('staff_id', $this->staff->id)
            ->where('year', $year)
            ->where('month', $month)
            ->first();
    
        // If a record exists
        if ($attendance) {
            $att_date = json_decode($attendance->att_date, true) ?? [];
            
            // Check if the day is already in the att_date array
            if (in_array($day, $att_date)) {
                // Remove the day from the array
                $att_date = array_filter($att_date, fn($item) => $item != $day);
                $att_date = array_values($att_date); // Reindex the array after removal
            } else {
                // Add the day to the array
                $att_date[] = $day;
            }
            
            // Update the attendance record with the modified att_date
            $attendance->att_date = json_encode($att_date);
            $attendance->save();
        } else {
            // If no record exists, create a new one with the clicked day
            LabourAttendance::create([
                'staff_id' => $this->staff->id,
                'month' => $month,
                'year' => $year,
                'att_date' => json_encode([$day]),
            ]);
        }
    }
    

    public function render()
    {

        $this->year = explode('-', $this->selectedMonth)[0];
        $this->month = explode('-', $this->selectedMonth)[1];
        // dd($this->attendance);
        
        $this->attDays =$this->staff->getAttDate($this->year ,$this->month);
          $this->totalAttDays  = $this->staff->labourAtt($this->year ,$this->month);
        return view('livewire.leave-calendar'
        ,
        ["attDays"=>$this->attDays]

    
    
    );
    }
}
