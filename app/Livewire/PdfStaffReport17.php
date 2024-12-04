<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PdfStaffReport17 extends Component
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

        $pdf = PDF::loadView('pdf_reports.staff_report_17', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_17.pdf');
    }


    public function go_word($staff_id)
{
    $staff = Staff::find($staff_id);

    $phpWord = new PhpWord();
    $section = $phpWord->addSection(); 
    $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
    $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
    $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
    $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']); 

    $table = $section->addTable();
$table->addRow();
$table->addCell(5000)->addText('၁။ အမည်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->name);

$table->addRow();
$table->addCell(5000)->addText('၂။ အသက်(မွေးနေ့သက္ကရာဇ်):');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->dob);

$table->addRow();
$table->addCell(5000)->addText('၃။ လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'));

$table->addRow();
$table->addCell(5000)->addText('၄။ အမျိုးသားမှတ်ပုံတင်အမှတ်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);

$table->addRow();
$table->addCell(5000)->addText('၅။ ရာထူး/ ဌာန:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->current_rank->name . '/' . $staff->current_department->name);

$joinDate = \Carbon\Carbon::parse($staff->join_date);
$joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
$table->addRow();
$table->addCell(5000)->addText('၆။ အမှုထမ်းလုပ်သက်၊ ဝင်ရောက်သည့်ရက်စွဲ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText(formatPeriodMM($joinDateDuration->y, $joinDateDuration->m, $joinDateDuration->d) . ', ' . en2mm($joinDate->format('d-m-y')));

$table->addRow();
$table->addCell(5000)->addText('၇။ လက်ရှိနေရပ်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->current_address_street . '/' . $staff->current_address_ward . '/' . $staff->current_address_region->name . '/' .  $staff->current_address_township_or_town->name);
$table->addRow();
$table->addCell(4000)->addText('၈။ ပညာအရည်အချင်း:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText('', ['align' => 'right']);

foreach ($staff->staff_educations as $education) {
    $table->addRow();
    $table->addCell(4000)->addText('', ['align' => 'center']);
    $table->addCell(2000)->addText('-', ['align' => 'center']);
    $table->addCell(5000)->addText($education->education->name . '၊', ['align' => 'right']);
}
$table->addRow();
$table->addCell(5000)->addText('၉။အဘအမည် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->father_name);
$table->addRow();
$table->addCell(5000)->addText('၁၀။အလုပ်အကိုင် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->father_occupation);
$table->addRow();
$table->addCell(5000)->addText('၁၁။အမိအမည် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->mother_name);
$table->addRow();
$table->addCell(5000)->addText('၁၂။အလုပ်အကိုင် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->mother_occupation);
$table->addRow();
$table->addCell(5000)->addText('၁၃။နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်) :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText(en2mm($staff->abroads->count()));
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
    $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ');
    $table->addCell(2000,['vMerge' => 'restart'])->addText('နောက်ဆုံးသွားရောက်ခဲ့သည့်(၅)နှိင်ငံ', ['bold' => true]);
    $table->addCell(2500,['vMerge' => 'restart'])->addText('သွားရောက်သည့်ကိစ္စ', ['bold' => true]);
    $table->addCell(2000,['vMerge' => 'restart'])->addText('Meet With', ['bold' => true]);
    $table->addRow();
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
    $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    $table->addCell(2500, ['vMerge' => 'continue']);
    $table->addCell(2000, ['vMerge' => 'continue']);
    foreach ($staff->abroads as $index => $abroad) {
        $table->addRow();
        $table->addCell(500)->addText($index + 1);
        $table->addCell(1500)->addText($abroad->from_date);
        $table->addCell(1500)->addText($abroad->to_date);
        $table->addCell(2000)->addText($abroad->country->name);
        $table->addCell(2500)->addText($abroad->particular);
        $table->addCell(2000)->addText($abroad->meet_with);
       
    }
     $section->addText('၁၄။'.'ဇနီး/ခင်ပွန်း', ['bold' => true]);
     $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
     $table->addRow();
     $table->addCell(2000)->addText('အမည်(အခြားအမည်များရှိလျှင်လည်း ဖော်ပြရန်)', ['bold' => true]);
     $table->addCell(2000)->addText('လူမျိုး/နိုင်ငံသား', ['bold' => true]);
     $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
     $table->addCell(2000)->addText('အလုပ်အကိုင်နှင့်ဌာန', ['bold' => true]);
     $table->addCell(2000)->addText('နေရပ်', ['bold' => true]);
    //  asdf
     foreach ($staff->spouses as $spouse) {
         $table->addRow();
         $table->addCell(2000)->addText($spouse->name);
         $table->addCell(2000)->addText($spouse->ethnic->name . '/' . $spouse->religion->name);
         $table->addCell(2000)->addText($spouse->place_of_birth);
         $table->addCell(2000)->addText($spouse->occupation);
         $table->addCell(2000)->addText($spouse->address);
     }
     $section->addText('၁၅။'.'နိုင်ငံခြားသွားရောက်မည့်ကိစ္စ', ['bold' => true]);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(500, ['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
    $table->addCell(2000)->addText('သွားရောက်သည့်ကိစ္စ', ['bold' => true]);
    $table->addCell(2000)->addText('စေလွှတ်သည့်နိုင်ငံ', ['bold' => true]);
    $table->addCell(1500)->addText('မှ', ['bold' => true]);
    $table->addCell(1500)->addText('ထိ', ['bold' => true]);
    $table->addCell(2000)->addText('နိုင်ငံခြားသို့သွားရောက်မည့်နေ့', ['bold' => true]);
    $table->addCell(2000)->addText('ထောက်ပံ့သည့်အဖွဲ့အစည်း', ['bold' => true]);
    $table->addCell(2000)->addText('ပြန်ရောက်လျှင်အမှုထမ်းမည့်ဌာန/ရာထူး', ['bold' => true]);

    foreach ($staff->abroads as $index => $abroad) {
        $table->addRow();
        $table->addCell(500)->addText($index + 1);
        $table->addCell(2000)->addText($abroad->particular);
        $table->addCell(2000)->addText($abroad->country->name);
        $table->addCell(1500)->addText($abroad->from_date);
        $table->addCell(1500)->addText($abroad->to_date);
        $table->addCell(2000)->addText($abroad->actual_abroad_date);
        $table->addCell(2000)->addText($abroad->sponser);
        $table->addCell(2000)->addText($abroad->position);
    }
    $section->addText('၁၆။', ['bold' => true]);
    $section->addText('အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => false]);
    $section->addTextBreak(1); 
    $section->addText('လက်မှတ်: ________________', null, ['alignment' => 'center']);
    $section->addText('အမည်: ________________', null, ['alignment' => 'center']);
    $section->addText('ရာထူး: ________________', null, ['alignment' => 'center']);
    $section->addText('ဌာန: ________________', null, ['alignment' => 'center']);
    $section->addText('ရက်စွဲ: '. formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center']);
    $section->addText('၁၇။', ['bold' => true]);
    $section->addText('နိုင်ငံခြားသို့ သွားရောက်မည့်ပုဂ္ဂိုလ်၏လုပ်ရည်ကိုင်ရည်နှင့် အကျင့်စာရိတ္တ ကောင်းမွန်ကြောင်းထပ်ဆင့် လက်မှတ်ရေးထိုးပါသည်။', ['bold' => false]);
    $section->addTextBreak(1); 
    $section->addText('လက်မှတ်: ________________', null, ['alignment' => 'center']);
    $section->addText('အမည်: ________________', null, ['alignment' => 'center']);
    $section->addText('ရာထူး: ________________', null, ['alignment' => 'center']);
    $section->addText('ဌာန: ________________', null, ['alignment' => 'center']);
    $section->addText('ရက်စွဲ: '. formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center']);

    $fileName = 'staff_report_' . $staff->id . '.docx';
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
        return view('livewire.pdf-staff-report17', [
            'staff' => $staff,
        ]);
    }
}
