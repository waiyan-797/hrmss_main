<?php

namespace App\Livewire\Reports;
use App\Exports\A05;
use App\Models\Staff;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;
class Report3 extends Component
{
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.report_3', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'report_2.pdf');
    }
    public function go_excel() 
    {
        return Excel::download(new A05(
    ), 'A05.xlsx');
    }
    public function go_word()
    {
        $staffs = Staff::get();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]);
        $section->addText('Report - 3', ['bold' => true, 'size' => 14], ['alignment' => 'center']);
        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '000000',
            'cellMargin' => 80
        ]);
        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အမည်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဝန်ထမ်းအမှတ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ရာထူး', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အသက်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လက်ရှိရာထူးရသောလုပ်သက်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လုပ်သက်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ပညာအရည်အချင်း', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ကျား/မ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('လူမျိုး', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဘာသာ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ယခုနေထိုင်သည့်နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အမြဲတမ်းလိပ်စာ', ['bold' => true]);
        $table->addCell(6000, ['gridSpan' => 2, 'valign' => 'center'])->addText('သားသမီးအရေအတွက်');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အိမ်ထောင်(ရှိ/မရှိ)', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ကျန်းမာရေး', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('သွေးအုပ်စု', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အရပ်အမြင့်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဝါသနာ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဘာသာ', ['bold' => true]);

        $table->addRow();
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(3000)->addText('ကျား', ['alignment' => 'center']);
        $table->addCell(3000)->addText('မ', ['alignment' => 'center']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);

        foreach ($staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1, null, ['alignment' => 'center']);
            $table->addCell(2000)->addText($staff->name, null, ['alignment' => 'center']);
            $table->addCell(1500)->addText($staff->staff_no, null, ['alignment' => 'center']);
            $table->addCell(2000)->addText(optional($staff->current_rank)->name, null, ['alignment' => 'center']);
            $table->addCell(1000)->addText(\Carbon\Carbon::parse($staff->dob)->age . ' years', null, ['alignment' => 'center']);
            $table->addCell(2000)->addText(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-Y'), null, ['alignment' => 'center']);
            $table->addCell(1500)->addText(\Carbon\Carbon::parse($staff->current_rank_date)->age . ' years', null, ['alignment' => 'center']);
            $educationText = '';
            foreach ($staff->staff_educations as $edu) {
                $educationText .= $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name . "\n";
            }
            $table->addCell(2000)->addText($educationText, null, ['alignment' => 'center']);
            $table->addCell(1000)->addText(optional($staff->gender)->name, null, ['alignment' => 'center']);
            $table->addCell(1000)->addText(optional($staff->ethnic)->name, null, ['alignment' => 'center']);
            $table->addCell(1500)->addText(optional($staff->religion)->name, null, ['alignment' => 'center']);

            // Current and Permanent Address
            $current_address = $staff->current_address_street . '/' . $staff->current_address_ward . '/' . optional($staff->current_address_region)->name . '/' . optional($staff->current_address_district)->name . '/' . optional($staff->current_address_township_or_town)->name;
            $table->addCell(2000)->addText($current_address, null, ['alignment' => 'center']);

            $permanent_address = $staff->permanent_address_street . '/' . $staff->permanent_address_ward . '/' . optional($staff->permanent_address_region)->name . '/' . optional($staff->permanent_address_district)->name . '/' . optional($staff->permanent_address_township_or_town)->name;
            $table->addCell(2000)->addText($permanent_address, null, ['alignment' => 'center']);

            $table->addCell(1000)->addText($staff->children->where('gender_id', 1)->count(), null, ['alignment' => 'center']);
            $table->addCell(1000)->addText($staff->children->where('gender_id', 2)->count(), null, ['alignment' => 'center']);
            $table->addCell(1500)->addText($staff->spouse_name ? 'ရှိ' : 'မရှိ', null, ['alignment' => 'center']);
            $table->addCell(1500)->addText($staff->health_condition, null, ['alignment' => 'center']);
            $table->addCell(1000)->addText(optional($staff->blood_type)->name, null, ['alignment' => 'center']);
            $table->addCell(1000)->addText($staff->height_feet . '/' . $staff->height_inch, null, ['alignment' => 'center']);
            $table->addCell(1000)->addText($staff->habit, null, ['alignment' => 'center']);
            $languages = '';
            foreach ($staff->staff_languages as $lang) {
                $languages .= $lang->language->name . ', ';
            }
            $table->addCell(1500)->addText(rtrim($languages, ', '), null, ['alignment' => 'center']);
        }
        // Save the file
        $fileName = 'report_3.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.reports.report3', [
            'staffs' => $staffs,
        ]);
    }
}
