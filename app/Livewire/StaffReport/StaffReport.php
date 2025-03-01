<?php

namespace App\Livewire\StaffReport;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\PhpWord;

class StaffReport extends Component
{
    public function go_pdf(){
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf.pdf');
    } //staff_report need pdf blade

    public function go_word()
    {
        $staffs = Staff::get();

        // Create a new PHPWord object
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation'=>'landscape','margin'=>600]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);

        // Add title
        $section->addTitle('ရင်းနှီးမြှပ်နှံမှုနှင့် နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့် ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true]);

        // Add table
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);

        // Table header
        $table->addRow();
        $table->addCell(2000)->addText('စဥ်');
        $table->addCell(2000)->addText('အမည်');
        $table->addCell(2000)->addText('ရာထူး');
        $table->addCell(2000)->addText('နိုင်ငံသားစိစစ်ရေးအမှတ်');
        $table->addCell(2000)->addText('ဌာနခွဲ');
        $table->addCell(2000)->addText('မွေးသက္ကရာဇ်');
        $table->addCell(2000)->addText('အလုပ်စတင်ဝင်ရောက်သည့်ရက်စွဲ');
        $table->addCell(2000)->addText('တစ်ဆင့်နိမ့်ရာထူးရရက်စွဲ ရက်၊လ၊နှစ်');
        $table->addCell(2000)->addText('လက်ရှိရာထူးရရက်စွဲ ရက်၊လ၊နှစ်');
        $table->addCell(2000)->addText('ပညာအရည်အချင်း');

        // Table rows
        foreach ($staffs as $index=> $staff) {
            $table->addRow();
            $table->addCell(2000)->addText($index + 1);
            $table->addCell(2000)->addText($staff->name);
            $table->addCell(2000)->addText($staff->current_rank->name);
            $table->addCell(2000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
            $table->addCell(2000)->addText($staff->side_department->name);
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->join_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->postings->sortByDesc('from_date')->first()?->from_date)->format('d-m-y')));
            $table->addCell(2000)->addText(en2mm(\Carbon\Carbon::parse($staff->current_rank_date)->format('d-m-y')));

            // Add education details
            $educationText = '';
            foreach ($staff->staff_educations as $edu) {
                $educationText .= $edu->education_group->name . ' - ' . $edu->education_type->name . ', ' . $edu->education->name . "\n";
            }
            $table->addCell(2000)->addText($educationText);
        }

        // Save the document
        $filePath = storage_path('app/public/staff_report.docx');
        $phpWord->save($filePath, 'Word2007');

        // Return the response for download
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $staffs = Staff::get();
        return view('livewire.staff-report.staff-report', [
            'staffs' => $staffs,
        ]);
    }

}
