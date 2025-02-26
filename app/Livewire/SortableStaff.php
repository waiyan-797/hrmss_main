<?php
namespace App\Livewire;

use App\Models\Rank;
use App\Models\Staff;
use Livewire\Component;

class SortableStaff extends Component
{
    public $staffs;
    public $ranks, $selectedRankId;
    public $sortedStaffs = [];
    public $selectedStaffId = null;

    public function mount()
    {
        $this->ranks = Rank::where('is_dica', true)->get();
        $this->selectedRankId = $this->ranks->first()->id;
        $this->loadStaffs();
    }

    public function updatedSelectedRankId(){
$this->loadStaffs();
    }

    public function loadStaffs()
    {
        $query  = Staff::query()
        ->orderBy('sort_no')


        ->orderBy('current_rank_date');

        if ($this->selectedRankId) {
            $query->where('current_rank_id', $this->selectedRankId);
        }

        $this->staffs = $query->get();
        $this->sortedStaffs = $this->staffs->pluck('id')->toArray();
    }

    public function selectRow($staffId)
    {
        $this->selectedStaffId = $staffId;
    }

    public function moveUp()
    {
        if (!$this->selectedStaffId) return;

        $index = array_search($this->selectedStaffId, $this->sortedStaffs);

        if ($index > 0) {
            [$this->sortedStaffs[$index - 1], $this->sortedStaffs[$index]] =
                [$this->sortedStaffs[$index], $this->sortedStaffs[$index - 1]];
        }
    }

    public function moveDown()
    {
        if (!$this->selectedStaffId) return;

        $index = array_search($this->selectedStaffId, $this->sortedStaffs);

        if ($index < count($this->sortedStaffs) - 1) {
            [$this->sortedStaffs[$index + 1], $this->sortedStaffs[$index]] =
                [$this->sortedStaffs[$index], $this->sortedStaffs[$index + 1]];
        }
    }

    public function saveOrder()
    {
        foreach ($this->sortedStaffs as $index => $staffId) {
            Staff::where('id', $staffId)->update(['sort_no' => $index + 1]);
        }
        session()->flash('message', 'Order saved successfully!');
        $this->loadStaffs();
    }

    public function render()
    {
        return view('livewire.sortable-staff', [
            'staffs' => $this->staffs,
            'selectedStaffId' => $this->selectedStaffId
        ]);
    }
}
