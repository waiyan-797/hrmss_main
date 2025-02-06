<?php

namespace App\Livewire\PensionList;

use App\Models\Staff;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;

class PensionList extends Component
{

    public $staffs;
    public $nameSearch;
    public function go_pdf()
    {
        $staffs = Staff::get();
        $data = [
            'staffs' => $staffs,
        ];
        $pdf = PDF::loadView('pdf_reports.pension_list_report', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'pension_list_report_pdf.pdf');
    }

    public function go_word()
    {
        $staffQuery = Staff::query()
        ->where('retire_type_id', 5); 
        $this->staffs = $staffQuery->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'pageSizeW'    => Converter::inchToTwip(14),  
            'pageSizeH'    => Converter::inchToTwip(8.5), 
            'orientation'  => 'landscape',
            'marginTop'    => Converter::inchToTwip(0.5),
            'marginBottom' => Converter::inchToTwip(0.5),
            'marginLeft'   => Converter::inchToTwip(1),
            'marginRight'  => Converter::inchToTwip(0.6),
        ]);
        $phpWord->setDefaultFontSize(11); 
        $section->addText('ရင်းနှီးမြှပ်နှံမှုနှင့်ကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန', ['bold' => true, 'size' => 11], ['align' => 'center']);
        $section->addText('ပင်စင်ခံစားခဲ့သူများစာရင်း', ['bold' => true, 'size' => 11], ['align' => 'center']);
        $table = $section->addTable(['borderSize' => 6, 'cellMargin' => 4]);
        $pStyle_1 = ['align' => 'center', 'spaceAfter' => 350, 'spaceBefore' => 350];
        $pStyle_2 = ['align' => 'center', 'spaceAfter' => 300, 'spaceBefore' => 300];
        $pStyle_3 = ['align' => 'center', 'spaceAfter' => 100, 'spaceBefore' => 100];
        $table->addRow(50, ['tblHeader' => true]);
        $table->addCell(1000)->addText('စဉ်',['bold' => true], $pStyle_1);
        $table->addCell(2000)->addText('အမည်', ['bold' => true],$pStyle_1);
        $table->addCell(3000)->addText("တာဝန်ထမ်း\nဆောင်ခဲ့သည့်\nရာထူး", ['bold' => true],$pStyle_2);
        $table->addCell(4000)->addText("တာဝန်ထမ်းဆောင်ခဲ့\nသည့်ဌာနခွဲ", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText('မွေးနေ့သက္ကရာဇ်', ['bold' => true],$pStyle_2);
        $table->addCell(2000)->addText("စုစုပေါင်း\nလုပ်သက်", ['bold' => true],$pStyle_2);
        $textContent_1 = "ပင်စင်\nအမျိုးအစား";
        $table->addCell(3000, ['vMerge' => 'restart'])->addText($textContent_1, ['bold' => true], $pStyle_2);
       
        $textContent_2 = "ပင်စင်ခံစား\nသည့်ရက်စွဲ";
        $table->addCell(3000, ['vMerge' => 'restart'])->addText($textContent_2, ['bold' => true], $pStyle_2);
        $table->addCell(2000)->addText('ပင်စင်လစာ', ['bold' => true],$pStyle_2);
        $table->addCell(2000)->addText('ဆုငွေ', ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("ထုတ်ယူသည့်\nဘဏ်", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("ပင်စင်ရုံး၏\nခွင့်ပြုမိန့်", ['bold' => true],$pStyle_2);
        $table->addCell(3000)->addText("ဆက်သွယ်\nရန်လိပ်စာ\nတယ်လီ\nဖုန်းနံပါတ်", ['bold' => true],$pStyle_3);
        // Add table rows
        foreach ( $this->staffs as $index => $staff) {
            $table->addRow();
            $table->addCell(1000)->addText(en2mm($index + 1),null,$pStyle_1);
            $table->addCell(2000)->addText($staff->name,null,$pStyle_1);
            $table->addCell(3000)->addText($staff->postings->sortByDesc('to_date')->first()?->rank?->name,null,$pStyle_2);
            $table->addCell(4000)->addText($staff->postings->sortByDesc('to_date')->first()?->division?->name,null,$pStyle_2);

            $table->addCell(3000)->addText(en2mm(formatDMYmm($staff->dob)),null,$pStyle_2);

            $currentDate = \Carbon\Carbon::now();
            $rankDate = \Carbon\Carbon::parse($staff->current_rank_date);
            $diff = $rankDate->diff($currentDate);
            $duration = ($diff->y > 0 ? en2mm($diff->y) . ' နှစ် ' : '') .
                ($diff->m > 0 ? en2mm($diff->m) . ' လ ' : '') .
                ($diff->d > 0 ? en2mm($diff->d) . ' ရက်' : '');
            $table->addCell(2000)->addText($duration,null,$pStyle_2);

            $table->addCell(3000)->addText($staff->pension_type->name ?? '',null,$pStyle_1);
            $table->addCell(3000)->addText(formatDMYmm($staff->retire_date),null,$pStyle_2);
            $table->addCell(2000)->addText(en2mm($staff->pension_salary),null,$pStyle_2);
            $table->addCell(2000)->addText(en2mm($staff->gratuity),null,$pStyle_2);
            $table->addCell(3000)->addText($staff->pension_bank,null,$pStyle_2);
            $table->addCell(3000)->addText($staff->pension_office_order,null,$pStyle_2);
            $table->addCell(3000)->addText($staff->permanent_address_ward . '၊' .
                $staff->permanent_address_street . '၊' .
                $staff->permanent_address_township_or_town->name . '၊' .
                $staff->permanent_address_region->name . '၊' .
                $staff->phone,null,$pStyle_3);
        }
        $fileName = 'P03.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        return response()->stream(function () use ($objWriter) {
            $objWriter->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
    public function render()
{
    $staffQuery = Staff::query()
        ->where('retire_type_id', 5); 

    if ($this->nameSearch) {
        $staffQuery->where('name', 'like', '%' . $this->nameSearch . '%');
    }

    $this->staffs = $staffQuery->get();

    return view('livewire.pension-list.pension-list', [
        'staffs' => $this->staffs,
    ]);
}

}
