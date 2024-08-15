<?php

namespace App\Livewire\Rank;

use App\Models\Payscale;
use App\Models\Rank as ModelsRank;
use App\Models\StaffType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Rank extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $rank_search, $rank_name, $payscale_name, $staff_type_name, $rank_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'rank_name' => 'required|string|max:255',
        'payscale_name' => 'required',
        'staff_type_name' => 'required',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['rank_name', 'payscale_name', 'staff_type_name']);
        $this->confirm_add = true;
        $this->confirm_edit = false;
    }
    public function submitForm()
    {
        if ($this->confirm_add == true) {
            $this->createPosition();
        } else {
            $this->updatePosition();
        }
    }
    //create
    public function createPosition()
    {
        $this->validate();
        ModelsRank::create([
            'name' => $this->rank_name,
            'payscale_id' => $this->payscale_name,
            'staff_type_id' => $this->staff_type_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['rank_name', 'payscale_name', 'staff_type_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->rank_id = $id;
        $rank = ModelsRank::findOrFail($id);
        $this->rank_name = $rank->name;
        $this->payscale_name = $rank->payscale_id;
        $this->staff_type_name = $rank->staff_type_id;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        $rank = ModelsRank::findOrFail($this->rank_id);
        $rank->update([
            'name' => $this->rank_name,
            'payscale_id' => $this->payscale_name,
            'staff_type_id' => $this->staff_type_name,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->rank_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsRank::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_rank')]
    public function render_rank()
    {
        $this->render();
    }
    public function render()
    {
        $payscales = Payscale::get();
        $staff_types = StaffType::get();
        $this->modal_title = $this->confirm_add ? 'Add rank' : 'Edit rank';
        $this->submit_button_text = $this->confirm_add ? 'Add' : 'Update';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $rankSearch = '%' . $this->rank_search . '%';
        $rankQuery = ModelsRank::query();
        if ($this->rank_search) {
            $this->resetPage();
            $rankQuery->where(fn($q) => $q->where('name', 'LIKE', $rankSearch)
                ->orWhereHas('payscale', fn($query) => $query->where('name', 'LIKE', $rankSearch)))
                ->orWhereHas('staff_type', fn($query) => $query->where('name', 'LIKE', $rankSearch));
            $ranks = $rankQuery->with('payscale', 'staff_type')->paginate($rankQuery->count() > 10 ? $rankQuery->count() : 10);
        } else {
            $ranks = $rankQuery->with('payscale', 'staff_type')->paginate(10);
        }

        return view('livewire.rank.rank', [
            'ranks' => $ranks,
            'payscales' => $payscales,
            'staff_types' => $staff_types,
        ]);
    }
}
