<?php

namespace App\Livewire\InvestmentCompanies;

use App\Livewire\Division;
use App\Models\Division as ModelsDivision;
use App\Models\LastPayCertificate as ModelsLastPayCertificate;
use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class LastPayCertificate extends Component
{

    public $currentPage  =2 ; 
    public $staff ;
    public $divisions ;
    public $toDivisionName;
    public $certificate ;
    public $salaries ;


    // form 

    public $ordered_date , $order_no , $paid_up_to_date ,$amount;
    public $to_division_id  ,$transfer_date 

    ;
    //form 


    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];


        $pdf = PDF::loadView('pdf_reports.last_pay_certificate_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'last_pay_certificate_report_pdf.pdf');
    }
    
    
    public function render()
     {
        
        $staffs = Staff::get();

        if($this->to_division_id){
            $this->toDivisionName = ModelsDivision::findOrFail($this->to_division_id)->name;
        }
       return view('livewire.investment-companies.last-pay-certificate',[ 
        'staffs' => $staffs,
    ]);
     }


     public function changeCurrentPage($val){
        $this->currentPage = $val;
     }


     public function mount($staff_id , $cert_id = null ){
        $this->divisions = ModelsDivision::all();
        $this->staff = Staff::findOrFail($staff_id);
        if($cert_id){
            $this->certificate = ModelsLastPayCertificate::findOrFail($cert_id);
        }else{
            $this->to_division_id = ModelsDivision::first()->id;

        }
        if($this->certificate){


            
            $this->ordered_date = $this->certificate->ordered_date;
            $this->order_no = $this->certificate->order_no;
            $this->paid_up_to_date = $this->certificate->paid_up_to_date;
            $this->amount = $this->certificate->amount;
            
            $this->to_division_id = $this->certificate->to_division_id;
            $this->transfer_date = $this->certificate->transfer_date;




        }

        // $this->salaries = $this->staff->salaries()->where()

     }

     public function submitForm(){


        
        ModelsLastPayCertificate::updateOrCreate(
            
            [
                'id' => $this->certificate?->id
            ] ,
            [
            'staff_id' => $this->staff->id,
            'from_division_id' => $this->staff->current_division->id,
            'to_division_id' => $this->to_division_id ,

            'transfer_date' => Carbon::parse( $this->transfer_date )->format('d-m-Y'),
            'ordered_date' => Carbon::parse( $this->ordered_date )->format('d-m-Y'),
            'paid_up_to_date' => Carbon::parse( $this->paid_up_to_date )->format('d-m-Y'),
            'amount' => $this->amount,

            
            'order_no' => $this->order_no 
            
        ]);
     }
}
