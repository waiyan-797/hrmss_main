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
    // 
    $section = $phpWord->addSection([
        'orientation' => 'portrait',
        'pageSizeW'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5), // Legal width in inches
        'pageSizeH'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(14),  // Legal height in inches
        'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),     // 1 inch
        'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
    ]);
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center','spaceBefore' => 200]);
    $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
    $section->addTitle('ရင်းနှီးမြှုပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
    $section->addTitle('ဘွဲ့ရရှိသူများစာရင်း', 2);
    // $phpWord->addTableStyle('StaffTable', $tableStyle);
    $table = $section->addTable(['borderSize' => 10, 'borderColor' => '000000', 'cellMargin' => 60]);
    $table->addRow();
    $table->addCell(700)->addText('စဥ်', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    // $table->addCell(2000)->addText('အမည်/ရာထူး/ဌာန', ['bold' => true], $cellStyle);
    $table->addCell(3500)->addText('အမည်', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $table->addCell(3500)->addText('ရာထူး', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    // $table->addCell(2000)->addText('ရရှိခဲ့သည့်ဘွဲ့နှင့် အထူးပြုဘာသာရပ်', ['bold' => true], $cellStyle);
    $table->addCell(2800)->addText('ပညာအရည်အချင်း', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    // $table->addCell(2000)->addText('တက္ကသိုလ်/ကျောင်း', ['bold' => true], $cellStyle);
    $table->addCell(2000)->addText('နိုင်ငံ', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    // $table->addCell(1500)->addText('ဘွဲ့ရရှိခဲ့သည့်နှစ်', ['bold' => true], $cellStyle);
    $table->addCell(1500)->addText('မှတ်ချက်', ['bold' => true],['alignment'=>'center','spaceBefore'=>100]);
    $serialNumber = 1; // Initialize serial number


    foreach ($staffs as $staff) {
        $table->addRow();

        // Add Serial Number
        $table->addCell(700)->addText(en2mm($serialNumber++));

        // Add Staff Name
        $table->addCell(3500)->addText($staff->name);

        // Add Current Rank
        $table->addCell(3500)->addText($staff->current_rank ? $staff->current_rank->name : null);

        // Add Education and Major
        $table->addCell(2800)->addText($staff->staff_educations->isNotEmpty() 
        ? $staff->staff_educations->pluck('education.name')->filter()->implode(', ') 
        : null);

        // Add Country
        $table->addCell(2000)->addText($staff->staff_educations->isNotEmpty() 
        ? $staff->staff_educations->pluck('country.name')->filter()->implode('၊ ') 
        : null );

        // Add Year
        // $table->addCell(1500)->addText(
        //     en2mm($school?->year),
        //     null,
            
        // );

        // Add Remark
        $table->addCell(1500)->addText('');
    }



    //   $table->addRow();
    //         $table->addCell(500)->addText((en2mm($index + 1)), null, $cellStyle);
     

    //         $table->addCell(2000)->addText($staff?->name . ' / ' . $staff->current_rank?->name . ' / ' . $staff->side_department?->name, null, $cellStyle);
    //         $table->addCell(2000)->addText($school?->education?->name . '၊ ' . $school?->major, null, $cellStyle);
    //         $table->addCell(2000)->addText($school?->name, null, $cellStyle);
    //         $table->addCell(1500)->addText($school?->country?->name, null, $cellStyle);
    //         $table->addCell(1500)->addText(en2mm($school?->year), null, $cellStyle);
    //         $table->addCell(1500)->addText($school?->remark, null, $cellStyle);
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
