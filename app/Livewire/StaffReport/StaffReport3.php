<?php

namespace App\Livewire\StaffReport;

use App\Models\PensionYear;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffReport3 extends Component
{
    public $staffs;
    public $searchName;
    public function go_pdf()
    {
        $staffs = Staff::get();
        $pension_year = PensionYear::first();
        $data = [
            'staffs' => $staffs,
            'pension_year' => $pension_year,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_3', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_3.pdf');
    }

    public function go_word()
    {
        $staffs = Staff::get();
        $pension_year = PensionYear::first();
        $data = [
            'staffs' => $staffs,
            'pension_year' => $pension_year,
        ];

        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Pyidaungsu');
        $phpWord->setDefaultFontSize(12);

        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);

        // Add title
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addText('(၁-၄-၂၀၂၄) ရက်နေ့၏ ဝန်ထမ်းများစာရင်း', 1);

        // Create table
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Add table header
        $table->addRow();
        $headerTitles = [
            'စဥ်',
            'အမည်',
            'ရာထူး',
            'နိုင်ငံသားစိစစ်ရေးအမှတ်',
            'မွေးသက္ကရာဇ်',
            'အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ',
            'လက်ရှိအဆင့်ရရက်စွဲ',
            'ဌာနခွဲ',
            'ပညာအရည်အချင်း',
            'ပင်စင်ပြည့်သည့်နေ့စွဲ',
            'မှတ်ချက်'
        ];

        foreach ($headerTitles as $title) {
            $table->addCell(2000)->addText($title, ['bold' => true]);
        }

        // Add table data
        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->currentRank?->name);
            $table->addCell(2000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')));
            $table->addCell(2000)->addText($staff->side_department?->name);
            $table->addCell(2000)->addText($this->getEducationString($staff));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->year + $pension_year->year));
            $table->addCell(2000)->addText('');
        }


        $fileName = 'staff_report_3.docx';
        $temp_file = tempnam(sys_get_temp_dir(), 'Word_');
        $phpWord->save($temp_file, 'Word2007');

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }



    public function render()
    {
        $staffQuery = Staff::query();

        if ($this->searchName) {
            $staffQuery->where('name', 'like', '%' . $this->searchName . '%');
        }
        $this->staffs = $staffQuery->get();
        $pension_year = PensionYear::first();
        return view('livewire.staff-report.staff-report3', [
            'staffs' => $this->staffs,
            'pension_year' => $pension_year,
        ]);
    }
    private function getEducationString($staff)
    {
        $educationStrings = [];
        foreach ($staff->staff_educations as $edu) {
            $educationStrings[] = $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name;
        }
        return implode("\n", $educationStrings);
    }
}
