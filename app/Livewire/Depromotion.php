<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Depromotion as ModelsDepromotion;
use App\Models\Staff;
use App\Models\Rank;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\Return_;

class Depromotion extends Component
{
  
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $depromotion_search, $staff_name, $depromotion_id,$from_date,$to_date, $previous_rank_name,$depromoted_rank_name;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;
    public $staff_id, $staff;
    protected $rules = [

        'from_date' => 'required|date',
        'to_date'=>'required|date',
        'previous_rank_name' => 'required',
        'depromoted_rank_name' => 'required'
    ];
    public function add_new()
    {

        $this->resetValidation();
        $this->reset([
            'from_date',
            'to_date',
            'previous_rank_name',
            'depromoted_rank_name'
        ]);

        $this->previous_rank_name = $this->staff->previous_rank_id;
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    public function submitForm()
    {
        if ($this->confirm_add) {
            $this->createDepromotion();
        } else {
            $this->updateDepromotion();
        }
    }

    public function createDepromotion()
    {
        // $this->validate();


        ModelsDepromotion::create([
            'staff_id' => $this->staff->id,
            'from_date' => $this->from_date,
            'to_date'=>$this->to_date,
            'previous_rank_id' => $this->previous_rank_name,
            'depromoted_rank_id' => $this->depromoted_rank_name,

        ]);
        $this->staff->current_rank_id = $this->previous_rank_name;
      
        $this->staff->update();
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset([
            'staff_name',
            'from_date',
            'to_date',
            'previous_rank_name',
            'depromoted_rank_name'
           
        ]);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->depromotion_id = $id;
        $depromotion = ModelsDepromotion::findOrFail($id);
        $this->staff_name = $depromotion->staff_id;
        $this->from_date = $depromotion->from_date;
        $this->to_date=$depromotion->to_date;
        $this->previous_rank_name = $depromotion->previous_rank_id;
        $this->depromoted_rank_name = $depromotion->depromoted_rank_id;
    }

    public function updateDepromotion()
    {
        $this->validate();
        $depromotion = ModelsDepromotion::findOrFail($this->depromotion_id);
        $depromotion->update([
            'staff_id' => $this->staff_name,
            'from_date' => $this->from_date,
            'to_date'=>$this->to_date,
            'previous_rank_id' =>   $this->previous_rank_name,
            'depromoted_rank_id' => $this->depromoted_rank_name,

        ]);
        $this->staff->current_rank_id = $this->depromoted_rank_name;
        $this->staff->update();
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {
        $this->depromotion_id = $id;
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        ModelsDepromotion::findOrFail($id)->delete();
        $this->confirm_delete = false;
    }

    public function mount($staff_id)
    {

        $this->staff_id = $staff_id;

        $this->staff = Staff::find($staff_id);
        // dd($this->staff);
        // $this->rank_name = $this->staff->current_rank_id;
    }


    #[On('render_depromotion')]
    public function render_depromotion()
    {
        $this->render();
    }
    public function render()
{
    // Fetch all staff and ranks
    $staffs = Staff::all();
    $ranks = [];
    if ($this->staff->currentRank) {
        $ranks = Rank::where('payscale_id', '<', $this->staff->currentRank->payscale_id)->get();
    }

    $allRanks = Rank::all();
    $this->modal_title = $this->confirm_add ? 'ရာထူးတိုးသိမ်းရန်' : 'ရာထူးတိုးပြင်ရန်';
    $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'ပြင်ရန်';
    $this->cancel_action = 'close_modal';
    $this->submit_form = 'submitForm';
    $depromotionSearch = '%' . $this->depromotion_search . '%';
    $depromotionQuery = ModelsDepromotion::query();

    if ($this->depromotion_search) {
        $this->resetPage();
        $depromotionQuery->where(function ($q) use ($depromotionSearch) {
            $q->where('staff_name', 'LIKE', $depromotionSearch)->orWhereHas('staff', function ($query) use ($depromotionSearch) {
                $query->where('name', 'LIKE', $depromotionSearch);
            });
        });
    }
    $this->previous_rank_name = $this->staff->current_rank_id;
    $depromotions = $depromotionQuery->where('staff_id', $this->staff_id)
        ->with(['staff', 'rank'])
        ->paginate($depromotionQuery->count() > 10 ? $depromotionQuery->count() : 10);
    return view('livewire.depromotion', [
        'depromotions' => $depromotions,
        'staffs' => $staffs,
        'ranks' => $ranks,
        'allRanks' => $allRanks
    ]);
}
}



