<?php

namespace App\Livewire;

use App\Models\Staff;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\Mpdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Tab;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Style\Font;
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
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'staff_pdf_15.pdf');
    }
//     public function go_pdf($staff_id)
// {
//     $staff = Staff::findOrFail($staff_id);
    
//     // Create Word Document
//     $phpWord = new PhpWord();
//     $fontStyle = ['name' => 'Pyidaungsu', 'size' => 13];

//     // Register Pyidaungsu Font
//     $phpWord->addFontStyle('pyidaungsuStyle', $fontStyle);

//     $section = $phpWord->addSection();
//     $section->addText("Staff Name: " . $staff->name, 'pyidaungsuStyle');

//     // Save Word File
//     $wordFilePath = storage_path('app/public/staff_report.docx');
//     $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
//     $wordWriter->save($wordFilePath);

//     Settings::setPdfRendererPath(base_path('vendor/tecnickcom/tcpdf'));
//     Settings::setPdfRendererName(Settings::PDF_RENDERER_TCPDF);
//     // Settings::setPdfRendererName(Settings::PDF_RENDERER_MPDF);
//     // Settings::setPdfRendererPath(base_path('vendor/mpdf/mpdf'));

//     // Load Word File & Convert to PDF
//     $phpWord = IOFactory::load($wordFilePath);
//     $pdfFilePath = storage_path('app/public/staff_report.pdf');
//     $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
//     $pdfWriter->save($pdfFilePath);

