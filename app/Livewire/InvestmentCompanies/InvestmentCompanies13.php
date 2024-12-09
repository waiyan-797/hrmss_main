<?php

namespace App\Livewire\InvestmentCompanies;

use App\Exports\PA13;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class InvestmentCompanies13 extends Component
{

    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.investment_companies_report_13', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'investment_companies_report_pdf_13.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new PA13(
    ), 'PA13.xlsx');
    }
    public function go_word()
{
    $staffs = Staff::get();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
    $tableStyle = [
        'borderSize' => 6,
        'borderColor' => '000000',
        'cellMargin' => 50,
    ];
    $cellStyle = [
        'valign' => 'center',
        'borderBottomColor' => '000000',
    ];
    $phpWord->addTableStyle('StaffTable', $tableStyle);
    $table = $section->addTable('StaffTable');
    $table->addRow();
    $table->addCell(500)->addText('စဥ်', ['bold' => true], $cellStyle);
    $table->addCell(2000)->addText('အမည်/ရာထူး/ဌာန', ['bold' => true], $cellStyle);
    $table->addCell(2000)->addText('ရရှိခဲ့သည့်ဘွဲ့နှင့် အထူးပြုဘာသာရပ်', ['bold' => true], $cellStyle);
    $table->addCell(2000)->addText('တက္ကသိုလ်/ကျောင်း', ['bold' => true], $cellStyle);
    $table->addCell(1500)->addText('နိုင်ငံ', ['bold' => true], $cellStyle);
    $table->addCell(1500)->addText('ဘွဲ့ရရှိခဲ့သည့်နှစ်', ['bold' => true], $cellStyle);
    $table->addCell(1500)->addText('မှတ်ချက်', ['bold' => true], $cellStyle);
    foreach ($staffs as $index => $staff) {
        foreach ($staff->schools as  $school) {
            $table->addRow();
            $table->addCell(500)->addText((en2mm($index + 1)), null, $cellStyle);
            $table->addCell(2000)->addText($staff?->name . ' / ' . $staff->current_rank?->name . ' / ' . $staff->side_department?->name, null, $cellStyle);
            $table->addCell(2000)->addText($school?->education?->name . '၊ ' . $school?->major, null, $cellStyle);
            $table->addCell(2000)->addText($school?->name, null, $cellStyle);
            $table->addCell(1500)->addText($school?->country?->name, null, $cellStyle);
            $table->addCell(1500)->addText(en2mm($school?->year), null, $cellStyle);
            $table->addCell(1500)->addText($school?->remark, null, $cellStyle); 
        }
    }

      $table->addRow();
            $table->addCell(500)->addText((en2mm($index + 1)), null, $cellStyle);
     

            $table->addCell(2000)->addText($staff?->name . ' / ' . $staff->current_rank?->name . ' / ' . $staff->side_department?->name, null, $cellStyle);
            $table->addCell(2000)->addText($school?->education?->name . '၊ ' . $school?->major, null, $cellStyle);
            $table->addCell(2000)->addText($school?->name, null, $cellStyle);
            $table->addCell(1500)->addText($school?->country?->name, null, $cellStyle);
            $table->addCell(1500)->addText(en2mm($school?->year), null, $cellStyle);
            $table->addCell(1500)->addText($school?->remark, null, $cellStyle);
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    return response()->streamDownload(function() use ($writer) {
        $writer->save('php://output');
    }, 'investment_companies_report_13.docx');
}

     public function render()
     {
        $staffs = Staff::get();
       return view('livewire.investment-companies.investment-companies13',[ 
            'staffs' => $staffs,
        ]);
 }
}
