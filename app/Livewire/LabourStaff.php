<?php

namespace App\Livewire;

use App\Exports\SSL10;
use App\Models\DivisionType;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class LabourStaff extends Component
{

    public  $staff_type_id=3 ;
    public $divisionTypes ; 
    public $selectedDivisionTypeId  = 3 ;
    public $title ; 
    public function mount(){
        $this->divisionTypes =DivisionType::all();
    }

    public function go_excel() 
    {
        return Excel::download(new SSL10(
    ), 'SSL10.xlsx');
    }
  
    public function render()
    {

        if($this->selectedDivisionTypeId != 3 ){
            $this->title = DivisionType::find($this->selectedDivisionTypeId)->id == 2 ? 'တိုင်းဒေသကြီး၊ ပြည်နယ်ဦးစီးမှုးရုံး' : 'ရုံးချုပ်';

        }
        $staffs = Staff::Labour() 
        ->whereHas('current_division', function ($query) {
            $query->whereHas('divisionType', 
        function($subQuery){
            $subQuery->where('id' , $this->selectedDivisionTypeId == 3 ? [ 1, 2 ]  : $this->selectedDivisionTypeId );
        }
        ); 
        
        })
        ->paginate(20);
        return view('livewire.labour-staff' , compact('staffs' ));
    }

    // public $staff_type_id;
    // public $divisionTypes;
    // public $selectedDivisionTypeId = 3;
    // public $title = 'ရုံးချုပ်'; // Default title

    // public function mount()
    // {
    //     $this->divisionTypes = DivisionType::all();
    //     $this->setTitle();
    // }

    // public function updatedSelectedDivisionTypeId()
    // {
    //     $this->setTitle();
    // }

    // private function setTitle()
    // {
    //     if ($this->selectedDivisionTypeId != 3) {
    //         $divisionType = DivisionType::find($this->selectedDivisionTypeId);
    //         $this->title = $divisionType && $divisionType->id == 2 
    //             ? 'တိုင်းဒေသကြီး၊ ပြည်နယ်ဦးစီးမှုးရုံး' 
    //             : 'ရုံးချုပ်';
    //     }
    // }

    // public function go_excel()
    // {
    //     return Excel::download(new SSL10(), 'SSL10.xlsx');
    // }

    // public function render()
    // {
    //     $staffs = Staff::Labour()
    //         ->whereHas('current_division', function ($query) {
    //             $query->whereHas('divisionType', function ($subQuery) {
    //                 $subQuery->whereIn('id', $this->selectedDivisionTypeId == 3 ? [1, 2] : [$this->selectedDivisionTypeId]);
    //             });
    //         })
    //         ->paginate(20);

    //     return view('livewire.labour-staff', [
    //         'staffs' => $staffs,
    //         'title' => $this->title, // Pass the title explicitly
    //     ]);
    // }

}
