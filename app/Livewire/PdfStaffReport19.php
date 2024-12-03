<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PdfStaffReport19 extends Component
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
        $pdf = PDF::loadView('pdf_reports.staff_report_19', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_19.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(['orientation' => 'landscape', 'margin' => 600]); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        $section->addTitle('[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]', 2);
        $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']); 
        $section->addText('၁။'.'အမည်: '. str_repeat(' ', 5). $staff->name);
        $section->addText('၂။'.'နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်: '. str_repeat(' ', 5) .$staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);
        $section->addText('၃။'.'လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ: '. str_repeat(' ', 5) . ($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'));
        $section->addText('၄။'.'မွေးဖွားရာအရပ်: '. str_repeat(' ', 5).$staff->place_of_birth );
        $section->addText('၅။'.'အဘအမည်: '. str_repeat(' ', 5).$staff->father_name );
        $section->addText('၆။'.'မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်: '. str_repeat(' ', 5).en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')));
        $section->addText('၇။'.'ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား: '. str_repeat(' ', 5). $staff->prominent_mark );
        $section->addText('၈။'.'လက်ရှိရာထူး: '. str_repeat(' ', 5).$staff->current_rank->name );
        $section->addText('၉။'.'လက်ရှိနေရပ်လိပ်စာ: '. str_repeat(' ', 5).$staff->current_address_street.'/'.$staff->current_address_ward.'/'.$staff->current_address_region->name.'/'.$staff->current_address_township_or_town->name);
        $section->addText('၁၀။'.'အမြဲတမ်းနေရပ်လိပ်စာ: '. str_repeat(' ', 5).$staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_township_or_town->name);
       
        $section->addText('၁၁။' . 'ပညာအရည်အချင်း');

        foreach ($staff->staff_educations as  $education) {
        $section->addText( $education->education->name.'၊');
       }
        $section->addText('၁၂။'.'တတ်မြောက်သည့်အခြားဘာသာစကားနှင့်တတ်ကျွမ်းသည့်အဆင့်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('ဘာသာစကား', ['bold' => true]);
        $table->addCell(2000)->addText('တတ်ကျွမ်းသည့်အဆင့်', ['bold' => true]);
        foreach ($staff->staff_languages as $lang) {
            $table->addRow();
            $table->addCell(2000)->addText($lang->language);
            $table->addCell(2000)->addText($lang->rank);
           
        }
        $section->addText('၁၃။'.'တက်ရောက်ခဲ့သည့်သင်တန်းများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('ကျောင်း/တက္ကသိုလ်/သင်တန်း', ['bold' => true]);
        $table->addCell(2000)->addText('မှ-ထိ', ['bold' => true]);
        foreach ($staff->trainings as $training) {
            $table->addRow();
            $table->addCell(2000)->addText($training->training_type->name);
            $table->addCell(2000)->addText(($training->from_date).'-'.($training->to_date));
           
        }
        $section->addText('၁၄။'.'ထမ်းဆောင်ခဲ့သောတာဝန်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('တာဝန်', ['bold' => true]);
        $table->addCell(2000)->addText('ရုံး/ ဌာန/ အဖွဲ့အစည်း', ['bold' => true]);
        $table->addCell(2000)->addText('နေ့ရက်မှ', ['bold' => true]);
        $table->addCell(2000)->addText('နေ့ရက်ထိ', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
        foreach ($staff->past_occupations as $occupation) {
            $table->addRow();
            $table->addCell(2000)->addText($occupation->rank->name);
            $table->addCell(2000)->addText($occupation->department->name);
            $table->addCell(2000)->addText($occupation->from_date);
            $table->addCell(2000)->addText($occupation->to_date);
            $table->addCell(2000)->addText($occupation->remark);
           
        }
        $section->addText('၁၅။'.'ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့် အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ အမည်နှင့်တာဝန်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အဖွဲ့အစည်း', ['bold' => true]);
        $table->addCell(2000)->addText('တာဝန်', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
        foreach ($staff->past_occupations as $index=> $occupation) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($occupation->department->name);
            $table->addCell(2000)->addText($occupation->remark);
            $table->addCell(2000)->addText($occupation->remark);
           
        }
        $section->addText('၁၆။'.'ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('ဆုတံဆိပ်အမျိုးအစား', ['bold' => true]);
        $table->addCell(2000)->addText('ရက်၊ လ၊ နှစ်', ['bold' => true]);
        foreach ($staff->awardings as $awarding) {
            $table->addRow();
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($awarding->award_type->name .'/'. $awarding->award->name);
            $table->addCell(2000)->addText($awarding->order_date);
        }
       
      
       $section->addText('၁၇။' . 'အပြစ်ပေးခံရခြင်းများ', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(500,['vMerge' => 'restart'])->addText('စဉ်', ['bold' => true]);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('ပြစ်ဒဏ်', ['bold' => true]);
       $table->addCell(2000,['vMerge' => 'restart'])->addText('ပြစ်ဒဏ်ချမှတ်ခံရသည့် အကြောင်းအရာ', ['bold' => true]);
       $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ပြစ်ဒဏ်ချမှတ်သည့်ကာလ');
    $table->addRow();
    $table->addCell(500, ['vMerge' => 'continue']);
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

       $section->addText('၁၈။'.'အခြားတင်ပြလိုသည့်အချက်များ: '. str_repeat(' ', 5));
      
       $section->addText('၁၉။အထက်ဖော်ပြပါ ဝန်ထမ်း၏ ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သတ်၍ မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည်ပြုပါသည်။', ['bold' => true]);
       $section->addText('လက်မှတ်: -', ['align' => 'center']);
       $section->addText('အမည်: ', ['align' => 'center']);
       $section->addText('အဆင့်: ', ['align' => 'center']);
       $section->addText('ရာထူး: ', ['align' => 'center']);
       $section->addText('ရုံး/ဌာန: ', ['align' => 'center']);
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
        return view('livewire.pdf-staff-report19', [
            'staff' => $staff,
        ]);
    }
}