//     return response()->download($pdfFilePath);
// }

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
        $table->addCell(1300)->addText('၁။', null,$pStyle_5);
        $table->addCell(13000)->addText('အမည်', null, $pStyle_8);
        $table->addCell(700)->addText('-',$pStyle_5);
        $table->addCell(13000)->addText($staff->name, null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၂။', null,$pStyle_5);
        $table->addCell(13000)->addText('အသက်(မွေးနေ့သက္ကရာဇ်)', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(formatDMYmm($staff->dob), null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၃။', null, $pStyle_5);
        $table->addCell(13000)->addText('လူမျိုး/ ကိုးကွယ်သည့်ဘာသာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(($staff->ethnic_id ? $staff->ethnic->name : '-') . '၊' . ($staff->religion_id ? $staff->religion->name : '-'), null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၄။', null,$pStyle_5);
        $table->addCell(13000)->addText('အမျိုးသားမှတ်ပုံတင်အမှတ်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->nrc_region_id->name . $staff->nrc_township_code->name . $staff->nrc_sign->name . $staff->nrc_code, null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၅။', null,$pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင်နှင့် ဌာန', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->current_rank->name . "\n" . $staff->current_department->name.'၊'.'ရင်းနှီးမြှုပ်နှံမှုနှင့်နိုင်ငံခြားစီးပွားဆက်သွယ်ရေးဝန်ကြီးဌာန', null, $pStyle_8);

        $joinDate = \Carbon\Carbon::parse($staff->join_date);
        $joinDateDuration = $joinDate->diff(\Carbon\Carbon::now());
        $table->addRow();
        $table->addCell(1300)->addText('၆။', null,$pStyle_5);
        $table->addCell(13000)->addText('အမှုထမ်းလုပ်သက်(ဝင်ရောက်သည့်နေ့စွဲ)', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText(formatPeriodMM($joinDateDuration->y, $joinDateDuration->m) . ', ' . formatDMYmm($joinDate), null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၇။', null,$pStyle_5);
        $table->addCell(13000)->addText(' လက်ရှိနေရပ်လိပ်စာ', null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText($staff->current_address_house_no.$staff->current_address_street . '၊' . $staff->current_address_ward . '၊' .$staff->current_address_township_or_town->name.'မြို့နယ်'.'၊'. $staff->current_address_region->name.'ဒေသကြီး။', null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၈။', null,$pStyle_5);
        $table->addCell(13000)->addText('ပညာအရည်အချင်း', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $educationNames = $staff->staff_educations->map(fn($edu) => $edu->education?->name)->implode(', ');
        $table->addCell(13000)->addText($educationNames, null,$pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၉။', null,$pStyle_5);
        $table->addCell(13000)->addText('အဖအမည်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->father_name, null, $pStyle_8);

        $table->addRow();
        $table->addCell(1300)->addText('၁၀။', null,$pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->father_occupation, null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၁။', null,$pStyle_5);
        $table->addCell(13000)->addText('အမိအမည်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->mother_name, null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၂။', null,$pStyle_5);
        $table->addCell(13000)->addText('အလုပ်အကိုင်', null, $pStyle_8);
        $table->addCell(700)->addText('-', null,$pStyle_5);
        $table->addCell(13000)->addText($staff->mother_occupation, null, $pStyle_8);
        $table->addRow();
        $table->addCell(1300)->addText('၁၃။', null,$pStyle_5);
        $table->addCell(13000)->addText("နိုင်ငံခြားသွားရောက်ဖူးခြင်းရှိ/မရှိ\n(အကြိမ်အရေအတွက်)", null, $pStyle_8);
        $table->addCell(700)->addText('-', null, $pStyle_5);
        $table->addCell(13000)->addText(
            $staff->abroads->count() > 0 ? en2mm($staff->abroads->count().'ကြိမ်') : 'မရှိပါ',
            null,
            $pStyle_8
        );
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 30, 'spaceBefore' => 30];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 500];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 500];
        $pStyle_4 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $pStyle_5 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $section->addTextBreak();
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(14000, ['gridSpan' => 2, 'valign' => 'center'])->addText('ကာလ', ['bold' => true], $pStyle_3);
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
            $latestAbroads = $staff->abroads
            ? $staff->abroads->sortByDesc('to_date')->take(5)
            : collect();
            foreach ($latestAbroads as $abroad) {
                $table->addRow();
                $table->addCell(7000)->addText(formatDMYmm($abroad->from_date),null,$pStyle_1);
                $table->addCell(7000)->addText(formatDMYmm($abroad->to_date),null,$pStyle_1);
                $table->addCell(6000)->addText($abroad->countries->pluck('name')->unique()->join(', '),null,$pStyle_1);
                $table->addCell(6000)->addText($abroad->particular,null,$pStyle_1);
                $table->addCell(8000)->addText($abroad->training_success_count,null,$pStyle_1);
                $table->addCell(8000)->addText($abroad->sponser,null,$pStyle_1);
            }
        } else {
            $table->addRow();
            $cell = $table->addCell(42000, ['gridSpan' => 6]); 
            $cell->addText(
                'မရှိပါ',
               null,
                ['alignment' => 'center']
            );
        }
        $section->addTextBreak();
        // $section->addText('၁၄။' . 'ဇနီး/ခင်ပွန်း');
        $section->addText('၁၄။ '.' ဇနီး/ခင်ပွန်း', ['bold' => true], array('spaceBefore' => 200));
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 200, 'spaceBefore' => 200];
        $table->addRow(50, ['tblHeader' => true]);
        $textContent_1 = "အမည်\n(အခြားအမည်များ\nရှိလျှင်လည်း\nဖော်ပြရန်)";
        $table->addCell(6000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_3);
        $table->addCell(5000)->addText('လူမျိုး/နိုင်ငံသား', ['bold' => true], $pStyle_3);
        $table->addCell(5000)->addText('အလုပ်အကိုင်နှင့်ဌာန', ['bold' => true], $pStyle_3);
        $table->addCell(4000)->addText('နေရပ်', ['bold' => true], $pStyle_3);
        $table->addCell(2500)->addText('မှတ်ချက်', ['bold' => true], $pStyle_3);

        if ($staff->spouses->isNotEmpty()) {
            foreach ($staff->spouses as $spouse) {
                $table->addRow();
                $table->addCell(6000,['valign' => 'center'])->addText($spouse->name,null,$pStyle_1);
                $table->addCell(5000,['valign' => 'center'])->addText($spouse->ethnic->name . '/' . $spouse->religion->name,null,$pStyle_1);
                $table->addCell(5000,['valign' => 'center'])->addText($spouse->occupation,null,$pStyle_1);
                $table->addCell(4000,['valign' => 'center'])->addText($spouse->address,null,$pStyle_1);
                $table->addCell(2500,['valign' => 'center'])->addText('',null,$pStyle_1);
            }
        } else {
            $table->addRow();
            $cell = $table->addCell(22500, ['gridSpan' => 4]); 
            $cell->addText(
                'မရှိပါ',
               null,
                ['alignment' => 'center']
            );
        }
        $section->addText('၁၅။ အထက်ပါဇယားကွက်များတွင် ဖြည့်စွက်ရေးသွင်းထားသော အကြောင်းအရာများအား မှန်ကန်ကြောင်း တာဝန်ခံလက်မှတ်ရေးထိုးပါသည်။');
        $tableStyle = [
            'alignment' => Jc::END,
        ];
        $table = $section->addTable($tableStyle);
        $table->addRow(50);
        $table->addCell(2100)->addText('လက်မှတ်', ['alignment' => 'right']);
        $table->addCell(300)->addText('-', ['alignment' => 'right']);
        $table->addCell(2100)->addText('', ['alignment' => 'right']);
        $table->addRow(50);
        $table->addCell(2100)->addText('အမည်', ['alignment' => 'right']);
        $table->addCell(300)->addText('-', ['alignment' => 'right']);
        $table->addCell(2100)->addText($staff->name, ['alignment' => 'right']);
        $table->addRow(50);
        $table->addCell(2100)->addText('အဆင့်', ['alignment' => 'right']);
        $table->addCell(300)->addText('-', ['alignment' => 'right']);
        $table->addCell(2100)->addText($staff->currentRank->name, ['alignment' => 'right']);
        $table->addRow(50);
        $table->addCell(2100)->addText('တပ်/ဌာန', ['alignment' => 'right']);
        $table->addCell(300)->addText('-', ['alignment' => 'right']);
        $table->addCell(2100)->addText($staff->current_department->name, ['alignment' => 'right']);
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
