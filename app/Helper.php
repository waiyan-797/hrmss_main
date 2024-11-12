<?php

use App\Models\Country;
use App\Models\Leave;
use App\Models\Salary;

if (! function_exists('getcsv')) {
    function getcsv($f)
    {
        $fp = fopen($f, 'r');
        $lines = [];

        while (!feof($fp) && ($line = fgetcsv($fp)) !== false) {
            $lines[] = $line;
        }

        fclose($fp);

        return $lines;
    }
}

if (! function_exists('en2mm')) {
    function en2mm($content)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $my = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($en, $my, (string) $content);
    }
}

if (! function_exists('formatPeriodMM')) {
    function formatPeriodMM($year = 0, $month = 0, $day = 0)
    {
        $units = ['နှစ်', 'လ', 'ရက်'];

        return collect([$year, $month, $day])->map(fn($c, $i) => ($c ? en2mm($c) . ' ' . $units[$i] : ''))->join(' ');
    }
}

if (! function_exists('formatDMY')) {
    function formatDMY($date)
    {
        
        if($date){
            $formatted_date = Carbon\Carbon::parse($date)->format('d-m-y');
        
            return $formatted_date;
        }
        else{
            return '';
        }
   
    }
}

if (! function_exists('dateDiff')) {
    function dateDiff($from_date, $to_date)
    {
        $diff = Carbon\Carbon::parse($from_date)->diff(Carbon\Carbon::parse($to_date));
        return $diff;
    }
}

if (! function_exists('dateDiffYMD')) {
    function dateDiffYMD($from_date, $to_date)
    {
        $diff = Carbon\Carbon::parse($from_date)->diff(Carbon\Carbon::parse($to_date));
        $diff_year = $diff->y ? en2mm($diff->y).' နှစ် ' : '';
        $diff_month = $diff->m ? en2mm($diff->m).' လ ' : '';
        $diff_day = $diff->d ? en2mm($diff->d).' ရက် ' : '';
        $diffYMD = "{$diff_year} {$diff_month} {$diff_day}";
        return $diffYMD  ;
    }
}

if (!function_exists('mmDateFormat')) {
    function mmDateFormat($year, $month)
    {
        // Array of Myanmar month names
        $monthsInMyanmar = [
            1 => 'ဇန်နဝါရီ',
            2 => 'ဖေဖော်ဝါရီ',
            3 => 'မတ်',
            //
            4 => 'ဧပြီ',
            5 => 'မေ',
            6 => 'ဇွန်',
            7 => 'ဇူလိုင်',
            8 => 'ဩဂုတ်',
            9 => 'စက်တင်ဘာ',
            10 => 'အောက်တိုဘာ',
            11 => 'နိုဝင်ဘာ',
            12 => 'ဒီဇင်ဘာ',
        ];

        $month = intval($month);
        if ($month < 1 || $month > 12) {
            return 'Invalid month. Please provide a month between 1 and 12.';
        }

        // Get the Myanmar month name
        $myanmarMonth = $monthsInMyanmar[$month];

        // Return formatted date

        $year = en2mm($year);
        return "$year $myanmarMonth  ";
    }

    if (!function_exists('getCountryNameById')) {
        function getCountryNameById($id)
        {
            return Country::where('id', $id)->first()->name;
        }
    }
}
if (!function_exists('financeYear')) {

    function financeYear()
    {
        return [
            [
                4,
                5,
                6,
                7,
                8,
                9,
                10,
                11,
                12
            ],
            [
                1,
                2,
                3
            ]

        ];
    }
}

function getSalary($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('current_salary');
}


function getAddition($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('addition');
}


function getDeductionInsurance($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('deduction_insurance');
}



function getLeveTypeOne($month, $year)
{

    return    Leave::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('leave_type_id', 1)
        ->count();
}


function getLeveTypeTwo($month, $year)
{

    return    Leave::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('leave_type_id', 2)
        ->count();
}


function getDeductionTax($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('deduction_tax');
}



function getNetActualSalary($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('actual_salary');
}



function get2monthDeduction($month, $year)
{

    return    Salary::whereYear('salary_month', $year)
        ->whereMonth('salary_month', $month)

        ->sum('deduction');
}


