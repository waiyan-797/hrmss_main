<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\TextAlignment;
use PhpOffice\PhpWord\SimpleType\VerticalAlign;
use PhpOffice\PhpWord\SimpleType\VerticalJc;
use PhpOffice\PhpWord\SimpleType\Jc;


class PdfStaffReport53 extends Component
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
        $pdf = PDF::loadView('pdf_reports.staff_report_53', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_53.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'headerHeight' => 350,
            'orientation' => 'portrait',
            'marginLeft'  => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(1),     // 1 inch
            'marginRight' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginTop'   => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 inch
            'marginBottom'=> \PhpOffice\PhpWord\Shared\Converter::inchToTwip(0.5),   // 0.5 8
        ]);
        //for table
        $pStyle_1=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 0);
        $pStyle_2=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 200);
        $pStyle_3=array('align' => 'left', 'spaceAfter' => 30, 'spaceBefore' => 70, 'indentation' => ['left' => 100]);
        $pStyle_6=array('align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 70);
        $pStyle_7=array('align' => 'center', 'spaceAfter' => 0, 'spaceBefore' => 350);
        //for no.1 to no.13
        $pStyle_4=array('align' => 'both', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_5=array('align' => 'center', 'spaceAfter' => 15, 'spaceBefore' => 20);
        $pStyle_8=array('align' => 'left', 'spaceAfter' => 10, 'spaceBefore' => 20, 'indentation' => ['left' => 100]);
        $pStyle_9=array('align' => 'left', 'spaceAfter' => 10, 'spaceBefore' => 10);


       
    $textBoxStyle = [
        'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        'borderSize' => 0,    
        'positioning' => 'relative', // Relative positioning
        'posHorizontal' => 'right', // Align next to inline content
        'posHorizontalRel' => 'margin', // Relative to margin (inline context)
        'marginLeft' => 0, // Small spacing from the left
        
    ];
    $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : null;
        if ($imagePath && file_exists($imagePath)) {
            $textBox = $section->addTextBox($textBoxStyle);
            $textBox->addImage($imagePath, ['width' => 62, 'height' => 69, 'align' => 'right']);
        } else {
        $defaultImagePath = public_path('img/user.png');
        $textBox = $section->addTextBox($textBoxStyle);

        $textBox->addImage($defaultImagePath, ['width' =>62, 'height' => 65, 'align' => 'center', 'padding'=>0 ]);
       }
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

       $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
       $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
       $phpWord->addTitleStyle(3, ['bold' => true, 'size' => 13], ['alignment' => 'center']);

       $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
    
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(1300)->addText('၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('အမည်',null ,$pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->name ,null ,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂။', null, $pStyle_5);
        $table->addCell(13000)->addText('ငယ်အမည်',null ,$pStyle_8);
        $table->addCell(700)->addText('-', ['align' => 'center'],$pStyle_5);
        $table->addCell(13000)->addText($staff->nick_name ? $staff->nick_name :'မရှိပါ', ['align' => 'right'] ,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၃။', null, $pStyle_5);
        $table->addCell(13000)->addText('အခြားအမည် ', null, $pStyle_8);
        $table->addCell(700)->addText('-', ['align' => 'center'],  $pStyle_5);
        $table->addCell(13000)->addText($staff->other_name ? $staff->other_name :'မရှိပါ ', ['align' => 'right'],  $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၄။', null, $pStyle_5);
        $table->addCell(13000)->addText('အသက်(မွေးသက္ကရာဇ်)', null, $pStyle_8);
        $table->addCell(700)->addText('-', ['align' => 'center'],  $pStyle_5);
        $dob = \Carbon\Carbon::parse($staff->dob);
        $diff = $dob->diff(\Carbon\Carbon::now());
        $age = $diff->y . ' နှစ်၊ ' . $diff->m . ' လ';
        $table->addCell(13000)->addText(
            en2mm($age) . '('.formatDMYmm($dob->format('d-m-Y')) .' )'  ,
            null,$pStyle_8 
        );

        $table->addRow(50);
        $table->addCell(1300)->addText('၅။', null, $pStyle_5);
        $table->addCell(13000)->addText('လူမျိုးနှင့် ကိုးကွယ်သည့်ဘာသာ', null, $pStyle_8);
        $table->addCell(700)->addText('-',  null, $pStyle_5);
        $table->addCell(13000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-'), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၆။', null, $pStyle_5);
        $table->addCell(13000)->addText('အရပ်အမြင့်', null, $pStyle_8);
        $table->addCell(700)->addText('-',  null, $pStyle_5);
        // $table->addCell(13000)->addText('('.en2mm($staff->height_feet) . ')ပေ' . '('.en2mm($staff->height_inch) . ')လက်မ', null, $pStyle_8);
        $table->addCell(13000)->addText(
            '(' . en2mm($staff->height_feet) . ')ပေ' . 
            (!empty($staff->height_inch) ? ' (' . en2mm($staff->height_inch) . ')လက်မ' : ''),null,$pStyle_8
        );

        $table->addRow(50);
        $table->addCell(1300)->addText('၇။', null, $pStyle_5);
        $table->addCell(13000)->addText('ဆံပင်အရောင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->hair_color, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၈။', null, $pStyle_5);
        $table->addCell(13000)->addText('မျက်စိအရောင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->eye_color, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၉။', null, $pStyle_5);
        $table->addCell(13000)->addText('ထင်ရှားသည့် အမှတ်အသား', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->prominent_mark, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၀။', null, $pStyle_5);
        $table->addCell(13000)->addText('အသားအရောင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->skin_color, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('ကိုယ်အလေးချိန်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(en2mm($staff->weight), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၂။', null, $pStyle_5);
        $table->addCell(13000)->addText('မွေးဖွားရာဇာတိ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->place_of_birth, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၃။', null, $pStyle_5);
        $table->addCell(13000)->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၄။', null, $pStyle_5);
        $table->addCell(13000)->addText('ယခုနေရပ်လိပ်စာအပြည့်အစုံ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->current_address_house_no.$staff->current_address_street.$staff->current_address_ward.$staff->current_address_township_or_town->name.'မြို့နယ်၊'.$staff->current_address_region->name.'ဒေသကြီး။',null ,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၅။', null, $pStyle_5);
        $table->addCell(13000)->addText('အမြဲတမ်းနေရပ်လိပ်စာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->permanent_address_house_no.$staff->permanent_address_street.$staff->permanent_address_ward.$staff->permanent_address_township_or_town->name.'မြို့နယ်၊'.$staff->permanent_address_region->name.'ဒေသကြီး။',null ,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၆။', null, $pStyle_5);
        $table->addCell(13000)->addText("ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်\nနေရပ်လိပ်စာအပြည့်အစုံ\n(တပ်မတော်သားဖြစ်ပါက\nတပ်လိပ်စာဖော်ပြရန်မလိုပါ)", null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->previous_addresses ? $staff->previous_addresses :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၇။', null, $pStyle_5);
        $table->addCell(13000)->addText("တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/\nတပ်မတော်သားဖြစ်လျှင်", null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(က) ကိုယ်ပိုင်အမှတ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_solider_no ? $staff->military_solider_no :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ခ) တပ်သို့ဝင်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->military_join_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_dsa_no ? $staff->military_dsa_no :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText( formatDMYmm($staff->military_gazetted_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(င) တပ်ထွက်သည့်နေ့', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->military_leave_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(စ) ထွက်သည့်အကြောင်း', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_leave_reason ? $staff->military_leave_reason : 'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_served_army ? $staff->military_served_army :'မရှိပါ',  null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဇ) တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->military_brief_history_or_penalty ? $staff->military_brief_history_or_penalty :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('', null, $pStyle_5);
        $table->addCell(13000)->addText('(ဈ) အငြိမ်းစားလစာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(en2mm($staff->military_pension), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၈။', null, $pStyle_5);
        $table->addCell(13000)->addText('ပညာအရည်အချင်း', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        // $table->addCell(13000)->addText($staff->staff_educations->map(function ($education) {
        //     return $education->education->name;
        // })->join(', '), null, $pStyle_8);
        $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
        $table->addCell(13000)->addText($educationNames, null,$pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၉။', null, $pStyle_5);
        $table->addCell(13000)->addText('အဘအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(
            ($staff->father_name ?? '') . 
            ($staff->father_ethnic?->name ? '၊' . $staff->father_ethnic?->name:'') .
            ($staff->father_religion?->name ? ''. $staff->father_religion?->name : '' ). 
            ($staff->father_place_of_birth ? ''. $staff->father_place_of_birth : '' ). 
            ($staff->father_occupation ? ''. $staff->father_occupation.'။':''),
            null, 
            $pStyle_8
        );

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၀။', null, $pStyle_5);
        $table->addCell(13000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->father_address_house_no.$staff->father_address_street.$staff->father_address_ward.$staff->father_address_township_or_town->name.'မြို့နယ်၊'.$staff->father_address_region->name.'ဒေသကြီး။',null ,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၁။', null, $pStyle_5);
        $table->addCell(13000)->addText('အမိအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(
            ($staff->mother_name?? '') . ($staff->mother_ethnic?->name ?''. $staff->mother_ethnic?->name :'') .
            ( $staff->mother_religion?->name ? ''. $staff->mother_religion?->name : '') . 
            ($staff->mother_place_of_birth ? ''. $staff->mother_place_of_birth : ''  ).
            ( $staff->mother_occupation ? ''. $staff->mother_occupation.'။':'') ,
            null,
            $pStyle_8
        );
       

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၂။', null, $pStyle_5);
        $table->addCell(13000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->mother_address_house_no.$staff->mother_address_street.$staff->mother_address_ward.$staff->mother_address_township_or_town->name.'မြို့နယ်၊'.$staff->mother_address_region->name.'ဒေသကြီး။',null ,$pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၃။', null, $pStyle_5);
        $table->addCell(13000)->addText('ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသားဟုတ်/ မဟုတ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->is_parents_citizen_when_staff_born ? 'ဟုတ်ပါသည်' : 'မဟုတ်', null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၄။', null, $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိအလုပ်အကိုင်နှင့်အဆင့်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->current_rank->name, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၅။', null, $pStyle_5);
        $table->addCell(13000)->addText("အလုပ်စတင်ဝင်ရောက်သည့်နေ့နှင့်\nလက်ရှိရာထူးရသည့်နေ့", null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->government_staff_started_date)." ၊\n ".formatDMYmm($staff->current_rank_date), null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၆။', null, $pStyle_5);
        $table->addCell(13000)->addText('လက်ရှိအလုပ်အကိုင်ရလာပုံ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->is_direct_appointed, null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂၇။', null, $pStyle_5);
        $table->addCell(13000)->addText('ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->is_direct_appointed, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၈။', null, $pStyle_5);
        $table->addCell(13000)->addText('လစာဝင်ငွေ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->payscale?->name, null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၂၉။', null, $pStyle_5);
        $table->addCell(13000)->addText('ဌာန၊ နေရာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊ရန်ကုန်မြို့။', null, $pStyle_8);

        // $section->addText('၃၀။ ' . ' အလုပ်အကိုင်အတွက် ထောက်ခံသူများ',null,array('spaceBefore'=> 200));
        // $table = $section->addTable();
        // $table->addRow();
        // $table->addCell(500)->addText('စဉ်', ['bold' => true]);
        // $table->addCell(2000)->addText('ထောက်ခံသူ', ['bold' => true]);
        // $table->addCell(2000)->addText('ဝန်ကြီးဌာန', ['bold' => true]);
        // $table->addCell(2000)->addText('ဦးစီးဌာန', ['bold' => true]);
        // $table->addCell(2000)->addText('ရာထူး', ['bold' => true]);
        // $table->addCell(2000)->addText('အကြောင်းအရာ', ['bold' => true]);
        // if($staff->recommendations->isNotEmpty()){
        // foreach ($staff->recommendations as $index => $recommendation) {
        //     $table->addRow();
        //     $table->addCell(500)->addText(en2mm($index + 1));
        //     $table->addCell(2000)->addText($recommendation->pluck('recommend_by')->unique()->join(', '));
        //     $table->addCell(2000)->addText($recommendation->ministry);
        //     $table->addCell(2000)->addText($recommendation->department);
        //     $table->addCell(2000)->addText($recommendation->rank);
        //     $table->addCell(2000)->addText($recommendation->remark);
        //     }
        // }else{
        //     $table->addRow();
        //     $table->addCell(500);
        //     $table->addCell(2000);
        //     $table->addCell(2000);
        //     $table->addCell(2000);
        //     $table->addCell(2000);
        //     $table->addCell(2000);
        // }
        
        $table->addRow(50);
        $table->addCell(1300)->addText('၃၀။', null, $pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင်အတွက် ထောက်ခံသူများ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->recommendations->map(function ($recommendation) {
            return $recommendation->recommend_by;
        })->join(', '), null, $pStyle_8);

        $section->addText('၃၁။ ' . ' ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်',null, array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(1000, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true],$pStyle_2);
        $table->addCell(4000, ['vMerge' => 'restart'])->addText('အဆင့်/ရာထူး', ['bold' => true], $pStyle_2);
        $table->addCell(5000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ', ['bold'=>true],$pStyle_1);
        $table->addCell(3000, ['vMerge' => 'restart'])->addText('ဌာန/နေရာ', ['bold' => true],$pStyle_2);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true], $pStyle_2);

        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(1000, ['vMerge' => 'continue']);
        $table->addCell(4000, ['vMerge' => 'continue']);
        $table->addCell(2500)->addText('မှ', ['bold'=>true],$pStyle_1);
        $table->addCell(2500)->addText('ထိ', ['bold' => true],$pStyle_1);
        $table->addCell(3000, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        if( $staff->postings->isNotEmpty()){
            foreach ($staff->postings as $index => $posting) {
                $table->addRow(50);
                $table->addCell(1000)->addText('('.myanmarAlphabet($index).')',null,$pStyle_6);
                $table->addCell(4000)->addText($posting->rank->name ?? '',null,$pStyle_3);
                $table->addCell(2500)->addText(formatDMYmm($posting->from_date),null, $pStyle_6);
                $table->addCell(2500)->addText($posting->to_date ? formatDMYmm($posting->to_date) : formatDMYmm(now()->toDateString()),null, $pStyle_6);
                $table->addCell(3000)->addText($posting->ministry?->name.'၊'."\n".$posting->division?->name . $posting->department?->name .'၊'.$posting->location,null, $pStyle_6);
                $table->addCell(2000)->addText($posting->remark,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(15000, ['gridSpan' => 6]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
        $section->addText('၃၂။ ' . ' ညီအစ်ကိုမောင်နှမများ', null, array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2500)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->siblings->isNotEmpty()){
            foreach ($staff->siblings as $index=>$sibling) {
                $table->addRow(50);
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($sibling->name,null,$pStyle_3);
                $table->addCell(1300)->addText($sibling->ethnic?->name . "/\n" . $sibling->religion?->name,null, $pStyle_6);
                $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
                $table->addCell(2500)->addText($sibling->address,null, $pStyle_3);
                $table->addCell(1200)->addText($sibling->relation->name ?? '',null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11600, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၃။ ' . ' အဘ၏ညီအစ်ကိုမောင်နှမများ', null,array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2500)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->fatherSiblings->isNotEmpty()){
            foreach ($staff->fatherSiblings as $index => $sibling) {
                $table->addRow();
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
                $table->addCell(1300)->addText($sibling->ethnic?->name . "/\n" . $staff->religion?->name,null, $pStyle_6);
                $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
                $table->addCell(2500)->addText($sibling->address,null, $pStyle_3);
                $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11600, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၄။ ' . ' အမိ၏ညီအစ်ကိုမောင်နှမများ', null,array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2500)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->motherSiblings->isNotEmpty()){
            foreach ($staff->motherSiblings as $index => $sibling) {
                $table->addRow(50);
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
                $table->addCell(1300)->addText($sibling->ethnic?->name  . "/\n" . $sibling->religion?->name ,null, $pStyle_6);
                $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
                $table->addCell(2500)->addText($sibling->address,null, $pStyle_3);
                $table->addCell(1200)->addText($sibling->relation->name ,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11600, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၅။ ' . ' ခင်ပွန်း၊ ဇနီးသည်', null,array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2500)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->spouses->isNotEmpty()){
            foreach ($staff->spouses as $index => $spouse) {
                $table->addRow();
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($spouse->name,null, $pStyle_3);
                $table->addCell(1300)->addText($spouse->ethnic->name  . "/\n" . $spouse->religion->name ,null, $pStyle_6);
                $table->addCell(1300)->addText($spouse->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($spouse->occupation,null, $pStyle_3);
                $table->addCell(2500)->addText($spouse->address,null, $pStyle_3);
                $table->addCell(1200)->addText($spouse->relation?->name,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11600, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၆။ ' . ' သားသမီးများ', null,array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->children->isNotEmpty()){
            foreach ($staff->children as $index => $child) {
                $table->addRow();
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($child->name,null, $pStyle_3);
                $table->addCell(1300)->addText($child->ethnic?->name  . "/\n" . $child->religion?->name ?? '',null, $pStyle_6);
                $table->addCell(1300)->addText($child->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($child->occupation,null, $pStyle_3);
                $table->addCell(2300)->addText($child->address,null, $pStyle_3);
                $table->addCell(1200)->addText($child->relation?->name,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11400, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၇။ ' . ' ခင်ပွန်း/ဇနီးသည်၏ ညီအစ်ကိုမောင်နှမများ', null,array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->spouseSiblings->isNotEmpty()){
            foreach ($staff->spouseSiblings as $index => $sibling) {
                $table->addRow();
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
                $table->addCell(1300)->addText($sibling->ethnic?->name  . '/'."\n" . $sibling->religion?->name ,null, $pStyle_6);
                $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
                $table->addCell(2300)->addText($sibling->address,null, $pStyle_3);
                $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11400, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၈။ ' . ' ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအစ်ကိုမောင်နှမများ', null, array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->spouseFatherSiblings->isNotEmpty()){
            foreach ($staff->spouseFatherSiblings as $index => $sibling) {
                $table->addRow();
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
                $table->addCell(1300)->addText($sibling->ethnic?->name  . "/\n" . $sibling->religion?->name ,null, $pStyle_6);
                $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
                $table->addCell(2300)->addText($sibling->address,null, $pStyle_3);
                $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11400, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }

        $section->addText('၃၉။ ' . ' ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအစ်ကိုမောင်နှမများ', null,array('spaceBefore'=> 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(2800)->addText('အမည်', ['bold' => true],$pStyle_7);
        $table->addCell(1300)->addText("လူမျိုး/\nဘာသာ", ['bold' => true],$pStyle_2);
        $table->addCell(1300)->addText('ဇာတိ', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText('အလုပ်အကိုင်', ['bold' => true],$pStyle_7);
        $table->addCell(2300)->addText('နေရပ်လိပ်စာ', ['bold' => true],$pStyle_7);
        $table->addCell(1200)->addText('တော်စပ်ပုံ', ['bold' => true],$pStyle_7);
        if($staff->spouseMotherSiblings->isNotEmpty()){
            foreach ($staff->spouseMotherSiblings as $index => $sibling) {
                $table->addRow();
                $table->addCell(700)->addText('('.myanmarAlphabet($index).')',null, $pStyle_6);
                $table->addCell(2800)->addText($sibling->name,null, $pStyle_3);
                $table->addCell(1300)->addText($sibling->ethnic?->name . "/\n" . $sibling->religion?->name,null, $pStyle_6);
                $table->addCell(1300)->addText($sibling->place_of_birth,null, $pStyle_6);
                $table->addCell(1800)->addText($sibling->occupation,null, $pStyle_3);
                $table->addCell(2300)->addText($sibling->address,null, $pStyle_3);
                $table->addCell(1200)->addText($sibling->relation?->name,null, $pStyle_6);
            }
        }else{
                $table->addRow(50);
                $cell = $table->addCell(11400, ['gridSpan' => 7]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                    ['alignment' => 'center']
                );
            }
        $section->addText('');
        $table = $section->addTable();   
        $table->addRow(50);
        $table->addCell(1300)->addText('၄၀။', null, $pStyle_5);
        $table->addCell(13000)->addText("မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်း\nတို့၏မိဘ၊ညီအစ်ကိုမောင်နှမများ၊\nသားသမီးများသည်နိုင်ငံရေးပါတီများ\nတွင်ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ\n(ရှိက အသေးစိတ်ဖော်ပြရန်)", null, $pStyle_4);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(
            $staff->family_in_politics 
                ? '('. ($staff->family_in_politics_text ?? '').')' 
                : 'မရှိ', 
            null, 
            $pStyle_4
        );

//         $section->addPageBreak();
//         $section->addTitle('ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်', 3);
        
//         $table->addRow(50);
//         $table->addCell(1300)->addText('၁။', null, $pStyle_5);
//         $table->addCell(13000)->addText("နေခဲ့ဖူးသောကျောင်းများ\n(ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)", null, $pStyle_8);
//         $table->addCell(700)->addText('-', null, $pStyle_5);
//         $table->addCell(13000)->addText( 
//         $staff->schools->map(function ($school) {
//         return $school->school_name . ' (' . $school->from_date . ' - ' . $school->to_date . ')';
//     })->join('၊ '), 
//     null, 
//     $pStyle_8
// );
$section->addPageBreak();
$section->addTitle('ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်', 3);
$table = $section->addTable();


$table->addRow(50);
$table->addCell(1300)->addText('၁။', null, $pStyle_5);
$table->addCell(13000)->addText("နေခဲ့ဖူးသောကျောင်းများ\n(ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)", null, $pStyle_8);
$table->addCell(700)->addText('-', null, $pStyle_5);

// Check if the staff has school records
if ($staff->schools->isNotEmpty()) {
    $table->addCell(13000)->addText(
        $staff->schools->map(function ($school) {
            return $school->school_name . ' (' . $school->from_date . ' - ' . $school->to_date . ')';
        })->join('၊ '), 
        null, 
        $pStyle_8
    );
} else {
    // If no schools are available, show a placeholder
    $table->addCell(13000)->addText('ကျောင်းမှတ်တမ်းမရှိပါ', null, $pStyle_8);
}



        $table->addRow(50);
        $table->addCell(1300)->addText('၂။', null, $pStyle_5);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("နောက်ဆုံးအောင်မြင်ခဲ့သည့်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("ကျောင်း/အတန်း၊ခုံအမှတ်၊");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("ဘာသာရပ်အတိအကျဖော်ပြရန်");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(15000)->addText(
            ($staff->last_school_name ?? '' ). 
            ($staff->last_school_subject ? '၊' . $staff->last_school_subject : ''). 
            ($staff->last_school_row_no ? '၊'. $staff->last_school_row_no : '' ). 
            ($staff->last_school_major ? '၊' . $staff->last_school_major .'။': ''),
            null, 
            $pStyle_8
        );
        
        $table->addRow(50);
        $table->addCell(1300)->addText('၃။', null, $pStyle_5);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("ကျောင်းသားဘဝတွင်နိုင်ငံရေး/");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("မြို့ရေး/ရွာရေးဆောင်ရွက်မှုများနှင့်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("အဆင့်အတန်း၊တာဝန်");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(15000)->addText($staff->student_life_political_social ?$staff->student_life_political_social :'မရှိပါ' , null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၄။', null, $pStyle_5);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("ဝါသနာပါပြီး၊လေ့လာလိုက်စားခဲ့");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("သောကျန်းမာရေးကစားခုန်စားမှု");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("များ၊အနုပညာဆိုင်ရာအတီးအမှုတ်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("များ၊ပညာရေးစက်မှုလက်မှု");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(15000)->addText($staff->habit ? $staff->habit:'မရှိပါ' , null, $pStyle_8);
      

        $table->addRow(50);
        $table->addCell(1300)->addText('၅။', null, $pStyle_5);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("လုပ်ကိုင်ခဲ့သောအလုပ်အကိုင်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("များနှင့် ဌာန/မြို့နယ်");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(15000)->addText($staff->past_occupation ?? '', null, $pStyle_8);
        $table->addRow(50);
        $table->addCell(1300)->addText('၆။', null, $pStyle_5);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူ");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("များကြီးစိုးသောနယ်မြေတွင်နေခဲ့ဖူး");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("လျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များ");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("ကိုဖော်ပြပါ");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(5000)->addText($staff->revolution ? $staff->revolution:'မရှိပါ' , null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၇။', null, $pStyle_5);
        // $table->addCell(13000)->addText("အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိုးနှင့်လစာ", null, $pStyle_4);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("အလုပ်အကိုင်ပြောင်းရွှေ့ခဲ့သော");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("အကြောင်းအကျိုးနှင့်လစာ");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(5000)->addText($staff->transfer_reason_salary ? $staff->transfer_reason_salary:'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၈။', null, $pStyle_5);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("နိုင်ငံရေး၊မြို့/ရွာရေးဆောင်ရွက်မှု");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("များ၊ဆောင်ရွက်နေစဥ်အဆင့်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("အတန်းနှင့်တာဝန်");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(5000)->addText($staff->during_work_political_social ? $staff->during_work_political_social :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၉။', null, $pStyle_5);
        // $table->addCell(13000)->addText("စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင်ခင်မင်ရင်းနှီးသောမိတ်ဆွေများရှိ/မရှိ", null, $pStyle_4);
        $cell = $table->addCell(11000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("စစ်ဘက်/နယ်ဘက်/ရဲဘက်နှင့်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("နိုင်ငံရေးဘက်တွင်ခင်မင်ရင်းနှီး");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("သော မိတ်ဆွေများ ရှိ/မရှိ");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(5000)->addText($staff->has_military_friend ? $staff->has_military_friend_text :'မရှိပါ', null, $pStyle_8);

        $section->addText('၁၀။' . 'နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်', null,array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50,array('tblHeader' => true));
        $table->addCell(700)->addText('စဥ်', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText("သွားရောက်ခဲ့\nသည့်နိုင်ငံ", ['bold' => true],$pStyle_2);
        $table->addCell(4000)->addText('သွားရောက်ခဲ့သည့်အကြောင်း', ['bold' => true],$pStyle_7);
        $table->addCell(1800)->addText("တွေ့ဆုံခဲ့သည့်\nကုမ္ပဏီ\nလူပုဂ္ဂိုလ်\nဌာန", ['bold' => true],$pStyle_2);
        $table->addCell(2500)->addText('ကာလ'."\n".'(မှ-ထိ)', ['bold' => true],$pStyle_2);// <' '>it m2eans many space
        if($staff->abroads->isNotEmpty()){
            foreach ($staff->abroads as $index => $abroad) {
                    $table->addRow(50);
                    $table->addCell(700)->addText(en2mm($index+1),null,$pStyle_6);
                    $table->addCell(1800)->addText($abroad->countries->pluck('name')->unique()->join('၊ ')."\n".$abroad->towns,null,$pStyle_3);
                    $table->addCell(1800)->addText($abroad->countries->pluck('name')->unique()->join('၊ ')."\n".$abroad->towns,null,$pStyle_3);
                    $table->addCell(4000)->addText($abroad->particular,null,$pStyle_6);
                    $table->addCell(1800)->addText($abroad->meet_with,null,$pStyle_6);
                    $table->addCell(2500)->addText(formatDMYmm($abroad->from_date) ."\n".formatDMYmm($abroad->to_date),null,array('align' => 'left', 'spaceAfter' => 0, 'spaceBefore' => 0 ,'indentation' => ['left' => 100]));
                }
                    $table->addRow(50);
                $cell = $table->addCell(10800, ['gridSpan' => 5]); 
                $cell->addText(
                    'မရှိပါ',
                   null,
                );
                }
        
        $section->addText('');
        $table = $section->addTable();
        $table->addRow(50);
        $table->addCell(2000)->addText('၁၁။', null, $pStyle_5);
        $cell = $table->addCell(25000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("မိမိနှင့်ခင်မင်ရင်းနှီးသောနိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("မည်သည့်အလုပ်အကိုင်၊လူမျိုး၊တိုင်းပြည်၊မည်ကဲ့သို့");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("ရင်းနှီးသည်");
        $table->addCell(1000)->addText('-', null, $pStyle_5);
        $table->addCell(16000)->addText(
            ($staff->foreigner_friend_name ?? '') . 
            ($staff->foreigner_friend_occupation ? '' . $staff->foreigner_friend_occupation : '').
            ($staff->foreigner_friend_nationality?->name ? '' . $staff->foreigner_friend_nationality?->name : '' ).
            ($staff->foreigner_friend_country?->name ? '' . $staff->foreigner_friend_country?->name : '')  .
            ($staff->foreigner_friend_how_to_know ? '' . $staff->foreigner_friend_how_to_know .'။': ''), 
            null, 
            $pStyle_8
        );
        
        $table->addRow(50);
        $table->addCell(1300)->addText('၁၂။', null, $pStyle_5);
        $cell = $table->addCell(25000);
        $textRun = $cell->addTextRun($pStyle_8);
        $textRun->addText("မိမိအားထောက်ခံသည့်ပုဂ္ဂိုလ်(စစ်ဘက်/နယ်ဘက်");
        $textRun->addTextBreak(); // Adds a line break
        $textRun->addText("အရာရှိ/မြို့နယ်/ကျေးရွာ/ရပ်ကွက်အုပ်ချုပ်ရေးမှူး)");
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(5000)->addText($staff->recommended_by_military_person ? $staff->recommended_by_military_person :'မရှိပါ', null, $pStyle_8);

        $table->addRow(50);
        $table->addCell(1300)->addText('၁၃။', null, $pStyle_5);
        $table->addCell(25000)->addText("ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ", null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(5000)->addText( $staff->punishments->count() == 0 ? 'မရှိ' : 'ရှိ', null, $pStyle_4);

        $section->addText('အထက်ပါဇယားကွက်များတွင်ဖြည့်စွက်ရေးသွင်းထားသောအကြောင်းအရာများအားမှန်ကန်ကြောင်းတာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', null, array('spaceBefore' => 200, 'alignment' => Jc::BOTH));

        $tableStyle = [
            'alignment' => Jc::END // Center the table
        ];
        $table = $section->addTable($tableStyle);
            $table->addRow(50);
            $table->addCell(2100)->addText('လက်မှတ် ',null ,$pStyle_8);
            $table->addCell(300)->addText('၊', null, $pStyle_5);
            $table->addCell(2100);
    
            $table->addRow(50);
            $table->addCell(2100)->addText("ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်)",null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->staff_no ,null ,$pStyle_4);

            $table->addRow(50);
            $table->addCell(2100)->addText("နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်",null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code ,null ,$pStyle_4);
    
            $table->addRow(50);
            $table->addCell(2100)->addText('အဆင့်၊ရာထူး',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->current_rank?->name,null ,$pStyle_4);
    
            $table->addRow(50);
            $table->addCell(2100)->addText('အမည်',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->name,null ,$pStyle_4);
    
            $table->addRow(50);
            $table->addCell(2100)->addText('တပ်/ဌာန',null ,$pStyle_4);
            $table->addCell(300)->addText('၊',  null, $pStyle_5);
            $table->addCell(2100)->addText($staff->current_department->name,null ,$pStyle_4);
        $section->addText('ရက်စွဲ၊ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);

        $fileName = 'staff_report_53_' . $staff->id . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

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
        return view('livewire.pdf-staff-report53', [
            'staff' => $staff,
        ]);
    }
}
