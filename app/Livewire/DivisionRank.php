<?php

namespace App\Livewire;

use App\Models\Rank;
use Livewire\Component;

use App\Models\Division;
use App\Models\DivisionRank as ModelsDivisionRank;
use App\Models\Staff;
use Livewire\Attributes\On;
use Livewire\WithPagination;
class DivisionRank extends Component
{

    // use WithPagination;
    // public $confirm_delete = false;
    // public $confirm_edit = false;
    // public $confirm_add = false;
    // public $message = null;
    // public $division_rank_search, $division_name, $division_rank_id, $rank_id, $allowed_qty;
    // public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    // protected $rules = [
    //     'rank_id' => 'required',  
    //     'division_name' => 'required',
    //     'allowed_qty' => 'required|integer',
    // ];

    // public function add_new()
    // {
    //     $this->resetValidation();
    //     $this->reset(['rank_id', 'division_name', 'allowed_qty']);
    //     $this->confirm_add = true;
    //     $this->confirm_edit = false;
    // }

    // public function submitForm()
    // {
    //     if ($this->confirm_add) {
    //         $this->createDivisionRank();
    //     } else {
    //         $this->updateDivisionRank();
    //     }
    // }

    // public function createDivisionRank()
    // {
    //     $this->validate();

    //     ModelsDivisionRank::create([
    //         'rank_id' => $this->rank_name, 
    //         'division_id' => $this->division_name,
    //         'allowed_qty' => $this->allowed_qty,
    //     ]);

    //     $this->message = 'Created successfully.';
    //     $this->close_modal();
    // }

    // public function close_modal()
    // {
    //     $this->resetValidation();
    //     $this->reset(['rank_id', 'division_name', 'allowed_qty']);
    //     $this->confirm_edit = false;
    //     $this->confirm_add = false;
    // }

    // public function edit_modal($id)
    // {
    //     $this->resetValidation();
    //     $this->confirm_add = false;
    //     $this->confirm_edit = true;
    //     $this->division_rank_id = $id;
    //     $division_rank = ModelsDivisionRank::findOrFail($id);
    //     $this->rank_id = $division_rank->rank_id;
    //     $this->division_name = $division_rank->division_id;
    //     $this->allowed_qty = $division_rank->allowed_qty;
    // }

    // public function updateDivisionRank()
    // {
    //     $this->validate();
    //     $division_rank = ModelsDivisionRank::findOrFail($this->division_rank_id);
    //     $division_rank->update([
    //         'rank_id' => $this->rank_name, 
    //         'division_id' => $this->division_name,
    //         'allowed_qty' => $this->allowed_qty,
    //     ]);

    //     $this->message = 'Updated successfully.';
    //     $this->close_modal();
    // }

    // public function delete_confirm($id)
    // {
    //     $this->division_rank_id = $id;
    //     $this->confirm_delete = true;
    // }

    // public function delete($id)
    // {
    //     ModelsDivisionRank::findOrFail($id)->delete();
    //     $this->confirm_delete = false;
    // }
    // public function render()
    // {
        
    //     $ranks = Rank::get(); // Get ranks
    //     $divisions = Division::get(); // Get divisions

    //     $this->modal_title = $this->confirm_add ? 'ဌာနအလိုက်ရာထူးသိမ်းရန်' : 'ဌာနအလိုက်ရာထူးပြင်ရန်';
    //     $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'ပြင်ရန်';
    //     $this->cancel_action = 'close_modal';
    //     $this->submit_form = 'submitForm';

    //     $division_rank_search = '%' . $this->division_rank_search . '%';
    //     $divisionRankQuery = ModelsDivisionRank::query();

    //     if ($this->division_rank_search) {
    //         $this->resetPage(); // This resets pagination to the first page
    //         $divisionRankQuery->where(function ($q) use ($division_rank_search) {
    //             $q->where('division_name', 'LIKE', $division_rank_search)
    //               ->orWhereHas('divisions', function ($query) use ($division_rank_search) {
    //                   $query->where('name', 'LIKE', $division_rank_search);
    //               });
    //         });
    //     }

    //     // Use paginate method for paginated result
    //     $division_ranks = $divisionRankQuery
    //         ->with(['division', 'rank'])
    //         ->paginate(10);

    //     return view('livewire.division-rank', [
    //         'division_ranks' => $division_ranks,
    //         'ranks' => $ranks,
    //         'divisions' => $divisions,
    //     ]);
    // }
    // use WithPagination;

    // public $confirm_delete = false;
    // public $confirm_edit = false;
    // public $confirm_add = false;
    // public $message = null;
    // public $division_rank_search, $division_name, $rank_id, $allowed_qty, $division_rank_id;
    // public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    // protected $rules = [
    //     'rank_id' => 'required',  
    //     'division_name' => 'required',
    //     'allowed_qty' => 'required|integer',
    // ];

    // public function add_new()
    // {
    //     $this->resetValidation();
    //     $this->reset(['rank_id', 'division_name', 'allowed_qty']);
    //     $this->confirm_add = true;
    //     $this->confirm_edit = false;
    // }

    // public function submitForm()
    // {
    //     if ($this->confirm_add) {
    //         $this->createDivisionRank();
    //     } else {
    //         $this->updateDivisionRank();
    //     }
    // }

    // public function createDivisionRank()
    // {
    //     $this->validate();

    //     ModelsDivisionRank::create([
    //         'rank_id' => $this->rank_id, 
    //         'division_id' => $this->division_name,
    //         'allowed_qty' => $this->allowed_qty,
    //     ]);

