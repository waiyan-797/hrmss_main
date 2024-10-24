<?php

namespace App\Livewire\InvestmentCompanies;

use App\Models\Salary;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class StartedSalaryList extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $salaries = Salary::with('staff', 'rank')->get(); 
        $data = [
            'staffs' => $staffs,
            'salaries' => $salaries,
        ];
        $pdf = PDF::loadView('pdf_reports.started_salary_list_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'started_salary_list_report_pdf.pdf');
    }
    public function go_word()
{
    $staffs = Staff::with('current_rank')->get();
    $salaries = Salary::with('staff', 'rank')->get();

   
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    // Add title
    $section->addText(
        "ရင်းနှီးမြှပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန\nရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန\nစတင်ခန့်ထားသည့်ဝန်ထမ်းများ၏လစာတွက်ချက်မှု",
        ['bold' => true, 'size' => 14],
        ['alignment' => 'center']
    );

   
    foreach ($staffs as $staff) {
        $section->addTextBreak(1);
        $section->addText("အမည် - " . $staff->name);
        $section->addText("ရာထူး - " . $staff->current_rank->name);
        $section->addText("စတင်ထမ်းဆောင်သည့်နေ့ - " . $staff->join_date);
        $section->addText("ရုံးမိန့် - ");
        $section->addText("ဖေဖော်ဝါရီလ လစာ = " . en2mm($staff->current_salary * (25 / 29)));

        $section->addText("ဖေဖော်ဝါရီလ အပိုထောက်ပံ့ငွေ");
        foreach ($salaries as $salary) {
            $section->addText("= " . en2mm($salary->addition));
        }
    }

    // Save the document to a temporary file
    $fileName = 'started_salary_list_report.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $wordWriter->save($tempFile);

    // Return the file as a download response
    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}

     public function render()
     {
        $salaries = Salary::with('staff', 'rank')->get(); 
        $staffs = Staff::get();
        return view('livewire.investment-companies.started-salary-list',[ 
        'staffs' => $staffs,
        'salaries' => $salaries,
    ]);
    }
}


