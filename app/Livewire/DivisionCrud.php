<?php

namespace App\Livewire;

use App\Models\Division;
use Livewire\Component;
use Livewire\WithPagination;

class DivisionCrud extends Component
{

    use WithPagination;

    public $name,$divisionId;
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        
    ];

    public function render()
    {
        return view('livewire.division-crud', [
            'divisions' => Division::paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate();

        Division::create([
            'name' => $this->name,
           
        ]);

        session()->flash('message', 'Division created successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->isEditMode = true;
        $division = Division::find($id);
        $this->divisionId = $id;
        $this->name = $division->name;
        
    }

    public function update()
    {
        $this->validate();

        $division = Division::find($this->divisionId);
        $division->update([
            'name' => $this->name,
           
        ]);

        $this->isEditMode = false;
        session()->flash('message', 'Division updated successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Division::find($id)->delete();
        session()->flash('message', 'Division deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->divisionId = null;
    }

}
