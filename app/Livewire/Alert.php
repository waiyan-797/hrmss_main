<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $showModal = false;  // Controls modal visibility
    public $userInput;  // To store the user input

    public function showModal()
    {
        $this->showModal = true;
    }

    public function submit()
    {
        // Here you can process the user input
        // For example, save to the database or perform some logic
        $this->showModal = false;  // Close the modal after submission
        session()->flash('message', 'Input received: ' . $this->userInput);
    }




    public function render()
    {
        return view('livewire.alert');
    }
}
