<?php

namespace App\Livewire;

use Livewire\Component;

class SideNavButton extends Component
{
    public $route_name, $icon, $label, $count;

    public function mount($route_name, $icon, $label, $count){
        $this->route_name = $route_name;
        $this->icon = $icon;
        $this->label = $label;
        $this->count = $count;
    }

    public function render()
    {
        return view('livewire.side-nav-button');
    }
}
