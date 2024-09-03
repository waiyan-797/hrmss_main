<?php

namespace App\Livewire\LocalTrainingReport;

use App\Models\Training;
use Livewire\Component;

class LocalTrainingReport extends Component
{
    public function render()
    {
        $trainings = Training::get();
        return view('livewire.local-training-report.local-training-report',[
            'trainings' => $trainings,
        ]);
    }
}
