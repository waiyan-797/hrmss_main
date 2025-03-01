<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\DifficultyLevel as ModelsDifficultyLevel;
use Livewire\Attributes\On;

class DifficultyLevel extends Component
{
    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $difficulty_level_search, $difficulty_level_name,$difficulty_level_hardship_allowance, $difficulty_level_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    //Validation
    protected $rules = [
        'difficulty_level_name' => 'required|string|max:255',
        'difficulty_level_hardship_allowance'=>'required|integer',
    ];
    //Add New
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['difficulty_level_name','difficulty_level_hardship_allowance']);
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
        ModelsDifficultyLevel::create([
            'name' => $this->difficulty_level_name,
            'hardship_allowance'=>$this->difficulty_level_hardship_allowance,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
    //close modal
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['difficulty_level_name','difficulty_level_hardship_allowance']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
    //edit
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->difficulty_level_id = $id;
        $difficulty_level = ModelsDifficultyLevel::findOrFail($id);
        $this->difficulty_level_name = $difficulty_level->name;
        $this->difficulty_level_hardship_allowance=$difficulty_level->hardship_allowance;
    }

    //update
    public function updatePosition()
    {
        $this->validate();
        ModelsDifficultyLevel::findOrFail($this->difficulty_level_id)->update([
            'name' => $this->difficulty_level_name,
            'hardship_allowance'=>$this->difficulty_level_hardship_allowance,
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

    //delete confirm
    public function delete_confirm($id)
    {
        $this->difficulty_level_id = $id;
        $this->confirm_delete = true;
    }

    //delete
    public function delete($id)
    {
        ModelsDifficultyLevel::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_difficulty_level')]
    public function render_difficulty_level()
    {
        $this->render();
    }
    public function render()
    {
        $this->modal_title = $this->confirm_add ? 'ဒေသစရိတ်အသစ်ထည့်ရန်
' : '‌ဒေသစရိတ်ပြင်ရန်
';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $difficultyLevelSearch = '%' . $this->difficulty_level_search . '%';
        $difficultyLevelQuery = ModelsDifficultyLevel::query();
        if ($this->difficulty_level_search) {
            $this->resetPage();
            $difficultyLevelQuery->where('name', 'LIKE', $difficultyLevelSearch);
            $difficulty_levels = $difficultyLevelQuery->paginate($difficultyLevelQuery->count() > 10 ? $difficultyLevelQuery->count() : 10);
        } else {
            $difficulty_levels = $difficultyLevelQuery->paginate(10);
        }

        return view('livewire.difficulty-level', [
            'difficulty_levels' => $difficulty_levels,
        ]);
    }
}
