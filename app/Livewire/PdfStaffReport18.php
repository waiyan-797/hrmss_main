<?php

namespace App\Livewire;

use App\Models\BloodType;
use App\Models\Education;
use App\Models\Ethnic;
use App\Models\Religion;
use App\Models\Spouse;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PdfStaffReport18 extends Component
{
    public $staff_id;
    public function mount($staff_id = 0){
        $this->staff_id = $staff_id;
    }
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
        ];
        $pdf = PDF::loadView('pdf_reports.staff_report_18', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_18.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']); 
        $section->addText('၁။'.'အမည်(ကျား/မ): '. str_repeat(' ', 5). $staff->name);
        $section->addText('၂။'.'ဝန်ထမ်းအမှတ်: '. str_repeat(' ', 5) . $staff->staff_no );
        $section->addText('၃။'.'မွေးနေ့ (ရက်၊ လ၊ နှစ်): '. str_repeat(' ', 5) .en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')) );
        $section->addText('၄။'.'လူမျိုး/ဘာသာ: '. str_repeat(' ', 5) .($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'));
        $section->addText('၅။'.'အဘအမည်: '. str_repeat(' ', 5) .$staff->father_name );
       
        $section->addText('၆။'.'အမိအမည်: '. str_repeat(' ', 5) .$staff->mother_name );
        $section->addText('၇။'.'နိုင်ငံသားစိစစ်ရေးအမှတ်: ' .($staff->nrc_region_id->name . $staff->nrc_township_code->name) .'/'. str_repeat(' ', 5) .($staff->nrc_sign->name .'/'. $staff->nrc_code));
        $section->addText('၈။'.'ဇနီး/ခင်ပွန်းအမည်:'. str_repeat(' ', 5) . $staff?->spouses->first()?->name );

        $section->addText('၉။'.'သား/သမီးအမည်: '. str_repeat(' ', 5).$staff->children->first()?->name );
        $section->addText('၁၀။'.'လိပ်စာ: '. str_repeat(' ', 5). $staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name );

        $section->addText('၁၁။'.'ပညာအရည်အချင်း', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(1000)->addText('စဉ်', ['bold' => true]);
        $table->addCell(2000)->addText('Education Group', ['bold' => true]);
        $table->addCell(2000)->addText('Education Type', ['bold' => true]);
        $table->addCell(2000)->addText('Education', ['bold' => true]);
        foreach ($staff->staff_educations as $index=> $education) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($education->education_group->name);
            $table->addCell(2000)->addText($education->education_type->name);
            $table->addCell(2000)->addText($education->education->name);
        }
        $section->addText('၁၂။'.'လက်ရှိရာထူး/လစာနှုန်း/ဌာန: '. $staff->father_name);
        $section->addText('၁၃။'.'သွေးအုပ်စု: '. $staff->father_occupation);

      
       $section->addText('၁၄။' . 'နိုင်ငံ့ဝန်ထမ်းတာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (စစ်ဘက်/နယ်ဘက်)', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(500,['vMerge' => 'restart'])->addText('ရာထူး/ဌာန', ['bold' => true]);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('တာ၀န်ထမ်းဆောင်သည့်ကာလ');
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နေရာ/ဒေသ', ['bold' => true]);
       $table->addRow();
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
       $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       foreach ($staff->past_occupations as $occupation) {
           $table->addRow();
           $table->addCell(500)->addText($index + 1);
           $table->addCell(1500)->addText($occupation->rank->name);
           $table->addCell(1500)->addText($occupation->from_date);
           $table->addCell(2000)->addText($occupation->to_date);
           $table->addCell(2500)->addText($occupation->address);
       }
       $section->addText('၁၅။' . 'ပြည်တွင်းသင်တန်းများ တက်ရောက်မှု', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(500,['vMerge' => 'restart'])->addText('သင်တန်းအမည်', ['bold' => true]);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('တက်ရောက်သည့်ကာလ');
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နေရာ/ဒေသ', ['bold' => true]);
       $table->addRow();
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
       $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       foreach ($staff->trainings->where('training_location_id', 1) as $training) {
           $table->addRow();
           $table->addCell(500)->addText($index + 1);
           $table->addCell(1500)->addText($training->training_type->name);
           $table->addCell(1500)->addText($training->from_date);
           $table->addCell(2000)->addText($training->to_date);
           $table->addCell(2500)->addText($training->location);
       }
       $section->addText('၁၆။' . 'ပြည်ပသင်တန်းများ တက်ရောက်မှု', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(500,['vMerge' => 'restart'])->addText('သင်တန်းအမည်', ['bold' => true]);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('တက်ရောက်သည့်ကာလ');
       $table->addCell(2000,['vMerge' => 'restart'])->addText('နေရာ/ဒေသ', ['bold' => true]);
       $table->addRow();
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
       $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       foreach ($staff->trainings->where('training_location_id', 2) as  $training) {
           $table->addRow();
           $table->addCell(500)->addText($index + 1);
           $table->addCell(1500)->addText($training->training_type->name);
           $table->addCell(1500)->addText($training->from_date);
           $table->addCell(2000)->addText($training->to_date);
           $table->addCell(2500)->addText($training->location);
       }
       $section->addText('၁၇။' . 'ပြစ်မှုမှတ်တမ်း', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(500,['vMerge' => 'restart'])->addText('ပြစ်ဒဏ်', ['bold' => true]);
       $table->addCell(500,['vMerge' => 'restart'])->addText('ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရာ', ['bold' => true]);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပြစ်ဒဏ်ချမှတ်သည့်ကာလ');
      
       $table->addRow();
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000, ['vMerge' => 'continue']);
       $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
       $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
       
       foreach ($staff->punishments as $punishment) {
           $table->addRow();
           $table->addCell(500)->addText($index + 1);
           $table->addCell(1500)->addText($punishment->penalty_type->name);
           $table->addCell(1500)->addText($punishment->reason);
           $table->addCell(2000)->addText($punishment->from_date);
           $table->addCell(2500)->addText($punishment->to_date);
       }
       $section->addText('၁၈။'.'ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်များ', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(2000)->addText('စဉ်', ['bold' => true]);
       $table->addCell(2000)->addText('ဘွဲ့ထူး၊ ဂုဏ်ထူးတံဆိပ်အမည်', ['bold' => true]);
       $table->addCell(2000)->addText('အမိန့်အမှတ်/ခုနှစ်', ['bold' => true]);
       
       foreach ($staff->awardings as $awarding) {
           $table->addRow();
           $table->addCell(2000)->addText($index+1);
           $table->addCell(2000)->addText($awarding->award_type->name .'/'. $awarding->award->name);
           $table->addCell(2000)->addText($awarding->order_no.'/'.$awarding->order_date);
       }
     
       $section->addText('အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true]);
       $section->addText('လက်မှတ်: -', ['align' => 'center']);
       $section->addText('အမည်: ', ['align' => 'center']);
       $section->addText('ရာထူး: ', ['align' => 'center']);
       $section->addText('ဖုန်းနံပါတ်(ရုံး/လက်ကိုင်ဖုန်း): ', ['align' => 'center']);
       $section->addText('အီး‌မေးလ်: ', ['align' => 'center']);
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
        return view('livewire.pdf-staff-report18',[
            'staff' => $staff,
        ]);
    }
}


