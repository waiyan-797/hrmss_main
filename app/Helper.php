<?php

use App\Models\Country;

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
