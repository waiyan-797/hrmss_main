<?php

namespace App\Livewire;

use App\Models\LastPayCertificate;
use App\Models\Staff;
use Livewire\Component;

class LastPayCertificateMain extends Component
{
    public $staff ; 
    public $staff_id ;
    public $message ;
    public $search_id;
    public $confirm_delete = false;
    public $confirm_edit = false;
    public $confirm_add = false;
    public function render()
    {
        $lastPayCerts = LastPayCertificate::where('staff_id'  , $this->staff->id)->paginate(30);
           return view('livewire.last-pay-certificate-main' , compact('lastPayCerts'));
    }

    public function mount($staff_id){
        $this->staff = Staff::findOrFail($staff_id);
        $this->staff_id = $staff_id;
        
    }

    public function add_new()
    {
        $this->confirm_add = 1;
        $this->confirm_edit = 0;
        // $this->reset('staff_id');
        $this->redirect(route('pdf_staff_report_last_pay_detail', [
         
            'staff_id' => $this->staff_id,
            
        ]), navigate: true);
    }

    public function edit_modal($id){

        return redirect()->route('pdf_staff_report_last_pay_detail' , ['staff_id' => $this->staff_id , 'cert_id' => $id]);
    }


}
