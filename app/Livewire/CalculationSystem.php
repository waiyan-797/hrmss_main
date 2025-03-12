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
    // private function calc_points($diff){
    //     $points = 0;
    //     $diff->y > 0 ? $points = $diff->y + $points : '';
    //     $diff->m >= 6 ? $points++ : '';
    //     return $points;
    // }
    public function go_excel() 
    {
        return Excel::download(new CS($this->staff_id
    ), 'CS.xlsx');
    }
    private function calc_points($diff)
{
    $points = $diff->y; // Start with years

    if ($diff->m >= 6) {
        $points++; // Add 1 if months >= 6
    } else {
        // The months & days will be carried over to the next lower position
        return ['points' => $points, 'remaining_months' => $diff->m, 'remaining_days' => $diff->d];
    }

    return ['points' => $points, 'remaining_months' => 0, 'remaining_days' => 0];
}
    public function render()
    {
        $today = \Carbon\Carbon::now();
        $staff = Staff::where('id', $this->staff_id)->first();
        $promotions = Promotion::where('staff_id', $this->staff_id)->get();
        $first_promotion = $this->promotion_stages($staff->current_rank_id);
        $second_promotion = $first_promotion ? $this->promotion_stages($first_promotion->previous_rank_id) : null;
        $third_promotion = $second_promotion ? $this->promotion_stages($second_promotion->previous_rank_id) : null;
        $fourth_promotion = $third_promotion ? $this->promotion_stages($third_promotion->previous_rank_id) : null;
        //calc points
        // $first_promotion_points = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
        // $second_promotion_points = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : 0;
        // $third_promotion_points = $third_promotion ? $this->calc_points(dateDiff($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : 0;
        // $fourth_promotion_points = $fourth_promotion ? $this->calc_points(dateDiff($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : 0;
        // $total_points = $first_promotion_points + $second_promotion_points + $third_promotion_points + $fourth_promotion_points;
        $first_result = $this->calc_points(dateDiff($first_promotion?->promotion_date, $today));
        $first_promotion_points = $first_result['points'];
        $remaining_months = $first_result['remaining_months'];
        $remaining_days = $first_result['remaining_days'];
        $second_result = $second_promotion ? $this->calc_points(dateDiff($second_promotion->promotion_date, \Carbon\Carbon::parse($first_promotion->promotion_date)->subDay())) : ['points' => 0, 'remaining_months' => 0, 'remaining_days' => 0];
        $second_promotion_points = $second_result['points'] + floor($remaining_months / 6);
        $remaining_months = ($remaining_months % 6) + $second_result['remaining_months'];
        $remaining_days += $second_result['remaining_days'];
        $third_result = $third_promotion ? $this->calc_points(dateDiff        ($third_promotion->promotion_date, \Carbon\Carbon::parse($second_promotion->promotion_date)->subDay())) : ['points' => 0, 'remaining_months' => 0, 'remaining_days' => 0];
        $third_promotion_points = $third_result['points'] + floor($remaining_months / 6);
        $remaining_months = ($remaining_months % 6) + $third_result['remaining_months'];
        $remaining_days += $third_result['remaining_days'];

        $fourth_result = $fourth_promotion ? $this->calc_points(dateDiff           ($fourth_promotion->promotion_date, \Carbon\Carbon::parse($third_promotion->promotion_date)->subDay())) : ['points' => 0, 'remaining_months' => 0, 'remaining_days' => 0];
        $fourth_promotion_points = $fourth_result['points'] + floor($remaining_months / 6);
        $remaining_months = ($remaining_months % 6) + $fourth_result['remaining_months'];
        $remaining_days += $fourth_result['remaining_days'];
        $total_points = $first_promotion_points + $second_promotion_points +         $third_promotion_points + $fourth_promotion_points;
        return view('livewire.calculation-system',[
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
        ]);
    }
}
