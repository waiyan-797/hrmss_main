<?php

namespace App\Livewire;

use Livewire\Component;

class SideNavDropDown extends Component
{
    public $label, $icon, $dropdown_id, $lists;

    public function mount($label, $icon, $dropdown_id, $lists) {
        $this->label = $label;
        $this->icon = $icon;
        $this->dropdown_id = $dropdown_id;
        $this->lists = $lists;
    }

    public function render()
    {
        return view('livewire.side-nav-drop-down');
    }
}
