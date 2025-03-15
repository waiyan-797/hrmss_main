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

    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $division_rank_search, $division_name, $rank_id, $allowed_qty, $division_rank_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    protected $rules = [
        'rank_id' => 'required',  
        'division_name' => 'required',
        'allowed_qty' => 'required|integer',
    ];

    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['rank_id', 'division_name', 'allowed_qty']);
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }

    public function submitForm()
    {
        if ($this->confirm_add) {
            $this->createDivisionRank();
        } else {
            $this->updateDivisionRank();
        }
    }

    public function createDivisionRank()
    {
        $this->validate();

        ModelsDivisionRank::create([
            'rank_id' => $this->rank_id, 
            'division_id' => $this->division_name,
            'allowed_qty' => $this->allowed_qty,
        ]);

        $this->message = 'Created successfully.';
        $this->close_modal();
    }

    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['rank_id', 'division_name', 'allowed_qty']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }

    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->division_rank_id = $id;
        $division_rank = ModelsDivisionRank::findOrFail($id);
        $this->rank_id = $division_rank->rank_id;
        $this->division_name = $division_rank->division_id;
        $this->allowed_qty = $division_rank->allowed_qty;
    }

    public function updateDivisionRank()
    {
        $this->validate();
        $division_rank = ModelsDivisionRank::findOrFail($this->division_rank_id);
        $division_rank->update([
            'rank_id' => $this->rank_id, 
            'division_id' => $this->division_name,
            'allowed_qty' => $this->allowed_qty,
        ]);

        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    public function delete_confirm($id)
    {
        $this->division_rank_id = $id;
        $this->confirm_delete = true;
    }

    public function delete($id)
    {
        ModelsDivisionRank::findOrFail($id)->delete();
        $this->confirm_delete = false;
    }

    public function render()
    {
        $ranks = Rank::get(); // Get ranks
        $divisions = Division::get(); // Get divisions

        $this->modal_title = $this->confirm_add ? 'Add Division Rank' : 'Edit Division Rank';
        $this->submit_button_text = $this->confirm_add ? 'Save' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';
        $division_ranks = ModelsDivisionRank::with(['division', 'rank'])
    ->when($this->division_name, function($query) {
        $query->where('division_id', $this->division_name);
    })
    ->paginate(10);
        return view('livewire.division-rank', [
            'division_ranks' => $division_ranks,
            'ranks' => $ranks,
            'divisions' => $divisions,
        ]);
    }
   
}
