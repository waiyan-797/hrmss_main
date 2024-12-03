<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PdfStaffReport15 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0)
    {
        $this->staff_id = $staff_id;
    }
    public function go_pdf($staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_15', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_15.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        

        $section->addText('၁။'.'အမည်: '. str_repeat(' ', 20).'-'. $staff->name);
        $section->addText('၂။'.'အသက်(မွေးနေ့သက္ကရာဇ်): '. str_repeat('', 20) .'-'. $staff->dob);
        $section->addText('၃။'.'လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ: '. str_repeat(' ', 20) . '-'.($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'));
        $section->addText('၄။'.'အမျိုးသားမှတ်ပုံတင်အမှတ်: '. str_repeat(' ', 5) . $staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
        $section->addText('၅။'.'အလုပ်အကိုင်နှင့် ဌာန: '. str_repeat(' ', 5) . $staff->current_rank->name . '/' . $staff->current_department->name);
        $joinDate = \Carbon\Carbon::parse($staff->join_date);
        $joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
        $section->addText('၆။'.'အမှုထမ်းလုပ်သက်၊ ဝင်ရောက်သည့်ရက်စွဲ: ' . formatPeriodMM($joinDateDuration->y, $joinDateDuration->m, $joinDateDuration->d) . ', ' . en2mm($joinDate->format('d-m-y')));
        $section->addText('၇။'.'လက်ရှိနေရပ်: ' . $staff->current_address_street . '/' . $staff->current_address_ward . '/' . $staff->current_address_region->name . '/' .  $staff->current_address_township_or_town->name);
        $section->addText('၈။' . 'ပညာအရည်အချင်း');

        foreach ($staff->staff_educations as $education) {
        $section->addText( $education->education->name.'၊');
       }

    
        $section->addText('၉။'.'အဘအမည်: '. $staff->father_name);
        $section->addText('၁၀။'.'အလုပ်အကိုင်
    : '. $staff->father_occupation);
        $section->addText('၁၁။'.'အမိအမည်'.$staff->mother_name);
        $section->addText('၁၂။'.'အလုပ်အကိုင်:'.$staff->mother_occupation);
       $section->addText('၁၃။' . 'နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ');
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နှိင်ငံ', ['bold' => true]);
       $table->addCell(2500,['vMerge' => 'restart'])->addText('သွားရောက်သည့်ကိစ္စ', ['bold' => true]);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('သင်တန်းတက်ခြင်းဖြစ်လျှင် အကြိမ်မည်မျှဖြင့်အောင်မြင်သည်', ['bold' => true]);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('မည်သည့်အစိုးရအဖွဲ့အစည်းအထောက်အပံ့ဖြင့်သွားရောက်သည်
', ['bold' => true]);
    $table->addRow();
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
    $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2500, ['vMerge' => 'continue']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2000, ['vMerge' => 'continue']);
       foreach ($staff->abroads as $index => $abroad) {
           $table->addRow();
           $table->addCell(500)->addText($index + 1);
           $table->addCell(1500)->addText($abroad->from_date);
           $table->addCell(1500)->addText($abroad->to_date);
           $table->addCell(2000)->addText($abroad->country->name);
           $table->addCell(2500)->addText($abroad->particular);
           $table->addCell(2000)->addText($abroad->training_success_count);
           $table->addCell(2000)->addText($abroad->sponser);
       }
       $section->addText('၁၄။'.'ဇနီး/ခင်ပွန်း', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(2000)->addText('အမည်', ['bold' => true]);
       $table->addCell(2000)->addText('လူမျိုး/နိုင်ငံသား', ['bold' => true]);
       $table->addCell(2000)->addText('အလုပ်အကိုင်နှင့်ဌာန', ['bold' => true]);
       $table->addCell(2000)->addText('နေရပ်', ['bold' => true]);
       
       foreach ($staff->spouses as $spouse) {
           $table->addRow();
           $table->addCell(2000)->addText($spouse->name);
           $table->addCell(2000)->addText($spouse->ethnic->name . '/' . $spouse->religion->name);
           $table->addCell(2000)->addText($spouse->occupation);
           $table->addCell(2000)->addText($spouse->address);
       }
       $section->addText('၁၅။ အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true]);
       $section->addText('လက်မှတ်: -', ['align' => 'center']);
       $section->addText('အမည်: ', ['align' => 'center']);
       $section->addText('အဆင့်: ', ['align' => 'center']);
       $section->addText('တပ်/ဌာန: ', ['align' => 'center']);
       $section->addText('ရက်စွဲ: '. formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center']);
        $fileName = 'staff_report_15_' . $staff->id . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    
        return response()->stream(function() use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report15', [
            'staff' => $staff,
        ]);
    }
}

