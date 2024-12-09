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
        $section = $phpWord->addSection();

        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 10], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']);
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၁။ အမည်:'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->name, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၂။ ငယ်အမည်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->nick_name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၃။အခြားအမည် :');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->other_name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၄။အသက်(မွေးသက္ကရာဇ်) :');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')), ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၅။လူမျိုးနှင့် ကိုးကွယ်သည့်ဘာသာ :');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '/' . ($staff->religion_id ? $staff->religion->name : '-')); 

        $table->addRow();
        $table->addCell(4000)->addText('၆။အရပ်အမြင့်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->height_feet); 

        $table->addRow();
        $table->addCell(4000)->addText('၇။ဆံပင်အရောင်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->hair_color); 
        
        $table->addRow();
        $table->addCell(4000)->addText('၈။မျက်စိအရောင်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->eye_color); 

        $table->addRow();
        $table->addCell(4000)->addText('၉။ထင်ရှားသည့် အမှတ်အသား:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->prominent_mark); 

        $table->addRow();
$table->addCell(4000)->addText('၁၀။ အသားအရောင်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->skin_color, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၁၁။ ကိုယ်အလေးချိန်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->weight, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၁၂။ မွေးဖွားရာဇာတိ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->place_of_birth, ['align' => 'right']);
$table->addRow();
$table->addCell(4000)->addText('၁၃။နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . '/' . $staff->nrc_sign->name . '/' . $staff->nrc_code);

$table->addRow();
$table->addCell(4000)->addText('၁၄။ ယခုနေရပ်လိပ်စာအပြည့်အစုံ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText(
    $staff->current_address_street . '/' . 
    $staff->current_address_ward . '/' . 
    $staff->current_address_region->name . '/' . 
    $staff->current_address_township_or_town->name, 
    
);
$table->addRow();
$table->addCell(4000)->addText('၁၅။အမြဲတမ်းနေရပ်လိပ်စာ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->permanent_address_street.'/'.$staff->permanent_address_ward.'/'.$staff->permanent_address_region->name.'/'.$staff->permanent_address_township_or_town->name);

$table->addRow();
$table->addCell(4000)->addText('၁၆။ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->previous_addresses);
$table->addRow();
$table->addCell(4000)->addText('၁၇။ တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText('', ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(က) ကိုယ်ပိုင်အမှတ်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_solider_no, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(ခ) တပ်သို့ဝင်သည့်နေ့:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_join_date, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_dsa_no, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_gazetted_date, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(င) တပ်ထွက်သည့်နေ့:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_leave_date, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(စ) ထွက်သည့်အကြောင်း:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_leave_reason, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_served_army, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(ဇ) တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_brief_history_or_penalty, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('(ဈ) အငြိမ်းစားလစာ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->military_pension, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၁၈။ ပညာအရည်အချင်း:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText('', ['align' => 'right']);

foreach ($staff->staff_educations as $education) {
    $table->addRow();
    $table->addCell(4000)->addText('', ['align' => 'center']);
    $table->addCell(2000)->addText('-', ['align' => 'center']);
    $table->addCell(5000)->addText($education->education->name . '၊', ['align' => 'right']);
}

$table->addRow();
$table->addCell(4000)->addText('၁၉။ အဘအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင်:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->father_name . '၊' . $staff->father_ethnic?->name . '၊' . $staff->father_religion?->name . '၊' . $staff->father_place_of_birth . '၊' . $staff->father_occupation, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၀။ ၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ:');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->father_address_street . '၊' . $staff->father_address_ward . '၊' . $staff->father_address_township_or_town?->name . '၊' . $staff->father_address_region?->name, ['align' => 'right']);


$table->addRow();
$table->addCell(4000)->addText('၂၁။အမိအမည်၊ လူမျိုး၊ ကိုးကွယ်သည့်ဘာသာ ဇာတိနှင့် အလုပ်အကိုင် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->mother_name . '၊' . $staff->mother_ethnic?->name . '၊' . $staff->mother_religion?->name . '၊' . $staff->mother_place_of_birth . '၊' . $staff->mother_occupation, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၂။၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->mother_address_street . '၊' . $staff->mother_address_ward . '၊' . $staff->mother_address_township_or_town?->name . '၊' . $staff->mother_address_region?->name, ['align' => 'right']);


$table->addRow();
$table->addCell(4000)->addText('၂၃။ကာယကံရှင် မွေးဖွားချိန်၌ မိဘနှစ်ပါးသည် နိုင်ငံသားဟုတ်/ မဟုတ် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->is_parents_citizen_when_staff_born, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၄။လက်ရှိအလုပ်အကိုင်နှင့်အဆင့် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->current_rank->name, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၅။လက်ရှိဌာနအလုပ်ဝင်ရက်စွဲနှင့်လက်ရှိရာထူးရသည့်နေ့ :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->join_date, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၆။လက်ရှိအလုပ်အကိုင်ရလာပုံ :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->form_of_appointment, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၇။ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့် :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->is_direct_appointed, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၈။လစာဝင်ငွေ :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText($staff->payscale?->name, ['align' => 'right']);

$table->addRow();
$table->addCell(4000)->addText('၂၉။ဌာန၊ နေရာ :');
$table->addCell(2000)->addText('-', ['align' => 'center']);
$table->addCell(5000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန၊ရန်ကုန်မြို့။', ['align' => 'right']);
        $section->addText('၃၀။' . 'အလုပ်အကိုင်အတွက် ထောက်ခံသူများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဉ်', ['bold' => true]);
        $table->addCell(2000)->addText('ထောက်ခံသူ', ['bold' => true]);
        $table->addCell(2000)->addText('ဝန်ကြီးဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('ဦးစီးဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('ရာထူး', ['bold' => true]);
        $table->addCell(2000)->addText('အကြောင်းအရာ', ['bold' => true]);
        foreach ($staff->recommendations as $index => $recommendation) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1);
            $table->addCell(2000)->addText($recommendation->recommend_by);
            $table->addCell(2000)->addText($recommendation->ministry);
            $table->addCell(2000)->addText($recommendation->department);
            $table->addCell(2000)->addText($recommendation->rank);
            $table->addCell(2000)->addText($recommendation->remark);
        }
        $section->addText('၃၁။' . 'ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500, ['vMerge' => 'restart'])->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('အဆင့်/ရာထူး', ['bold' => true]);
        $table->addCell(4000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ');
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('ဌာန/နေရာ', ['bold' => true]);
        $table->addCell(2000, ['vMerge' => 'restart'])->addText('မှတ်ချက်', ['bold' => true]);
        $table->addRow();
        $table->addCell(500, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        $table->addCell(2000)->addText('မှ', ['alignment' => 'center']);
        $table->addCell(2000)->addText('ထိ', ['alignment' => 'center']);
        $table->addCell(500, ['vMerge' => 'continue']);
        $table->addCell(2000, ['vMerge' => 'continue']);
        foreach ($staff->postings as $index => $posting) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1);
            $table->addCell(2000)->addText($posting->rank->name ?? '');
            $table->addCell(2000)->addText($posting->from_date);
            $table->addCell(2000)->addText($posting->to_date);
            $table->addCell(2000)->addText($posting->division->name ?? ('' . '/' . $posting->department->name ?? ''));
            $table->addCell(2000)->addText($posting->location);
        }

        $section->addText('၃၂။' . 'ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->siblings as $sibling) {
            $table->addRow();
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name . '/' . $sibling->religion?->name);
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation->name ?? '');
        }
        $section->addText('၃၃။' . 'အဘ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->fatherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name . '/' . $staff->religion?->name);
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation?->name);
        }
        $section->addText('၃၄။' . 'အမိ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->motherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ('' . '/' . $sibling->religion?->name ?? ''));
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation->name ?? '');
        }
        $section->addText('၃၅။' . 'ခင်ပွန်း၊ ဇနီးသည်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->spouses as $index => $spouse) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($spouse->name);
            $table->addCell(2000)->addText($spouse->ethnic->name ?? ('' . '/' . $spouse->religion->name ?? ''));
            $table->addCell(2000)->addText($spouse->place_of_birth);
            $table->addCell(2000)->addText($spouse->occupation);
            $table->addCell(2000)->addText($spouse->address);
            $table->addCell(2000)->addText($spouse->relation?->name);
        }
        $section->addText('၃၆။' . 'သားသမီးများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->children as $index => $child) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($child->name);
            $table->addCell(2000)->addText($child->ethnic?->name ?? ('' . '/' . $child->religion?->name ?? ''));
            $table->addCell(2000)->addText($child->place_of_birth);
            $table->addCell(2000)->addText($child->occupation);
            $table->addCell(2000)->addText($child->address);
            $table->addCell(2000)->addText($child->relation?->name);
        }
        $section->addText('၃၇။' . 'ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->spouseSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ('' . '/' . $sibling->religion?->name ?? ''));
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation?->name);
        }
        $section->addText('၃၈။' . 'ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->spouseFatherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ('' . '/' . $sibling->religion?->name ?? ''));
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation?->name);
        }
        $section->addText('၃၉။' . 'ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('လူမျိုး/ဘာသာ', ['bold' => true]);
        $table->addCell(2000)->addText('ဇာတိ', ['bold' => true]);
        $table->addCell(2000)->addText('အလုပ်အကိုင်', ['bold' => true]);
        $table->addCell(2000)->addText('နေရပ်လိပ်စာ', ['bold' => true]);
        $table->addCell(2000)->addText('တော်စပ်ပုံ', ['bold' => true]);
        foreach ($staff->spouseMotherSiblings as $index => $sibling) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ('' . '/' . $sibling->religion?->name ?? ''));
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation?->name);
        }
       
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၄၀။မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီဝင်များတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်) :');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->family_in_politics, ['align' => 'right']);
        $section->addTitle('ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်', 2);
       
        $table->addRow();
        $table->addCell(4000)->addText('၁။နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်):');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->schools_year, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂။နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊ ဘာသာရပ်အတိအကျဖော်ပြရန်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->last_school_name . '၊' . $staff->last_school_subject . '၊' . $staff->last_school_row_no . '၊' . $staff->last_school_major, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၃။ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊ တာဝန်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->student_life_political_social, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၄။ဝါသနာပါပြီး၊ လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာ အတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->habit, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၅။လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->past_occupation, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၆။တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြပါ:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->revolution, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၇။အလုပ်အကိုင် ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->transfer_reason_salary, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၈။အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊ မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အဆင့်အတန်းနှင့်တာဝန်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->during_work_political_social, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၉။စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများရှိ/ မရှိ:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->has_military_friend, ['align' => 'right']);

        $section->addText('၁၀။' . 'နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(500)->addText('စဥ်', ['bold' => true]);
        $table->addCell(2000)->addText('သွားရောက်ခဲ့သည့်နိုင်ငံ', ['bold' => true]);
        $table->addCell(2000)->addText('သွားရောက်ခဲ့သည့်အကြောင်း', ['bold' => true]);
        $table->addCell(2000)->addText('တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('ကာလ(မှ-ထိ)', ['bold' => true]);
        foreach ($staff->abroads as $index => $abroad) {
            $table->addRow();
            $table->addCell(1000)->addText($index + 1);
            $table->addCell(2000)->addText($abroad->country->name ?? 'မရှိပါ');
            $table->addCell(2000)->addText($abroad->particular);
            $table->addCell(2000)->addText($abroad->meet_with);
            $table->addCell(2000)->addText($abroad->from_date . '-' . $abroad->to_date);
        }
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၁၁။မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့် အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည်:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->foreigner_friend_name . '၊' . $staff->foreigner_friend_occupation . '၊' . $staff->foreigner_friend_nationality?->name . '၊' . $staff->foreigner_friend_country?->name . '၊' . $staff->foreigner_friend_how_to_know, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၂။မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက်အရာရှိ/ မြို့နယ်/ ကျေးရွာ/ ရပ်ကွက်အုပ်ချုပ်ရေးမှူး:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->recommended_by_military_person, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၃။ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ:');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText(en2mm($staff->punishments->count()), ['align' => 'right']);
        $section->addText('အထက်ပါဇယားကွက်များအတွင်း ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true]);
        $section->addText('လက်မှတ်: -', ['align' => 'center']);
        $section->addText('ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်): -', ['align' => 'center']);
        $section->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်: ', ['align' => 'center']);
        $section->addText('အဆင့်၊ရာထူး: ', ['align' => 'center']);
        $section->addText('အမည်: ', ['align' => 'center']);
        $section->addText('တပ်/ဌာန: ', ['align' => 'center']);
        $section->addText('ရက်စွဲ: ' . formatPeriodMM(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, \Carbon\Carbon::now()->day), ['align' => 'center']);

        $fileName = 'staff_report_' . $staff->id . '.docx';
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