    //     $this->message = 'Created successfully.';
    //     $this->close_modal();
    // }

    // public function close_modal()
    // {
    //     $this->resetValidation();
    //     $this->reset(['rank_id', 'division_name', 'allowed_qty']);
    //     $this->confirm_edit = false;
    //     $this->confirm_add = false;
    // }

    // public function edit_modal($id)
    // {
    //     $this->resetValidation();
    //     $this->confirm_add = false;
    //     $this->confirm_edit = true;
    //     $this->division_rank_id = $id;
    //     $division_rank = ModelsDivisionRank::findOrFail($id);
    //     $this->rank_id = $division_rank->rank_id;
    //     $this->division_name = $division_rank->division_id;
    //     $this->allowed_qty = $division_rank->allowed_qty;
    // }

    // public function updateDivisionRank()
    // {
    //     $this->validate();
    //     $division_rank = ModelsDivisionRank::findOrFail($this->division_rank_id);
    //     $division_rank->update([
    //         'rank_id' => $this->rank_id, 
    //         'division_id' => $this->division_name,
    //         'allowed_qty' => $this->allowed_qty,
    //     ]);

    //     $this->message = 'Updated successfully.';
    //     $this->close_modal();
    // }

    // public function delete_confirm($id)
    // {
    //     $this->division_rank_id = $id;
    //     $this->confirm_delete = true;
    // }

    // public function delete($id)
    // {
    //     ModelsDivisionRank::findOrFail($id)->delete();
    //     $this->confirm_delete = false;
    // }

    // public function render()
    // {
    //     $ranks = Rank::get(); // Get ranks
    //     $divisions = Division::get(); // Get divisions

    //     $this->modal_title = $this->confirm_add ? 'Add Division Rank' : 'Edit Division Rank';
    //     $this->submit_button_text = $this->confirm_add ? 'Save' : 'Update';
    //     $this->cancel_action = 'close_modal';
    //     $this->submit_form = 'submitForm';
    //     $division_ranks = ModelsDivisionRank::with(['division', 'rank'])
    // ->when($this->division_name, function($query) {
    //     $query->where('division_id', $this->division_name);
    // })
    // ->paginate(10);
    //     return view('livewire.division-rank', [
    //         'division_ranks' => $division_ranks,
    //         'ranks' => $ranks,
    //         'divisions' => $divisions,
    //     ]);
    // }










    // public $division_id;
    // public $rank_id;
    // public $allowed_qty;
    // public $divisions;
    // public $ranks;

    // public function mount($divisionRankId = null)
    // {
    //     $this->divisions = Division::all();
    //     $this->ranks = Rank::all();

    //     // If editing an existing DivisionRank entry
    //     if ($divisionRankId) {
    //         $divisionRank = DivisionRank::find($divisionRankId);
    //         if ($divisionRank) {
    //             $this->division_id = $divisionRank->division_id;
    //             $this->rank_id = $divisionRank->rank_id;
    //             $this->allowed_qty = $divisionRank->allowed_qty;
    //         }
    //     }
    // }

    // public function updatedDivisionId($divisionId)
    // {
    //     // Find rank and allowed_qty based on the selected division
    //     $divisionRank = DivisionRank::where('division_id', $divisionId)->first();

    //     if ($divisionRank) {
    //         $this->rank_id = $divisionRank->rank_id;
    //         $this->allowed_qty = $divisionRank->allowed_qty;
    //     } else {
    //         // Reset values if no record found
    //         $this->rank_id = null;
    //         $this->allowed_qty = 0;
    //     }
    // }

    // public function save()
    // {
    //     // Save or update the DivisionRank record
    //     DivisionRank::updateOrCreate(
    //         ['division_id' => $this->division_id],
    //         ['rank_id' => $this->rank_id, 'allowed_qty' => $this->allowed_qty]
    //     );

    //     session()->flash('message', 'Division Rank updated successfully!');
    // }
    public $division_id;
    public $rank_id;
    public $allowed_qty;
    public $divisions;
    public $ranks;
    public $divisionRanks = []; // This will hold the ranks and allowed_qty for the selected division

    public function mount($divisionRankId = null)
    {
        $this->divisions = Division::all();
        $this->ranks = Rank::all();

        // If editing an existing DivisionRank entry
        if ($divisionRankId) {
            $divisionRank = DivisionRank::find($divisionRankId);
            if ($divisionRank) {
                $this->division_id = $divisionRank->division_id;
                $this->rank_id = $divisionRank->rank_id;
                $this->allowed_qty = $divisionRank->allowed_qty;
            }
        }
    }

    public function updatedDivisionId($divisionId)
    {
        // Find rank and allowed_qty based on the selected division
        $divisionRank = DivisionRank::where('division_id', $divisionId)->get();

        $this->divisionRanks = $divisionRank; // Store the fetched records

        if ($divisionRank->isNotEmpty()) {
            $this->rank_id = $divisionRank->first()->rank_id;
            $this->allowed_qty = $divisionRank->first()->allowed_qty;
        } else {
            // Reset values if no record found
            $this->rank_id = null;
            $this->allowed_qty = 0;
        }
    }

    public function save()
    {
        // Save or update the DivisionRank record
        DivisionRank::updateOrCreate(
            ['division_id' => $this->division_id],
            ['rank_id' => $this->rank_id, 'allowed_qty' => $this->allowed_qty]
        );

        session()->flash('message', 'Division Rank updated successfully!');
    }


    public function render()
    {
        return view('livewire.division-rank');
    }

    
}
