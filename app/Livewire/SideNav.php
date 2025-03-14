<?php

namespace App\Livewire;

use Livewire\Component;

class SideNav extends Component
{
    public $collapsed = true;
    // protected $listeners = ['toggleNav'];
    public function render()
    {
        return view('livewire.side-nav');
    }
    public function toggleNav(){
        $this->collapsed = !$this->collapsed;
        session(['sideNavCollapsed' => $this->collapsed]);
    }
    public function mount (){
        $this->collapsed = session('sideNavCollapsed', false);
    }
}
