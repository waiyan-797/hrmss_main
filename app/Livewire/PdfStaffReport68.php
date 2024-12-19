<?php

namespace App\Livewire;

use App\Models\Ministry;
use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class PdfStaffReport68 extends Component
{
public $staff_id;
   public function mount($staff_id=0){
    $this->staff_id=$staff_id;
   }
    public function go_pdf($staff_id){
        $staff = Staff::find($staff_id);
        $data = [
            'staff' => $staff,
           
        ];

        $pdf = PDF::loadView('pdf_reports.staff_report_68', $data);
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_68.pdf');
    }
    public function go_word($staff_id)
    {
        $staff = Staff::find($staff_id);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection(); 
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $phpWord->addTitleStyle(2, ['bold' => true, 'size' =>10 ], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
        // $imagePath = $staff->staff_photo ? storage_path('app/upload/' . $staff->staff_photo) : 'img/user.png';
        // $section->addImage($imagePath, ['width' => 80, 'height' => 80, 'align' => 'right']); 
        // $table = $section->addTable();
        // $table->addRow();
        // $table->addCell(2000)->addText('၁။', null, ['alignment' => 'center']);
        // $table->addCell(15000)->addText('အမည်', null, ['alignment' => 'both']);
        // $table->addCell(1000)->addText('-', ['alignment' => 'center']);
        // $table->addCell(16000)->addText($staff->name, null, ['alignment' => 'both']);

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၁။ဝန်ထမ်းအမှတ် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->staff_no, ['align' => 'right']); 
        $table->addRow();
        $table->addCell(4000)->addText('၂။ အမည်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->name, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၃။ ငယ်အမည်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->nick_name, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၄။ အခြားအမည်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->other_name, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('၅။မွေးသက္ကရာဇ် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText(en2mm(\Carbon\Carbon::parse($staff->dob)->format('d-m-y')), ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၆။လူမျိုး '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->ethnic->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၇။ဘာသာ '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->religion?->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၈။အရပ်အမြင့် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->height_feet.'/'.$staff->height_inch, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၉။ဆံပင်အရောင် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->hair_color, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၀။မျက်စိအရောင် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->eye_color, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၁။ထင်ရှားသည့်အမှတ်အသား'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->prominent_mark, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၂။အသားအရောင်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->skin_color, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၃။ကိုယ်အလေးချိန်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->weight, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၄။မွေးဖွားရာဇာတိ'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->place_of_birth, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၅။ကျား/မ'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->gender->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၆။သွေးအုပ်စု '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->blood_type->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၇။ဖုန်းနံပါတ် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->phone, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၈။ရုံး '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText('ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၁၉။လက်ကိုင်ဖုန်း '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->mobile, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂၀။လက်ကိုင်ဖုန်း '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->mobile, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂၀။အီး‌မေးလ် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->email, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂၁။နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် '); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name .'/'. $staff->nrc_sign->name .'/'. $staff->nrc_code, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂၂။ယခုနေရပ်လိပ်စာအပြည့်အစုံ'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->current_address_street.'၊'.$staff->current_address_ward.'၊'.$staff->current_address_township_or_town->name.'၊'.$staff->current_address_region->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂၃။အမြဲတမ်းလက်ရှိနေရပ်လိပ်စာအပြည့်အစုံ'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->permanent_address_street.'၊'.$staff->permanent_address_ward.'၊'.$staff->permanent_address_township_or_town->name.'၊'.$staff->permanent_address_region->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂၄။ယခင်နေခဲ့ဖူးသော‌ဒေသနှင့်နေရပ်လိပ်စာအပြည့်အစုံ(တပ်မတော်သားဖြစ်က တပ်လိပ်စာဖော်ပြရန်မလို)'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->previous_addresses, ['align' => 'right']);
        
    $table->addRow();
    $table->addCell(4000)->addText('၁၈။ ပညာအရည်အချင်း');
    $table->addCell(2000)->addText('-', ['align' => 'center']);
    $table->addCell(5000)->addText('', ['align' => 'right']);

foreach ($staff->staff_educations as $education) {
    $table->addRow();
    $table->addCell(4000)->addText('', ['align' => 'center']);
    $table->addCell(2000)->addText('-', ['align' => 'center']);
    $table->addCell(5000)->addText($education->education->name . '၊', ['align' => 'right']);
}
        $table->addRow();
        $table->addCell(4000)->addText('၁။ တပ်မတော်သို့ ဝင်ခဲ့ဖူးလျှင်/တပ်မတော်သားဖြစ်လျှင်');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText('', ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(က) ကိုယ်ပိုင်အမှတ်');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_solider_no, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(ခ) တပ်သို့ဝင်သည့်နေ့');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_join_date, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(ဂ) ဗိုလ်လောင်းသင်တန်းအမှတ်စဥ်');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_dsa_no, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(ဃ) ပြန်တမ်းဝင်ဖြစ်သည့်နေ့');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_gazetted_date, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(င) တပ်ထွက်သည့်နေ့');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_leave_date, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(စ) ထွက်သည့်အကြောင်း');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_leave_reason, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(ဆ) အမှုထမ်းဆောင်ခဲ့သောတပ်များ');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_served_army, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(ဇ) တပ်တွင်းရာဇဝင်အကျဥ်း/ပြစ်မှု');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_brief_history_or_penalty, ['align' => 'right']);
        
        $table->addRow();
        $table->addCell(4000)->addText('(ဈ) အငြိမ်းစားလစာ');
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->military_pension, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၂။ကာယကံရှင်မွေးဖွားချိန်၌မိဘနှစ်ပါးသည်နိုင်ငံသားဟုတ်/မဟုတ်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->is_parents_citizen_when_staff_born, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၃။ဝန်ထမ်းအဖြစ်စတင်ခန့်အပ်သည့်နေ့'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->join_date, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၄။ဝန်ကြီးဌာန'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->ministry?->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၅။ဦးစီးဌာန'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၆။လစာဝင်ငွေ'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->payscale?->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၇။လက်ရှိအလုပ်အကိုင်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->current_rank->name, ['align' => 'right']);

        $table->addRow();
        $table->addCell(4000)->addText('၈။လက်ရှိရာထူးရသည့်နေ့'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->current_rank_date, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၉။ပြောင်းရွေ့သည့်မှတ်ချက်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->transfer_remark, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၀။တွဲဖက်အင်အား ဖြစ်လျှင်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->side_department?->name, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၁။လစာနှင့် စရိတ်ကျခံမည့်ဌာန'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->salary_paid_by, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၂။လက်ရှိ အလုပ်အကိုင်ရလာပုံ'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->is_newly_appointed, ['align' => 'right']);
        $table->addRow();
        $table->addCell(4000)->addText('၁၃။ပြိုင်အ‌‌ရွေးခံ(သို့)တိုက်ရိုက်ခန့်'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->is_direct_appointed, ['align' => 'right']);
       
       $section->addText('၁၄။'.'အလုပ်အကိုင်အတွက် ထောက်ခံသူများ', ['bold' => true]);
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
        $table->addCell(500)->addText($index+1);
        $table->addCell(2000)->addText($recommendation->recommend_by);
        $table->addCell(2000)->addText($recommendation->ministry);
        $table->addCell(2000)->addText($recommendation->department);
        $table->addCell(2000)->addText($recommendation->rank);
        $table->addCell(2000)->addText($recommendation->remark);
    }
       $section->addText('၁၅။'.'ယခင်လုပ်ကိုင်ဖူးသည့် အလုပ်အကိုင်', ['bold' => true]);
       $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
       $table->addRow();
       $table->addCell(2000)->addText('ရာထူး/အဆင့်', ['bold' => true]);
       $table->addCell(2000)->addText('တပ်/ဌာန', ['bold' => true]);
       $table->addCell(2000)->addText('နေရာ', ['bold' => true]);
       $table->addCell(2000)->addText('မှ', ['bold' => true]);
       $table->addCell(2000)->addText('ထိ', ['bold' => true]);
       foreach ($staff->postings as $posting) {
        $table->addRow();
        $table->addCell(2000)->addText($posting->rank->name ?? '-' );
        $table->addCell(2000)->addText($posting->department->name ?? '-');
        $table->addCell(2000)->addText($posting->location ?? '-');
        $table->addCell(2000)->addText($posting->from_date);
        $table->addCell(2000)->addText($posting->to_date );
    }
    $section->addText('မိဘဆွေမျိုးများ', ['bold' => true]);
    $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
    $table->addRow();
    $table->addCell(2000)->addText('အဘအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်', ['bold' => true]);
    $table->addCell(2000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ', ['bold' => true]);
    $table->addCell(2000)->addText('အမိအမည်၊လူမျိုး၊ကိုးကွယ်သည့်ဘာသာ အလုပ်အကိုင်', ['bold' => true]);
    $table->addCell(2000)->addText('၎င်း၏ နေရပ်လိပ်စာ အပြည့်အစုံ', ['bold' => true]);
     
     $table->addRow();
     $table->addCell(2000)->addText($staff->father_name.'၊'.$staff->father_ethnic?->name.'၊'.$staff->father_religion?->name.'၊'.$staff->father_place_of_birth.'၊'.$staff->father_occupation);
     $table->addCell(2000)->addText( $staff->father_address_street.'၊'.$staff->father_address_ward.'၊'.$staff->father_address_township_or_town?->name.'၊'.$staff->father_address_region?->name);
     $table->addCell(2000)->addText($staff->mother_name.'၊'.$staff->mother_ethnic?->name.'၊'.$staff->mother_religion?->name.'၊'.$staff->mother_place_of_birth.'၊'.$staff->mother_occupation);
     $table->addCell(2000)->addText($staff->mother_address_street.'၊'.$staff->mother_address_ward.'၊'.$staff->mother_address_township_or_town?->name.'၊'.$staff->mother_address_region?->name);

     $section->addText('၅။'.'ညီအကိုမောင်နှမများ', ['bold' => true]);
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
            $table->addCell(2000)->addText($sibling->name );
            $table->addCell(2000)->addText($sibling->ethnic?->name.'/'.$sibling->religion?->name );
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation );
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation->name ?? '');
           
        }
        $section->addText('၆။'.'အဘ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name.'/'.$staff->religion?->name);
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation?->name);
        }
        $section->addText('၇။'.'အမိ၏ညီအကိုမောင်နှမများ', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name );
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address);
            $table->addCell(2000)->addText($sibling->relation->name ?? '' );
        }
        $section->addText('၈။'.'ခင်ပွန်း၊ ဇနီးသည်', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($spouse->name);
            $table->addCell(2000)->addText($spouse->ethnic->name ?? ''.'/'.$spouse->religion->name ?? '');
            $table->addCell(2000)->addText($spouse->place_of_birth);
            $table->addCell(2000)->addText($spouse->occupation);
            $table->addCell(2000)->addText($spouse->address );
            $table->addCell(2000)->addText($spouse->relation?->name );
        }
        $section->addText('၉။'.'သားသမီးများ', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($child->name);
            $table->addCell(2000)->addText($child->ethnic?->name ?? ''.'/'.$child->religion?->name ?? '');
            $table->addCell(2000)->addText($child->place_of_birth);
            $table->addCell(2000)->addText($child->occupation);
            $table->addCell(2000)->addText($child->address );
            $table->addCell(2000)->addText($child->relation?->name );
        }
        $section->addText('၁၀။'.'ခင်ပွန်း/ဇနီးသည်၏ ညီအကိုမောင်နှမများ', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address );
            $table->addCell(2000)->addText($sibling->relation?->name );
        }
        $section->addText('၁၁။'.'ခင်ပွန်း/ဇနီးသည် အဘနှင့်ညီအကိုမောင်နှမများ', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address );
            $table->addCell(2000)->addText($sibling->relation?->name );
        }
        $section->addText('၁၂။'.'ခင်ပွန်း/ဇနီးသည် အမိနှင့်ညီအကိုမောင်နှမများ', ['bold' => true]);
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
            $table->addCell(1000)->addText($index+1);
            $table->addCell(2000)->addText($sibling->name);
            $table->addCell(2000)->addText($sibling->ethnic?->name ?? ''.'/'.$sibling->religion?->name ?? '');
            $table->addCell(2000)->addText($sibling->place_of_birth);
            $table->addCell(2000)->addText($sibling->occupation);
            $table->addCell(2000)->addText($sibling->address );
            $table->addCell(2000)->addText($sibling->relation?->name );
        }
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၁၃။မိမိနှင့်မိမိ၏ဇနီး(သို့မဟုတ်)ခင်ပွန်းတို့၏မိဘ၊ ညီအကိုမောင်နှမများ၊ သားသမီးများသည် နိုင်ငံရေးပါတီဝင်များတွင် ဝင်ရောက်ဆောင်ရွက်မှု ရှိ/မရှိ (ရှိက အသေးစိတ်ဖော်ပြရန်) :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->family_in_politics, ['align' => 'right']); 
        $section->addTitle('ငယ်စဥ်မှ ယခုအချိန်ထိ ကိုယ်ရေးရာဇဝင်', 2); 

        $section->addText('၁။'.'နေခဲ့ဖူးသောကျောင်းများ (ခုနှစ်၊ သက္ကရာဇ်ဖော်ပြရန်)', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('ရရှိခဲ့သော ဘွဲ့အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ကျောင်းအမည်', ['bold' => true]);
        $table->addCell(2000)->addText('မြို့', ['bold' => true]);
        $table->addCell(2000)->addText('ခုနှစ်', ['bold' => true]);
       
        foreach ($staff->schools as $school) {
            $table->addRow();
            $table->addCell(2000)->addText($school->education?->name);
            $table->addCell(2000)->addText( $school->school_name );
            $table->addCell(2000)->addText($school->town);
            $table->addCell(2000)->addText($school->year);
          
        }
        $section->addText('၂။'.'တက်ရောက်ခဲ့သော သင်တန်းများ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('သင်တန်းအမည်', ['bold' => true]);
        $table->addCell(2000)->addText('သင်တန်းကာလ(မှ)', ['bold' => true]);
        $table->addCell(2000)->addText('သင်တန်းကာလ(အထိ)', ['bold' => true]);
        $table->addCell(2000)->addText('သင်တန်းနေရာ/ဒေသ', ['bold' => true]);
       
        foreach ($staff->trainings as $training) {
            $table->addRow();
            $table->addCell(2000)->addText($training->training_type->name);
            $table->addCell(2000)->addText($training->from_date);
            $table->addCell(2000)->addText($training->to_date);
            $table->addCell(2000)->addText( $training->location );
          
        }
        $section->addText('၃။'.'ချီးမြှင့်ခံရသည့် ဘွဲ့ထူး/ဂုဏ်ထူးတံဆိပ်များ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('ဘွဲ့ထူး၊ ဂုဏ်ထူး တံဆိပ်အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('အမိန့်အမှတ်/ခုနှစ်', ['bold' => true]);
        foreach ($staff->awardings as $awarding) {
            $table->addRow();
            $table->addCell(2000)->addText($awarding->award_type->name ?? 'N/A' );
            $table->addCell(2000)->addText($awarding->order_no .'/'.$awarding->order_date); 
        }
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၄။နောက်ဆုံးအောင်မြင်ခဲ့သည့်ကျောင်း/အတန်း၊ ခုံအမှတ်၊ ဘာသာရပ်အတိအကျဖော်ပြရန် :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->last_school_name.'၊'.$staff->last_school_subject.'၊'.$staff->last_school_row_no.'၊'.$staff->last_school_major, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၅။ကျောင်းသားဘဝတွင် နိုင်ငံရေး/မြို့ရေး ဆောင်ရွက်မှုများနှင့်အဆင့်အတန်း၊ တာဝန် :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->student_life_political_social, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၆။ဝါသနာပါပြီး၊လေ့လာလိုက်စားခဲ့သောကျန်းမာရေးကစားခုန်စားမှုများ၊ အနုပညာဆိုင်ရာအတီးအမှုတ်များ၊ ပညာရေးစက်မှုလက်မှု :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->habit, ['align' => 'right']); 
        $section->addText('၇။'.'လုပ်ကိုင်ခဲ့သော အလုပ်အကိုင်များနှင့် ဌာန/မြို့နယ်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('အမည်', ['bold' => true]);
        $table->addCell(2000)->addText('ဦးစီးဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('ဝန်ကြီးဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('မှ', ['bold' => true]);
        $table->addCell(2000)->addText('အထိ', ['bold' => true]);
        $table->addCell(2000)->addText('မှတ်ချက်', ['bold' => true]);
       
       
        foreach ($staff->postings as $posting) {
            $table->addRow();
            $table->addCell(2000)->addText( $posting->staff->name ?? '');
            $table->addCell(2000)->addText($posting->department->name ?? ''); 
            $table->addCell(2000)->addText($posting->ministry->name ?? ''); 
            $table->addCell(2000)->addText($posting->from_date);
            $table->addCell(2000)->addText($posting->to_date); 
            $table->addCell(2000)->addText($posting->remark ); 
        }
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၈။တောခိုခဲ့ဖူးလျှင်(သို့)သောင်းကျန်းသူများကြီးစိုးသော နယ်မြေတွင် နေခဲ့ဖူးလျှင်လုပ်ကိုင်ဆောင်ရွက်ချက်များကိုဖော်ပြရန် :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->revolution, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၉။အလုပ်အကိုင် ပြောင်းရွှေ့ခဲ့သောအကြောင်းအကျိူးနှင့်လစာ :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->transfer_reason_salary, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၁၀။အမှုထမ်းနေစဥ်(သို့)ကိုယ်ပိုင်အလုပ်အကိုင်ဆောင်ရွက်နေစဥ်နိုင်ငံရေး၊ မြို့/ရွာရေး ဆောင်ရွက်မှုများ၊ဆောင်ရွက်နေစဥ် အသင်း အဆင့်အတန်းနှင့်တာဝန် :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->during_work_political_social, ['align' => 'right']); 
        $table->addRow();
        $table->addCell(4000)->addText('၁၁။စစ်ဘက်/ နယ်ဘက်/ ရဲဘက်နှင့်နိုင်ငံရေးဘက်တွင် ခင်မင်ရင်းနှီးသော မိတ်ဆွေများရှိ/ မရှိ :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->has_military_friend, ['align' => 'right']); 

       
        $section->addText('၁၂။'.'နိုင်ငံခြားသို့သွားရောက်ခဲ့ဖူးလျှင်', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('သွားရောက်ခဲ့သည့်နိုင်ငံ', ['bold' => true]);
        $table->addCell(2000)->addText('သွားရောက်ခဲ့သည့်အကြောင်း', ['bold' => true]);
        $table->addCell(2000)->addText('တွေ့ဆုံခဲ့သည့်ကုမ္ပဏီ၊ လူပုဂ္ဂိုလ်၊ ဌာန', ['bold' => true]);
        $table->addCell(2000)->addText('သွား၊ ပြန်သည့်နေ့', ['bold' => true]);
       
        foreach ($staff->abroads as $abroad) {
            $table->addRow();
            $table->addCell(2000)->addText($abroad->country->name ?? 'N/A');
            $table->addCell(2000)->addText($abroad->particular); 
            $table->addCell(2000)->addText($abroad->meet_with); 
            $table->addCell(2000)->addText($abroad->from_date.'-'.$abroad->to_date );  
        }

        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000)->addText('၁၃။မိမိနှင့်ခင်မင်ရင်းနှီးသော နိုင်ငံခြားသားရှိ/မရှိ၊ ရှိက မည်သည့် အလုပ်အကိုင်၊ လူမျိူး၊ တိုင်းပြည်၊ မည်ကဲ့သို့ ရင်းနှီးသည် :'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->foreigner_friend_name.'၊'.$staff->foreigner_friend_occupation.'၊'.$staff->foreigner_friend_nationality?->name.'၊'.$staff->foreigner_friend_country?->name.'၊'.$staff->foreigner_friend_how_to_know, ['align' => 'right']); 

        $table->addRow();
        $table->addCell(4000)->addText('၁၄။မိမိအား ထောက်ခံသည့်ပုဂ္ဂိုလ် (စစ်ဘက်/နယ်ဘက်အရာရှိ/ မြို့နယ်/ ကျေးရွာ/ ရပ်ကွက်အုပ်ချုပ်ရေးမှူး):'); 
        $table->addCell(2000)->addText('-', ['align' => 'center']);
        $table->addCell(5000)->addText($staff->recommended_by_military_person, ['align' => 'right']); 

        $section->addText('၁၅။'.'ရာဇဝတ်ပြစ်မှုခံရခြင်း ရှိ/မရှိ', ['bold' => true]);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 80]);
        $table->addRow();
        $table->addCell(2000)->addText('ပြစ်ဒဏ်', ['bold' => true]);
        $table->addCell(2000)->addText('ပြစ်ဒဏ်ချမှတ်ခံရသည့်အကြောင်းအရင်း', ['bold' => true]);
        $table->addCell(2000)->addText('မှ', ['bold' => true]);
        $table->addCell(2000)->addText('ထိ', ['bold' => true]);
        foreach ($staff->punishments as $punishment) {
            $table->addRow();
            $table->addCell(2000)->addText($punishment->penalty_type->name ?? 'N/A');
            $table->addCell(2000)->addText($punishment->reason); 
            $table->addCell(2000)->addText($punishment->from_date); 
            $table->addCell(2000)->addText($punishment->to_date ); 
        }
       
       $section->addText('အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။', ['bold' => true]);
       $section->addText('လက်မှတ်: -', ['align' => 'center']);
       $section->addText('ကိုယ်ပိုင်အမှတ်(သို့မဟုတ်): -', ['align' => 'center']);
       $section->addText('နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်: -', ['align' => 'center']);
       $section->addText('အဆင့်/ရာထူ: ', ['align' => 'center']);
       $section->addText('အမည်: ', ['align' => 'center']);
       $section->addText('တပ်/ဌာန: ', ['align' => 'center']);
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
        $staff=Staff::where('id',$this->staff_id)->first();
        return view('livewire.pdf-staff-report68', [
            'staff' => $staff,
           
            
        ]);
    }
}
