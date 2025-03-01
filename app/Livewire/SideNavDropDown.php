<?php

namespace App\Livewire;

use Livewire\Component;

class SideNavDropDown extends Component
{
    public $label, $icon, $lists;

    public function mount($label, $icon, $lists) {
        $this->label = $label;
        $this->icon = $icon;
        $this->lists = $lists;
    }

    public function render()
    {
        return view('livewire.side-nav-drop-down');
    }
}
