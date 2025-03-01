<?php

namespace App\Livewire\Section;

use App\Models\Division;
use App\Models\Section as ModelsSection;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Section extends Component
{

    use WithPagination;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public $message = null;
    public $section_search, $section_name, $division_name, $section_id;
    public $modal_title, $submit_button_text, $cancel_action, $submit_form;

    
    protected $rules = [
        'section_name' => 'required|string|max:255',
        'division_name' => 'required',
    ];
  
    public function add_new()
    {
        $this->resetValidation();
        $this->reset(['section_name', 'division_name']);
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
   
    public function createPosition()
    {
        $this->validate();
        ModelsSection::create([
            'name' => $this->section_name,
            'division_id' => $this->division_name,
        ]);
        $this->message = 'Created successfully.';
        $this->close_modal();
    }
   
    public function close_modal()
    {
        $this->resetValidation();
        $this->reset(['section_name', 'division_name']);
        $this->confirm_edit = false;
        $this->confirm_add = false;
    }
  
    public function edit_modal($id)
    {
        $this->resetValidation();
        $this->confirm_add = false;
        $this->confirm_edit = true;
        $this->section_id = $id;
        $section = ModelsSection::findOrFail($id);
        $this->section_name = $section->name;
        $this->division_name = $section->division_id;
    }

  
    public function updatePosition()
    {
        $this->validate();
        $section = ModelsSection::findOrFail($this->section_id);
        $section->update([
            'name' => $this->section_name,
            'division_id' => $this->division_name
        ]);
        $this->message = 'Updated successfully.';
        $this->close_modal();
    }

  
    public function delete_confirm($id)
    {
        $this->section_id = $id;
        $this->confirm_delete = true;
    }

   
    public function delete($id)
    {
        ModelsSection::find($id)->delete();
        $this->confirm_delete = false;
    }

    #[On('render_section')]
    public function render_section()
    {
        $this->render();
    }
    public function render()
    {
        $divisions = Division::get();
        $this->modal_title = $this->confirm_add ? 'ဌာနစိတ်သိမ်းရန်' : 'ဌာနစိတ်ပြင်ရန်';
        $this->submit_button_text = $this->confirm_add ? 'သိမ်းရန်' : 'သိမ်းရန်';
        $this->cancel_action = 'close_modal';
        $this->submit_form = 'submitForm';

        $sectionSearch = '%' . $this->section_search . '%';
        $sectionQuery = ModelsSection::query();
        if ($this->section_search) {
            $this->resetPage();
            $sectionQuery->where(fn($q) => $q->where('name', 'LIKE', $sectionSearch)->orWhereHas('division', fn($query) => $query->where('name', 'LIKE', $sectionSearch)));
            $sections = $sectionQuery->with('division')->paginate($sectionQuery->count() > 10 ? $sectionQuery->count() : 10);
        } else {
            $sections = $sectionQuery->with('division')->paginate(10);
        }

        return view('livewire.section.section', [
            'sections' => $sections,
            'divisions' => $divisions,
        ]);
    }
}
