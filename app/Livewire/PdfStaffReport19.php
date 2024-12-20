<?php

namespace App\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;


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
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
        ]);
        // $section = $phpWord->addSection(); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        // $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း',1);
        $section->addTitle('[နည်းဥပဒေ ၃၅ (ဇ) (၄)၊ ၄၇ (စ) (၄)]',1);
        // $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        // $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']); 

        $header = $section->addHeader();
        $header->addText('လျှို့ဝှက်',null,array('align'=>'center'));
        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်',null,array('align'=>'center', 'spaceBefore' => 200));

        //for table
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_7=array('align' => 'left', 'spaceAfter' => 0, 'spaceBefore' => 0, 'indentation' => ['left' => 100]);
        //for no.1 to no.13
        $pStyle_4=array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5=array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);

        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(1500)->addText('၁။',null, $pStyle_5);
        $table->addCell(13000)->addText('အမည်(ကျား/မ)',null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->name, null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၂။',null,$pStyle_5);
        $table->addCell(13000)->addText('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်', null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name  .en2mm( $staff->nrc_code), null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၃။',null, $pStyle_5);
        $table->addCell(13000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'),null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၄။', null , $pStyle_5);
        $table->addCell(13000)->addText('မွေးဖွားရာအရပ်', null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->place_of_birth, null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၅။',null, $pStyle_5);
        $table->addCell(13000)->addText('အဘအမည်',null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->father_name, null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၆။', null, $pStyle_5);
        $table->addCell(13000)->addText('မွေးဖွားသည့် ရက်၊ လ၊ ခုနှစ်',null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'], $pStyle_5);
        $table->addCell(13000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-Y')),null,$pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၇။',null,$pStyle_5);
        $table->addCell(13000)->addText('ကိုယ်တွင်ထင်ရှားသည့် အမှတ်အသား',null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->prominent_mark,null,$pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၈။',null,$pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိရာထူး',null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->current_rank->name,null,$pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၉။',null, $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိနေရပ်လိပ်စာ',null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_region->name.'၊'.$staff->current_address_township_or_town->name,null, $pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၁၀။',null,$pStyle_5);
        $table->addCell(13000)->addText('အမြဲတမ်းနေရပ်လိပ်စာ',null,$pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'], $pStyle_5);
        $table->addCell(13000)->addText($staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_region->name.'၊'.$staff->permanent_address_township_or_town->name,null,$pStyle_4);

        $table->addRow(50);
        $table->addCell(1500)->addText('၁၁။',null,$pStyle_5);
        $table->addCell(13000)->addText('ပညာအရည်အချင်း',null, $pStyle_4);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText('', ['align' => 'right'],$pStyle_4);

       foreach ($staff->staff_educations as $education) {
            $table->addRow(50);
            $table->addCell(1500);
            $table->addCell(13000);
            $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
            $table->addCell(13000)->addText($education->education->name . '၊', ['align' => 'right'],$pStyle_4);
        }
        
          // $textRun=$table->addCell(8000, ['vMerge' => 'restart'])->addTextRun();
        // $textRun->addText('နောက်ဆုံးသွားရောက်',['bold'=>true]);
        // $textRun->addTextBreak();
        // $textRun->addText('ခဲ့သည့်(၅)နှိင်ငံ',['bold'=>true])

        $table->addRow(50);
        $table->addCell(1500)->addText('၁၂။ ',null,$pStyle_5);
        $textRun=$table->addCell(13000)->addTextRun($pStyle_4);
        $textRun->addText('တတ်မြောက်သည့်အခြားဘာသာ');
        $textRun->addTextBreak();
        $textRun->addText('စကားနှင့်တတ်ကျွမ်းသည့်အဆင့်');
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText('', ['align' => 'right'],$pStyle_4);

       foreach ($staff->staff_languages as $lang) {
            $table->addRow(50);
            $table->addCell(1500);
            $table->addCell(13000);
            $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
            $table->addCell(13000)->addText($lang->language.'၊'.$lang->rank , ['align' => 'right'],$pStyle_4);
        }
        
        $section->addText('၁၃။ '.'တက်ရောက်ခဲ့သည့်သင်တန်းများ', null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader'=>true));
        $table->addCell(6700)->addText('ကျောင်း/တက္ကသိုလ်/သင်တန်း', ['bold' => true], $pStyle_1);
        $table->addCell(2000)->addText('မှ', ['bold' => true],$pStyle_1);
        $table->addCell(2000)->addText('ထိ', ['bold' => true],$pStyle_1);
        if($staff->trainings->isNotEmpty()){
            foreach ($staff->trainings as $training) {
                    $table->addRow(50);
                        $table->addCell(6500)->addText($training->training_type->name,null, $pStyle_7);
                        $table->addCell(2000)->addText(en2mm($training->from_date),null, $pStyle_1);
                        $table->addCell(2000)->addText(en2mm($training->to_date),null, $pStyle_1);
           
            }
        }else{
                $table->addRow(50);
                    $table->addCell(6500)->addText(null,null,$pStyle_1);
                    $table->addCell(2000)->addText(null,null,$pStyle_1);
                    $table->addCell(2000)->addText(null,null,$pStyle_1);

            }

        $section->addText('၁၄။ '.'ထမ်းဆောင်ခဲ့သောတာဝန်များ', null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader'=>true));
        $table->addCell(500)->addText('တာဝန်', ['bold' => true],$pStyle_1);
        $table->addCell(800)->addText('ရုံး/ ဌာန/ အဖွဲ့အစည်း', ['bold' => true],$pStyle_1);
        $table->addCell(1600)->addText('နေ့ရက်မှ', ['bold' => true],$pStyle_1);
        $table->addCell(1600)->addText('နေ့ရက်ထိ', ['bold' => true],$pStyle_1);
        $table->addCell(500)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
        if($staff->past_occupations->isNotEmpty()){
            foreach ($staff->past_occupations as $occupation) {
                $table->addRow(50);
                $table->addCell(500)->addText($occupation->rank->name,null,$pStyle_7);
                $table->addCell(800)->addText($occupation->department->name,null,$pStyle_7);
                $table->addCell(1600)->addText(formatDMYmm($occupation->from_date),null,$pStyle_1);
                $table->addCell(1600)->addText(formatDMYmm($occupation->to_date), null, $pStyle_1);
                $table->addCell(500)->addText($occupation->remark,null, $pStyle_1);
           
            }
        }else{
                $table->addRow(50);
                $table->addCell(1000)->addText(null,null,$pStyle_7);
                $table->addCell(1000)->addText(null,null,$pStyle_7);
                $table->addCell(2000)->addText(null,null,$pStyle_1);
                $table->addCell(2000)->addText(null, null, $pStyle_1);
                $table->addCell(1500)->addText(null,null, $pStyle_1);
        }
        $section->addText('၁၅။ '.'ပါဝင်ဆောင်ရွက်ဆဲနှင့် ဆောင်ရွက်ခဲ့သည် လူမှုရေးနှင့် အစိုးရမဟုတ်သော အဖွဲ့အစည်းများ၏ '.'အမည်နှင့်တာဝန်များ',null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true],$pStyle_1);
        $table->addCell(4800)->addText('အဖွဲ့အစည်း', ['bold' => true],$pStyle_1);
        $table->addCell(2800)->addText('တာဝန်', ['bold' => true],$pStyle_1);
        $table->addCell(1800)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
        if($staff->past_occupations->isNotEmpty()){
            foreach ($staff->past_occupations as $index=> $occupation) {
                $table->addRow();
                $table->addCell(500)->addText(en2mm($index+1),null, $pStyle_1);
                $table->addCell(4800)->addText($occupation->department->name,null,$pStyle_7);
                $table->addCell(2800)->addText($occupation->remark, null, $pStyle_7);
                $table->addCell(1800)->addText($occupation->remark, null, $pStyle_7);
           
            }
        }else{
            $table->addRow();
            $table->addCell(500);
            $table->addCell(4800);
            $table->addCell(2800);
            $table->addCell(1800);
            }

            $section->addText('၁၆။ '.'ချီးမြှင့်ခံရသည့်ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်လက်မှတ်များ',null,array('spaceBefore' => 200));
            $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
            $table->addRow();
            $table->addCell(500)->addText('စဥ်', ['bold' => true],$pStyle_1);
            $table->addCell(4800)->addText('ဆုတံဆိပ်အမျိုးအစား', ['bold' => true],$pStyle_1);
            $table->addCell(2800)->addText('ရက်-လ-နှစ်', ['bold' => true],$pStyle_1);
            $table->addCell(1800)->addText('မှတ်ချက်', ['bold' => true],$pStyle_1);
            if($staff->awardings->isNotEmpty()){
                foreach ($staff->awardings as $awarding) {
                    $table->addRow();
                    $table->addCell(500)->addText(en2mm($index+1),null, $pStyle_1);
                    $table->addCell(4800)->addText($awarding->award_type->name .'/'. $awarding->award->name,null,$pStyle_7);
                    $table->addCell(2800)->addText(formatDMYmm($awarding->order_date), null, $pStyle_7);
                    $table->addCell(1800)->addText( $awarding->remark, null, $pStyle_7);
               
                }
            }else{
                $table->addRow();
                $table->addCell(500);
                $table->addCell(4800);
                $table->addCell(2800);
                $table->addCell(1800);
                }

        
                // $section->addText('', null, ['spaceBefore' => 200]);

        $section->addText('၁၇။', null,['spaceBefore' => 200]);
        $section->addTex( 'အပြစ်ပေးခံရခြင်းများ', null,['spaceBefore' => 200]);

        foreach ($staff->punishments as $punishment) {
            // Create a formatted string for each punishment
                $punishmentText = '-' .   
                $punishment->penalty_type->name . '၊ ' .
                $punishment->reason . '၊ ' .
                $punishment->from_date . ' မှ ' .
                $punishment->to_date;
                $section->addText($punishmentText, null, ['spaceBefore' => 200]);
    }
        
      
    //    $section->addText('၁၇။' . 'အပြစ်ပေးခံရခြင်းများ', ['bold' => true]);
    
      

        $section->addText('၁၈။'.'အခြားတင်ပြလိုသည့်အချက်များ '. str_repeat(' ', 5));
        $section->addText(''); 
        $section->addText(''); 
        $section->addText(''); 

        $section->addText('('.'ဝန်ထမ်း၏ထိုးမြဲလက်မှတ်'.')',null,['alignment' => Jc::END]);
        $textStyle=[
            'alignment' => Jc::BOTH 
        ];
        $section->addText('၁၉။ '.'အထက်ဖော်ပြပါဝန်ထမ်း၏ကိုယ်ရေးမှတ်တမ်းနှင့်ပတ်သတ်၍မှန်ကန်စွာဖြည့်သွင်းရေးသားထားပါကြောင်းစိစစ်အတည်ပြုပါသည်။',null,$textStyle);
        $section->addText(''); 

        $tableStyle = [
            'alignment' => Jc::END // Center the table
        ];
        $table = $section->addTable($tableStyle);
            $table->addRow(50);
            $table->addCell(1000)->addText('လက်မှတ် ',null ,$pStyle_4);
            $table->addCell(300)->addText('၊', null, $pStyle_5);
            $table->addCell(1000);

            $table->addRow(50);
            $table->addCell(1000)->addText('အမည်',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(1000)->addText($staff->name ,null ,$pStyle_4);

            $table->addRow(50);
            $table->addCell(1000)->addText('အဆင့်/ရာထူး',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(1000)->addText($staff->current_rank?->name,null ,$pStyle_4);

            $table->addRow(50);
            $table->addCell(1000)->addText('ရုံး/ဌာန',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(1000)->addText($staff->current_department?->name,null ,$pStyle_4);

        $section->addText('ရက်စွဲ: '. formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center'],array('spaceBefore' => 300));

        $fileName = 'staff_report_19_' . $staff->id . '.docx';
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


