<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Tab;


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
        // $pdf = PDF::loadView('pdf_reports.staff_report_15', $data, [], [    
        //     'format' => 'A4',               // Set paper size
        //     'orientation' => 'P',           // Portrait orientation
        //     'margin_left' => 25.4,          // 1 inch = 25.4 mm
        //     'margin_right' => 12.7,         // 0.5 inches = 12.7 mm
        //     'margin_top' => 12.7,           // 0.5 inches = 12.7 mm
        //     'margin_bottom' => 12.7         // 0.5 inches = 12.7 mm
        // ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_15.pdf');
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
        $footer = $section->addFooter();
        $footer->addText('လျှို့ဝှက်',null,array('align'=>'center', 'spaceBefore' => 200));
        $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 13], ['alignment' => 'center']);
        $section->addTitle('ကိုယ်‌ရေးမှတ်တမ်း', 1);
         $textBoxStyle = [
        'width' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        'height' => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
        // 'borderColor' => 'FFFFFF', // Set to white for no visible border
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
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('၁။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->name, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၂။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အသက်(မွေးနေ့သက္ကရာဇ်)', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(formatDMYmm($staff->dob), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၃။', null, ['align' => 'center']);
        $table->addCell(15000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '၊' . ($staff->religion_id ? $staff->religion->name : '-'), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၄။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမျိုးသားမှတ်ပုံတင်အမှတ်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၅။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်နှင့် ဌာန', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->current_rank->name . '၊' . $staff->current_department->name, null, ['alignment' => 'both']);

        $joinDate = \Carbon\Carbon::parse($staff->join_date);
        $joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
        $table->addRow();
        $table->addCell(2000)->addText('၆။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမှုထမ်းလုပ်သက်၊ဝင်ရောက်သည့်ရက်စွဲ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText(formatPeriodMM($joinDateDuration->y, $joinDateDuration->m, $joinDateDuration->d) . ', ' . formatDMYmm($joinDate), null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၇။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText(' လက်ရှိနေရပ်လိပ်စာ', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText($staff->current_address_street . '၊' . $staff->current_address_ward . '၊' .$staff->current_address_township_or_town->name.'၊'. $staff->current_address_region->name, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၈။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('ပညာအရည်အချင်း', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText('', null, ['alignment' => 'both']);

        foreach ($staff->staff_educations as $education) {
            $table->addRow();
            $table->addCell(2000)->addText();
            $table->addCell(15000)->addText('', ['alignment' => 'center']);
            $table->addCell(1000)->addText();
            $table->addCell(16000)->addText( $education->education->name . '၊', ['alignment' => 'both']);
        }
        $table->addRow();
        $table->addCell(2000)->addText('၉။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အဖအမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->father_name, null, ['alignment' => 'both']);

        $table->addRow();
        $table->addCell(2000)->addText('၁၀။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->father_occupation, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၁။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အမိအမည်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mother_name, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၂။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('အလုပ်အကိုင်', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['alignment' => 'center']);
        $table->addCell(16000)->addText($staff->mother_occupation, null, ['alignment' => 'both']);
        $table->addRow();
        $table->addCell(2000)->addText('၁၃။', null, ['alignment' => 'center']);
        $table->addCell(15000)->addText('နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ(အကြိမ်အရေအတွက်)', null, ['alignment' => 'both']);
        $table->addCell(1000)->addText('-', null, ['align' => 'center']);
        $table->addCell(16000)->addText(en2mm($staff->abroads->count()), null, ['alignment' => 'both']);
       
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 500];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 500];
        $pStyle_4 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $pStyle_5 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $section->addPageBreak();
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(14000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ', ['bold' => true], $pStyle_1);
        $textContent_1 = "နောက်ဆုံး\nသွားရောက်\nခဲ့သည့်\n(၅)နိုင်ငံ";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_2);

        $table->addCell(6000, ['vMerge' => 'restart'])->addText("သွားရောက်\nသည့်ကိစ္စ", ['bold' => true], $pStyle_3);

        $textContent_2 = "သင်တန်းတက်\nခြင်းဖြစ်လျှင် \nအကြိမ်မည်မျှဖြင့်\nအောင်မြင်သည်";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_2, ['bold' => true], $pStyle_4);
        $textContent_3 = "မည်သည့်အစိုးရ\n အဖွဲ့အစည်း\nအထောက်အပံ့ဖြင့်\nသွားရောက်သည်";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_3, ['bold' => true], $pStyle_5);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(7000)->addText('မှ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(7000)->addText('ထိ', ['bold' => true], ['alignment' => 'center']);
        $table->addCell(6000, ['vMerge' => 'continue']);
        $table->addCell(6000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $table->addCell(8000, ['vMerge' => 'continue']);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        if ($staff->abroads->isNotEmpty()) {
            foreach ($staff->abroads as $abroad) {
                $table->addRow();
                $table->addCell(7000)->addText(formatDMYmm($abroad->from_date));
                $table->addCell(7000)->addText(formatDMYmm($abroad->to_date));
                $table->addCell(6000)->addText($abroad->country?->name,null,$pStyle_1);
                $table->addCell(6000)->addText($abroad->particular,null,$pStyle_1);
                $table->addCell(8000)->addText($abroad->training_success_count,null,$pStyle_1);
                $table->addCell(8000)->addText($abroad->sponser,null,$pStyle_1);
            }
        } else {
            $table->addRow();
            $table->addCell(7000)->addText();
            $table->addCell(7000)->addText();
            $table->addCell(6000)->addText();
            $table->addCell(6000)->addText();
            $table->addCell(8000)->addText();
            $table->addCell(8000)->addText();
        }
        $section->addText('၁၄။' . 'ဇနီး/ခင်ပွန်း');
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $table->addRow();
        $textContent_1= "အမည်\n(အခြားအမည်များ\nရှိလျှင်လည်း\nဖော်ပြရန်)";
        $table->addCell(8000, ['vMerge' => 'restart'])->addText($textContent_3, ['bold' => true], $pStyle_1);
        $table->addCell(6000)->addText('လူမျိုး/နိုင်ငံသား', ['bold' => true], $pStyle_1);
        $table->addCell(5000)->addText('အလုပ်အကိုင်နှင့်ဌာန', ['bold' => true], $pStyle_1);
        $table->addCell(4000)->addText('နေရပ်', ['bold' => true], $pStyle_1);

        if ($staff->spouses->isNotEmpty()) {
            foreach ($staff->spouses as $spouse) {
                $table->addRow();
                $table->addCell(8000,['valign' => 'center'])->addText($spouse->name,null,$pStyle_1);
                $table->addCell(6000,['valign' => 'center'])->addText($spouse->ethnic->name . '/' . $spouse->religion->name,null,$pStyle_1);
                $table->addCell(5000,['valign' => 'center'])->addText($spouse->occupation,null,$pStyle_1);
                $table->addCell(4000,['valign' => 'center'])->addText($spouse->address,null,$pStyle_1);
            }
        } else {
            $table->addRow();
            $table->addCell(8000)->addText();
            $table->addCell(6000)->addText();
            $table->addCell(5000)->addText();
            $table->addCell(4000)->addText();
        }
        $section->addText('၁၅။ အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။');
        $tableStyle = [
            'alignment' => Jc::END,
        ];

        $table = $section->addTable($tableStyle);
        $table->addRow();
        $table->addCell()->addText('လက်မှတ်', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText('', ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('အမည်', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->name, ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('အဆင့်', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->currentRank->name, ['alignment' => 'right']);

        $table->addRow();
        $table->addCell()->addText('တပ်/ဌာန', ['alignment' => 'right']);
        $table->addCell(500)->addText('-', ['alignment' => 'right']);
        $table->addCell(3000)->addText($staff->current_department->name, ['alignment' => 'right']);

        $section->addText('ရက်စွဲ ' . mmDateFormatYearMonthDay(\Carbon\Carbon::now()->year, \Carbon\Carbon::now()->month, en2mm(\Carbon\Carbon::now()->day)), ['align' => 'center']);
        
        $fileName = 'staff_report_15_' . $staff->id . '.docx';
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
        return view('livewire.pdf-staff-report15', [
            'staff' => $staff,
        ]);
    }
}
