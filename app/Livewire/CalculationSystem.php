<?php

namespace App\Livewire;

use App\Exports\CS;
use App\Models\Promotion;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class CalculationSystem extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }
    private function promotion_stages($rank_id){
        return Promotion::where('rank_id', $rank_id)->where('staff_id', $this->staff_id)->first();
    }
    private function calc_points($diff){
        $points = 0;
        $diff->y > 0 ? $points = $diff->y + $points : '';
        $diff->m >= 6 ? $points++ : '';
        return $points;
    }
    public function go_excel() 
    {
        return Excel::download(new CS($this->staff_id
    ), 'CS.xlsx');
    }
//     private function calc_points($diff)
// {
//     $points = $diff->y; // Start with years

//     if ($diff->m >= 6) {
//         $points++; // Add 1 if months >= 6
//     } else {
//         // The months & days will be carried over to the next lower position
//         return ['points' => $points, 'remaining_months' => $diff->m, 'remaining_days' => $diff->d];
//     }

//     return ['points' => $points, 'remaining_months' => 0, 'remaining_days' => 0];
// }
    // public function render()
    // {
    //     $today = \Carbon\Carbon::now();
    //     $staff = Staff::where('id', $this->staff_id)->first();
    //     $promotions = Promotion::where('staff_id', $this->staff_id)->get();
    //     $first_promotion = $this->promotion_stages($staff->current_rank_id);
    //     $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
    //     $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
    //     $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;
    //     //calc points
    //     $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
    //     $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : 0;
    //     $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : 0;
    //     $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : 0;
    //     $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;

    //     return view('livewire.calculation-system',[
    //         'staff' => $staff,
    //         'promotions' => $promotions,
    //         'today' => $today,
    //         'first_promotion' => $first_promotion,
    //         'second_promotion' => $second_promotion,
    //         'third_promotion' => $third_promotion,
    //         'fourth_promotion' => $fourth_promotion,
    //         'first_promotion_points' => $first_promotion_points,
    //         'second_promotion_points' => $second_promotion_points,
    //         'third_promotion_points' => $third_promotion_points,
    //         'fourth_promotion_points' => $fourth_promotion_points,
    //         'total_points' => $total_points,
    //     ]);
    // }
    public function render()
{
    $today = \Carbon\Carbon::now();
    
    // Fetch staff details
    $staff = Staff::where('id', $this->staff_id)->first();
    
    // Get government staff started date
    $governmentStaffStartedDate = $staff ? \Carbon\Carbon::parse($staff->government_staff_started_date) : null;
    
    // Define the date range
    $startDate = \Carbon\Carbon::parse('2024-01-01'); // Change to your desired start date
    $endDate = \Carbon\Carbon::parse('2024-12-31'); // Change to your desired end date
    
    // Check if the date falls within the range
    $isWithinRange = $governmentStaffStartedDate ? $governmentStaffStartedDate->between($startDate, $endDate) : false;

    // Fetch promotions
    $promotions = Promotion::where('staff_id', $this->staff_id)->get();
    $first_promotion = $this->promotion_stages($staff->current_rank_id);
    $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
    $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
    $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;

    // Calculate promotion points
    $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
    $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : 0;
    $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : 0;
    // $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : 0;
    $third_promotion_date = $third_promotion ? \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay() : \Carbon\Carbon::parse($staff->government_staff_started_date)->subDay();
    $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($staff->government_staff_started_date, $third_promotion_date)) : 0;
    $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;

    return view('livewire.calculation-system', [
        'staff' => $staff,
        'promotions' => $promotions,
        'today' => $today,
        'first_promotion' => $first_promotion,
        'second_promotion' => $second_promotion,
        'third_promotion' => $third_promotion,
        'fourth_promotion' => $fourth_promotion,
        'first_promotion_points' => $first_promotion_points,
        'second_promotion_points' => $second_promotion_points,
        'third_promotion_points' => $third_promotion_points,
        'fourth_promotion_points' => $fourth_promotion_points,
        'total_points' => $total_points,
        'isWithinRange' => $isWithinRange, // Pass the result to the Blade template
    ]);
}
}
