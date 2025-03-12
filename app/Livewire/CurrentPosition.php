<?php
namespace App\Livewire;

use App\Exports\SSL14;
use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CurrentPosition extends Component
{
    public $age, $ageTwo, $signID, $selectedRankId, $staffs, $ranks;
    public function mount()
    {
        $this->ranks = (new Rank() )->isDicaAll();
    }
    public function go_excel($age = null, $ageTwo = null, $signID = null, $selectedRankId = null, $selectedRankName = null) 
    {
        return Excel::download(new SSL14(
            $this->age,
            $this->ageTwo,
            $this->signID,
            $this->selectedRankId
        ), 'SSL14.xlsx');
    }
    public function render()
    {
        $now = Carbon::now();
    $query = Staff::query();
    if (!empty($this->age) && is_numeric($this->age)) {
        $currentRankDate = $now->copy()->subYears($this->age);
        if ($this->signID === '>') {
            $query->where('current_rank_date', '<=', $currentRankDate);
        } elseif ($this->signID === '<') {
            $query->where('current_rank_date', '>', $currentRankDate);
        } elseif ($this->signID === '=') {
            $query->whereYear('current_rank_date', '=', $currentRankDate->year);
        } elseif ($this->signID === 'between' && !empty($this->ageTwo) && is_numeric($this->ageTwo)) {
            $currentRankDateFrom = $now->copy()->subYears($this->age);
            $currentRankDateTo = $now->copy()->subYears($this->ageTwo);
            $query->whereBetween('current_rank_date', [$currentRankDateTo, $currentRankDateFrom]);
        }
    }
    if (!empty($this->selectedRankId)) {
        $query->where('current_rank_id', $this->selectedRankId);
    }
    $this->staffs = $query->with('currentRank')->get();
    $selectedRankName = null;
    if (!empty($this->selectedRankId)) {
        $selectedRankName = Rank::find($this->selectedRankId)?->name ?? 'ရာထူးအားလုံး';
    }

    if (!function_exists('getSignName')) {
        function getSignName($signID)
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
        return view('livewire.current-position',[
        'staffs' => $this->staffs,
        'ranks' => $this->ranks,
        'age' => $this->age,
        'signID' => $this->signID,
        'selectedRankName' => $selectedRankName, 
        ]);
    }
}