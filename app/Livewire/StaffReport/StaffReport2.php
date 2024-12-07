<?php

namespace App\Livewire\StaffReport;

use App\Models\Staff;

use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;





class StaffReport2 extends Component
{

    public $searchName;
    public $staffs;
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        
      
       

        $pdf = PDF::loadView('pdf_reports.staff_report_2', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_2.pdf');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Pyidaungsu');
        $phpWord->setDefaultFontSize(12);
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန');


        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();


        $headers = ['စဥ်', 'အမည်', 'ရာထူး', 'နိုင်ငံသားစိစစ်ရေးအမှတ်', 'ဌာနခွဲ', 'မွေးသက္ကရာဇ်', 'အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ', 'တစ်ဆင့်နိမ့်ရာထူးရရက်စွဲ ရက်၊လ၊နှစ်', 'လက်ရှိရာထူးရရက်စွဲ ရက်၊လ၊နှစ်', 'ပညာအရည်အချင်း'];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true]);
        }


        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->currentRank?->name);
            $table->addCell(2000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
            $table->addCell(2000)->addText($staff->current_department?->name);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')));
            $educations = '';
            foreach ($staff->staff_educations as $edu) {
                $educations .= $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name . "\n";
            }
            $table->addCell(2000)->addText(trim($educations));
        }


        $filePath = 'staff_report_2.docx';
        $phpWord->save($filePath, 'Word2007');

        return response()->download($filePath)->deleteFileAfterSend(true);
    }


    public function render()
    {
        $staffQuery = Staff::query();

        if ($this->searchName) {
            $staffQuery->where('name', 'like', '%' . $this->searchName . '%');
        }
        $this->staffs = $staffQuery->get();




        return view('livewire.staff-report.staff-report2', [
            'staffs' => $this->staffs,
        ]);
    }
}
