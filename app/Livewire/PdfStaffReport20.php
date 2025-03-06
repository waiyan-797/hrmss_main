<?php

namespace App\Livewire;

use App\Models\Staff;
use Carbon\Carbon;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\IOFactory as PhpWordIOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
class PdfStaffReport20 extends Component
{
    public $staff_id;
    public $filterRange; 
    public $startDate;
    public $endDate;

    public function mount($staff_id)
    {
        $this->staff_id = $staff_id;
        $this->startDate = Carbon::today()->toDateString(); // Default to today
        $this->endDate = Carbon::today()->toDateString();
    }

    public function updatedFilterRange($value)
    {
        if ($value) {
            [$this->startDate, $this->endDate] = explode(' - ', $value);
        }
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $phpWord->addFontStyle('pyidaungsu Numbers Font', ['name' => 'Pyidaungsu Numbers', 'size' => 13]);
        $section = $phpWord->addSection([
            'orientation' => 'portrait',
            'marginLeft' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1), // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
            'marginBottom' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5), // 0.5 inch
        ]);

        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_7=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 350);
        $pStyle_4=array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5=array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);
        $pStyle_8=array('align' => 'left', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $header_page_1 = $section->addHeader();
        $header_page_1->firstPage();
        $header_page_1->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0, 
            'spaceAfter' => 0, 
            'lineHeight' => 1, 
        ]);
        $header_subseq = $section->addHeader();
        $header_subseq->addText('လျှို့ဝှက်', null, [
            'align' => 'center',
            'spaceBefore' => 0,
            'spaceAfter' => 0,
            'lineHeight' => 1,
        ]);

        $header_subseq->addPreserveText('{PAGE}', ['name' => 'Pyidaungsu Numbers', 'size' => 13], ['alignment' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0]);
        $footerFirstPage = $section->addFooter();
        $footerFirstPage->firstPage();
        $footerFirstPage->addText('လျှို့ဝှက်', null, ['alignment' => 'center', 'spaceBefore' => 200]);
        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်', null, ['align' => 'center', 'spaceBefore' => 200]);
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $phpWord->addTitleStyle(2, [ 'size' => 13], ['alignment' => 'left']);
        $section->addTitle('ရင်နှီးမြှုပ်နှံ့မှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', 1);
        $section->addTitle('ရင်နှီးမြှုပ်နှံ့မှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', 1);
        $section->addTitle('ဒုတိယညွှန်ကြားရေးမှူး အဆင့်အတွက် အကဲဖြတ်မှတ်တမ်း', 1);
        $section->addTitle(formatDMYmm($this->startDate) . 'နေ့မှစ၍ ' . formatDMYmm($this->endDate) . 'နေ့အထိ ' . $staff->name . ' ၏ အကဲဖြတ်မှတ်တမ်း', 1);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50);
        $table->addCell(700)->addText('၁။',null,$pStyle_2);
        $table->addCell(8700, ['gridSpan' => 3, 'valign' => 'center'])->addText('ကိုယ်ရေးအချက်အလက်', ['bold'=>true],$pStyle_1);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(က)',null,$pStyle_1);
        $table->addCell(4000)->addText('အမည်',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->name,null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ခ)', null,$pStyle_1);
        $table->addCell(4000)->addText('လူမျိုးနှင့်ကိုးကွယ်သည့်ဘာသာ',null,$pStyle_3);
        $table->addCell(4000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : ''),null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဂ)', null,$pStyle_1);
        $table->addCell(4000)->addText('မွေးဖွားရာဇာတိ',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->place_of_birth,null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဃ)', null,$pStyle_1);
        $table->addCell(4000)->addText('အဘအမည်',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->father_name,null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(င)', null,$pStyle_1);
        $table->addCell(4000)->addText('အသက်(မွေးသက္ကရာဇ်)',null,$pStyle_3);
        $table->addCell(4000)->addText(formatDMYmm($staff->dob),null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(စ)', null,$pStyle_1);
        $table->addCell(4000)->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်',null,$pStyle_3);
        $table->addCell(4000)->addText(collect([$staff->ethnic_id ? $staff->ethnic->name : '-', $staff->religion_id ? $staff->religion->name : '-'])->filter()->implode('၊'),null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဆ)', null,$pStyle_1);
        $table->addCell(4000)->addText('ထင်ရှားသည့်အမှတ်အသား	',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->prominent_mark,null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဇ)', null,$pStyle_1);
        $table->addCell(4000)->addText('လက်ရှိရာထူး',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->current_rank?->name,null,$pStyle_3);
        $current_rank_date = \Carbon\Carbon::parse($staff->current_rank_date);
        $diff = $current_rank_date->diff(\Carbon\Carbon::now());
        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဈ)', null,$pStyle_1);
        $table->addCell(4000)->addText('လက်ရှိရာထူးရရှိသည့်နေ့နှင့်ရာထူးသက်',null,$pStyle_3);
        $table->addCell(4000)->addText(formatDMYmm($staff->current_rank_date)."\n".en2mm($age),null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ည)', null,$pStyle_1);
        $table->addCell(4000)->addText('လက်ရှိအလုပ်အကိုင်ရလာပုံ',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->is_direct_appointed,null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဋ)', null,$pStyle_1);
        $table->addCell(4000)->addText('ပြိုင်အရွေးခံ(သို့)တိုက်ရိုက်ခန့်	',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->is_direct_appointed,null,$pStyle_3);
        $join_date = \Carbon\Carbon::parse($staff->join_date);
        $diff = $join_date->diff(\Carbon\Carbon::now());
        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဌ)', null,$pStyle_1);
        $table->addCell(4000)->addText('စတင်တာဝန်ထမ်းဆောင်သည့်နေ့နှင့် စုစုပေါင်း အမှုထမ်းလုပ်သက်',null,$pStyle_3);
        $table->addCell(4000)->addText(formatDMYmm($staff->join_date)."\n".en2mm($age),null,$pStyle_3);
        $military_gazetted_date = \Carbon\Carbon::parse($staff->military_gazetted_date);
        $diff = $military_gazetted_date->diff(\Carbon\Carbon::now());
        $age =  $diff->y . ' နှစ် '  . $diff->m . ' လ';
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဍ)', null,$pStyle_1);
        $table->addCell(4000)->addText('ပြန်တမ်းဝင်အရာရှိလုပ်သက်',null,$pStyle_3);
        $table->addCell(4000)->addText(formatDMYmm($staff->military_gazetted_date)."\n".en2mm($age),null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဎ)', null,$pStyle_1);
        $table->addCell(4000)->addText('ဌာန/ဌာနခွဲ/ဌာနစိတ်',null,$pStyle_3);
        $table->addCell(4000)->addText(($staff->current_department->name)."\n".($staff->current_division->name),null,$pStyle_3);
        $section->addPageBreak();
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50);
        $table->addCell(700)->addText('၂။',null,$pStyle_2);
        $table->addCell(8700, ['gridSpan' => 3, 'valign' => 'center'])->addText('ပညာဆည်းပူးသင်ယူလေ့လာခဲ့မှုအခြေအနေ', ['bold'=>true],$pStyle_1);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(က)',null,$pStyle_1);
        $table->addCell(4000)->addText('မူလတန်းမှ အလယ်တန်း',null,$pStyle_3);
        $table->addCell(4000)->addText('',null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ခ)', null,$pStyle_1);
        $table->addCell(4000)->addText('အလယ်တန်း',null,$pStyle_3);
        $table->addCell(4000)->addText('',null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဂ)', null,$pStyle_1);
        $table->addCell(4000)->addText('အထက်တန်း',null,$pStyle_3);
        $table->addCell(4000)->addText('',null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဃ)', null,$pStyle_1);
        $table->addCell(4000)->addText('တက္ကသိုလ်/ကောလိပ်',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->schools->map(fn($school) => $school->school_name)->join(', '),null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(င)', null,$pStyle_1);
        $table->addCell(4000)->addText('နောက်ဆက်တွဲဒီပလိုမာ/ဘွဲ့များ',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->last_school_subject,null,$pStyle_3);
        
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(စ)', null,$pStyle_1);
        $table->addCell(4000)->addText('အခြားဆည်းပူးခဲ့သော ဘာသာရပ်များ။*ပြည်တွင်း/ပြည်ပ**',null,$pStyle_3);
        $table->addCell(4000)->addText('',null,$pStyle_3);
    
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဆ)', null,$pStyle_1);
        $table->addCell(4000)->addText('ဌာနဆိုင်ရာစာမေးပွဲများ/သင်တန်းများ။',null,$pStyle_3);
        $table->addCell(4000)->addText('',null,$pStyle_3);
        $table->addRow(50);
        $table->addCell(700);
        $table->addCell(700)->addText('(ဇ)', null,$pStyle_1);
        $table->addCell(4000)->addText('ဝါသနာထုံမှု',null,$pStyle_3);
        $table->addCell(4000)->addText($staff->habit,null,$pStyle_3);
        $section->addTextBreak();
        $section->addTitle('*ဘာသာရပ်ဆိုင်ရာ၌ တက္ကသိုလ်ဘာသာရပ်များကို ဆိုလိုသည်',2);
        $section->addTitle('မသက်ဆိုင်သော စကားလုံးကိုဖျက်ပါ။',2);
        
        $section->addText('၃။ ' . ' အကဲဖြတ်အကဲဖြတ်၍ အမှတ်ပေးရမည့် အချက်များ',null, array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50);
        $table->addCell(1500, ['vMerge' => 'restart'])->addText('အမှတ်စဥ်', ['bold' => true],$pStyle_2);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('အကြောင်းအရာ', ['bold' => true], $pStyle_2);
        $table->addCell(6000, ['gridSpan' => 3, 'valign' => 'center'])->addText('အကဲဖြတ် အမှတ်(အမှတ်ပြည့် ၂၀မှတ်စီ)', ['bold'=>true],$pStyle_1);
        $table->addRow(50);
        $table->addCell(1500, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('ကနဦး', ['bold'=>true],$pStyle_1);
        $table->addCell(2000)->addText('ထပ်ဆင့်', ['bold' => true],$pStyle_1);
        $table->addCell(2000)->addText('ထပ်ဆင့်', ['bold' => true],$pStyle_1);
        $table->addRow(50);
        $table->addCell(1000)->addText('၁',null,$pStyle_6);
        $table->addCell(4000)->addText('ခေါင်းဆောင်မှုပေးနိုင်ခြင်း	',null,$pStyle_3);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addRow(50);
        $table->addCell(1000)->addText('၂',null,$pStyle_6);
        $table->addCell(4000)->addText('ယုံကြည်စိတ်ချရခြင်း',null,$pStyle_3);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addRow(50);
        $table->addCell(1000)->addText('၃',null,$pStyle_6);
        $table->addCell(4000)->addText('လုပ်ငန်းကျွမ်းကျင်မှုရှိခြင်း',null,$pStyle_3);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addRow(50);
        $table->addCell(1000)->addText('၄',null,$pStyle_6);
        $table->addCell(4000)->addText('တာဝန်ကိုလိုလားစွာထမ်းဆောင်ခြင်း',null,$pStyle_3);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addRow(50);
        $table->addCell(1000)->addText('၅',null,$pStyle_6);
        $table->addCell(4000)->addText('ဆက်ဆံရေးပြေပြစ်ခြင်း',null,$pStyle_3);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addRow(50);
        $table->addCell(1000)->addText('',null,$pStyle_6);
        $table->addCell(4000)->addText('အမှတ်ပေါင်း',null,$pStyle_3);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $table->addCell(2000)->addText('',null, $pStyle_6);
        $section->addTextBreak();
        $section->addTitle('(နိုင်ငံဝန်ထမ်း နည်းဉပဒေ ၄၇)',2);
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(8000)->addText('ကနဦးမှတ်တမ်းရေးသူ၏', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('လက်မှတ်', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('အမည်', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ရာထူး', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ဌာန', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('နေ့စွဲ', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);

        $section->addTitle('ထပ်ဆင့်မှတ်တမ်းရေးသူ',2);
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(8000)->addText('(ဝန်ထမ်း အဖွဲ့အစည်းအကြီးအမှူး)၏', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('လက်မှတ်', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('အမည်', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ရာထူး', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ဌာန', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('နေ့စွဲ', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        
        $section->addTitle('ထပ်ဆင့်မှတ်တမ်းရေးသူ',2);
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(8000)->addText('(ဝန်ကြီးဌာနနှင့်အဖွဲ့အစည်းကြီးအမှူး)၏ အမည်', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('လက်မှတ်', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('အမည်', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ရာထူး', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ဌာန', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('နေ့စွဲ', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
         
        $section->addTitle('ထပ်ဆင့်မှတ်တမ်းရေးသူ',2);
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(8000)->addText('(ဝန်ကြီးဌာနနှင့်အဖွဲ့အစည်းကြီးအမှူး)၏အမည်', null, $pStyle_7);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ရာထူး', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('ဌာန', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(8000)->addText('', null, $pStyle_7);
        $table->addCell(1000)->addText('',null ,$pStyle_8);
        $table->addCell(8000)->addText('နေ့စွဲ', null, $pStyle_7);
        $table->addCell(5000)->addText('' ,null ,$pStyle_8);
        $section->addTitle('[နိုင်ငံဝန်ထမ်းနည်းဉပဒေများ၊ နည်းဉဒေ ၄၆၊ နည်းဉပဒေခွဲ(ဂ)(ဃ)(င)]', 1);
        $section->addText('၄။ ' . ' အကဲဖြတ် အမှတ်ပေးခြင်းနှင့် စပ်လျဉ်း၍ အကျိုးအကြောင်း ဖော်ပြချက်',null, array('spaceBefore'=> 200));

        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('အကဲဖြတ်ခံရသူအမည်',null ,$pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('ရာထူး',null ,$pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);

        $section->addText('အကဲဖြတ်မှတ်တမ်းရေးသူ၏ စိစစ်အကဲဖြတ်ခြင်းအတွက်ကျိုးကြောင်းဖော်ပြချက်(အချက်တစ် ချက်ချင်းစီ အတွက် သာမန်အောက် ၇ မှတ်နှင့်အောက် သို့မဟုတ် ထူးချွန်အဆင့်အတွက် ၁၆ မှတ်နှင့် အထက်ဖြစ်ပါက အကဲဖြတ်သူက ကျိုးကြောင်းဖော်ပြချက် ရေးသားရန်ဖြစ်ပါသည်။)', null, array('spaceBefore' => 200, 'alignment' => Jc::BOTH));
        $section->addTitle('[နိုင်ငံဝန်ထမ်းနည်းဉပဒေများ၊ နည်းဉဒေ ၄၇၊ နည်းဉပဒေခွဲ(စ)(၃)]', 1);
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(1300)->addText('(၁)', null, $pStyle_5);
        $table->addCell(13000)->addText('ခေါင်း‌ဆောင်မှုပေးနိုင်ခြင်း',null ,$pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('(၂)', null, $pStyle_5);
        $table->addCell(13000)->addText('ယုံကြည်စိတ်ချရခြင်း',null ,$pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('(၃)', null, $pStyle_5);
        $table->addCell(13000)->addText('လုပ်ငန်းကျွမ်းကျင်မှုရှိခြင်း',null ,$pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('(၄)', null, $pStyle_5);
        $table->addCell(13000)->addText('တာဝန်ကို လိုလားစွာ ထမ်းဆောင်ခြင်း',null ,
        $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('(၅)', null, $pStyle_5);
        $table->addCell(13000)->addText('ဆက်ဆံရေးပြေပြစ်ခြင်း',null ,
        $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('' ,null ,$pStyle_8);

        $tableStyle = [
            'alignment' => Jc::END 
        ];
        $table = $section->addTable($tableStyle);
            $table->addRow(50);
            $table->addCell(2100)->addText('အကဲဖြတ်သူလက်မှတ် ',null ,$pStyle_8);
            $table->addCell(300)->addText('', null, $pStyle_5);
            $table->addCell(2100);
            $table->addRow(50);
            $table->addCell(2100)->addText('အမည်',null ,$pStyle_4);
            $table->addCell(300)->addText('-',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->name,null ,$pStyle_4);
    
            $table->addRow(50);
            $table->addCell(2100)->addText('ရာထူး',null ,$pStyle_4);
            $table->addCell(300)->addText('',  null, $pStyle_5);
            $table->addCell(2100)->addText('',null ,$pStyle_4);
            $table->addRow(50);
            $table->addCell(2100)->addText('ဌာန',null ,$pStyle_4);
            $table->addCell(300)->addText('-',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->current_department->name,null ,$pStyle_4);
        $section->addText('ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);
        $fileName = 'staff_report_19_1_' . $staff->id . '.docx';
        $objWriter = PhpWordIOFactory::createWriter($phpWord, 'Word2007');
        return response()->stream(
            function () use ($objWriter) {
                $objWriter->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ],
        );
    }

    public function render()
    {
        $staff = Staff::where('id', $this->staff_id)->first();
        return view('livewire.pdf-staff-report20', [
            'staff' => $staff,
        ]);
    }

}
