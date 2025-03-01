<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Country::truncate();
        // Schema::enableForeignKeyConstraints();

        // $all = getcsv(__DIR__.'/countries.csv');
        // foreach ($all as [$result]) {
        //     Country::firstOrCreate(['name' => $result]);
        // }
        Schema::disableForeignKeyConstraints();
        Country::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
           
    [1, 'အာဖဂန်နစ္စတန်'], // Afghanistan
    [2, 'အယ်လ်ဘေးနီးယား'], // Albania
    [3, 'အယ်လ်ဂျီးရီးယား'], // Algeria
    [4, 'အန်ဒိုရာ'], // Andorra
    [5, 'အန်ဂိုလာ'], // Angola
    [6, 'အန်တီဂွါနှင့်ဘာဘူဒါ'], // Antigua and Barbuda
    [7, 'အာဂျင်တီးနား'], // Argentina
    [8, 'အာမေးနီးယား'], // Armenia
    [9, 'ဩစတြေးလျ'], // Australia
    [10, 'ဩစတြီးယား'], // Austria
    [11, 'အာဇာဘိုင်ဂျန်'], // Azerbaijan
    [12, 'ဘဟားမား'], // Bahamas
    [13, 'ဘဟရိန်း'], // Bahrain
    [14, 'ဘင်္ဂလားဒေ့ရှ်'], // Bangladesh
    [15, 'ဘာဘေးဒိုးစ်'], // Barbados
    [16, 'ဘီလာရုစ်'], // Belarus
    [17, 'ဘယ်လ်ဂျီယမ်'], // Belgium
    [18, 'ဘေလီဇ်'], // Belize
    [19, 'ဘီနင်'], // Benin
    [20, 'ဘူတန်'], // Bhutan
    [21, 'ဘိုလီးဘီယား'], // Bolivia
    [22, 'ဘော့စ်နီးယားနှင့်ဟာဇီဂိုဗီးနီးယား'], // Bosnia and Herzegovina
    [23, 'ဘော့စ်ဝါနာ'], // Botswana
    [24, 'ဘရာဇီး'], // Brazil
    [25, 'ဘရူနိုင်း'], // Brunei
    [26, 'ဘူဂေးရီးယား'], //
    [27, 'ဘာကီနာဖာဆို'], // Burkina Faso
    [28, 'မြန်မာ'], // Burma / Myanmar
    [29, 'ဘူရွန်ဒီ'], // Burundi
    [30, 'ကမ္ဘောဒီးယား'], // Cambodia
    [31, 'ကင်မရွန်း'], // Cameroon
    [32, 'ကနေဒါ'], // Canada
    [33, 'ကိတ်ဗာဒေး'], // Cape Verde
    [34, 'အလယ်ပိုင်းအာဖရိကသမ္မတနိုင်ငံ'], // Central African Republic
    [35, 'ချဒ်'], // Chad
    [36, 'ချီလီ'], // Chile
    [37, 'တရုတ်'], // China
    [38, 'ကိုလံဘီယာ'], // Colombia
    [39, 'ကိုမိုရိုစ်'], // Comoros
    [40, 'ကိုစတာရီကာ'], // Costa Rica
    [41, 'ခရိုအေးရှား'], // Croatia
    [42, 'ကျူးဗား'], // Cuba
    [43, 'ဆိုက်ပရပ်စ်'], // Cyprus
    [44, 'ချက် သမ္မတနိုင်ငံ'], // Czech Republic
    [45, 'ဒီမိုကရက်တစ် ကွန်ဂို သမ္မတနိုင်ငံ'], // Democratic Republic of Congo
    [46, 'ဒိန်းမတ်'], // Denmark
    [47, 'ဂျီဘူတီ'], // Djibouti
    [48, 'ဒိုမီနီကာ'], // Dominica
    [49, 'ဒိုမီနီကန်သမ္မတနိုင်ငံ'], // Dominican Republic
    [50, 'အရှေ့တီမော'], // East Timor
    [51, 'အီကွေဒေါ'], // Ecuador
    [52, 'အီဂျစ်'], // Egypt
    [53, 'အယ်လ်ဆာဗေးဒေါ'], // El Salvador
    [54, 'အီကွေတာ ဂီနီ'], // Equatorial Guinea
    [55, 'အီရီထရီးယား'], // Eritrea
    [56, 'အက်စတိုးနီးယား'], // Estonia
    [57, 'အီသီယိုးပီးယား'], // Ethiopia
    [58, 'ဖီဂျီ'], // Fiji
    [59, 'ဖင်လန်'], // Finland
    [60, 'ပြင်သစ်'], // France
    [61, 'ဂါဘွန်'], // Gabon
    [62, 'ဂမ်ဘီယာ'], // Gambia
    [63, 'ဂျော်ဂျီယာ'], // Georgia
    [64, 'ဂျာမနီ'], // Germany
    [65, 'ဂါနာ'], // Ghana
    [66, 'ဂရိ'], // Greece
    [67, 'ဂရီနေဒါ'], // Grenada
    [68, 'ဂွါတီမာလာ'], // Guatemala
    [69, 'ဂီနီ'], // Guinea
    [70, 'ဂီနီ-ဘီစော်'], // Guinea
    [71, 'ဂိုင်ယာနာ'], // Guyana
    [72, 'ဟေတီ'], // Haiti
    [73, 'ဟွန်ဒူးရပ်စ်'], // Honduras
    [74, 'ဟန်ဂေရီ'], // Hungary
    [75, 'ဟောင်ကောင်'], // Hungary
    [76, 'အိုက်စလန်'], // Iceland
    [77, 'အိန္ဒိယ'], // India
    [78, 'အင်ဒိုနီးရှား'], // Indonesia
    [79, 'အီရန်'], // Iran
    [80, 'အီရပ်'], // Iraq
    [81, 'အိုင်းယာလန်'], // Ireland
    [82, 'အစ္စရေး'], // Israel
    [83, 'အီတလီ'], // Italy
    [84, 'အိုင်ဗရီကိုတ်'], // Ivory Coast
    [85, 'ဂျမေကာ'], // Jamaica
    [86, 'ဂျပန်'], // Japan
    [87, 'ဂျော်ဒန်'], // Jordan
    [88, 'ကာဇတ်စတန်'], // Kazakhstan
    [89, 'ကင်ညာ'], // Kenya
    [90, 'ကီရီဘတ်'], // Kiribati
    [91, 'ကူဝိတ်'], // Kuwait
    [92, 'ကာဂျစ်စတန်'], // Kyrgyzstan
    [93, 'လာအို'], // Laos
    [94, 'လတ်ဗီးယား'], // Latvia
    [95, 'လက်ဘနွန်'], // Lebanon
    [96, 'လီဆိုသို'], // Lesotho
    [97, 'လိုက်ဘေးရီးယား'], // Liberia
    [98, 'လီဗျား'], // Libya
    [99, 'လစ်ချတင်စတိန်း'], // Liechtenstein
    [100, 'လစ်သူအေနီးယား'], // Lithuania
    [101, 'လူဇင်ဘတ်'], // Luxembourg
    [102, 'မဒဂတ်စကား'], // Madagascar
    [103, 'မာလာဝီ'], // Malawi
    [104, 'မလေးရှား'], // Malaysia
    [105, 'မော်လဒိုက်'], // Maldives
    [106, 'မာလီ'], // Mali
    [107, 'မာလ်တာ'], // Malta
    [108, 'မာရှယ်ကျွန်းစု'], // Marshall Islands
    [109, 'မော်ရီရှီယို'], // Mauricio
    [110, 'မော်ရီတေးနီးယား'], // Mauritania
    [111, 'မက္ကဆီကို'], // Mexico
    [112, 'မိုက်ခရိုနီးရှား'], // Micronesia
    [113, 'မိုလ်ဒိုဗာ'], // Moldova
    [114, 'မိုနာကို'], // Monaco
    [115, 'မွန်ဂိုးလီးယား'], // Mongolia
    [116, 'မောင်တီနီဂရိုး'], // Montenegro
    [117, 'မော်ရိုကို'], // Morocco
    [118, 'မိုဇန်ဘစ်'], // Mozambique
    [119, 'နမ်မာဘီးယား'], // Namibia
    [120, 'နာဦး'], // Nauru
    [121, 'နီပေါ'], // Nepal
    [122, 'နယ်သ်တာလန်'], // Netherlands
    [123, 'နယူးဇီလန်'], // New Zealand
    [124, 'နီကာရာဂွာ'], // Nicaragua
    [125, 'နီဂျာ'], // Niger
    [126, 'နိုင်ဂျီးရီးယား'], // Nigeria
    [127, 'မြောက်ကိုးရီးယား'], // North Korea
    [128, 'နော်ဝေ'], // Norway
    [129, 'အိုမန်'], // Oman
    [130, 'ပါကစ္စတန်'], // Pakistan
    [131, 'ပလောင်'], // Palau
    [132, 'ပနားမား'], // Panama
    [133, 'ပပူရာနယူးဂီးနီ'], // Papua New Guinea
    [134, 'ပါရာဂွေး'], // Paraguay
    [135, 'ပီရူး'], // Peru
    [136, 'ဖိလစ်ပိုင်'], // Philippines
    [137, 'ပိုလန်'], // Poland
    [138, 'ပေါ်တူဂီ'], // Portugal
    [139, 'ကာတာ'], // Qatar
    [140, 'မာစီဒိုနီယာ'], // Republic of Macedonia
    [141, 'ကွန်ဂိုသမ္မတနိုင်ငံ'], // Republic of the Congo
    [142, 'ရိုမေးနီးယား'], // Romania
    [143, 'ရုရှား'], // Russia
    [144, 'ရုဝန်ဒါ'], // Rwanda
    [145, 'စိန့်ကစ်နှင့်နီဗစ်စ်'], // Saint Kitts and Nevis
    [146, 'ဆာမိုအာ'], // Samoa
    [147, 'ဆန်မာရီနို'], // San Marino
    [148, 'ဆောင်တိုမေးနှင့်ပရင်စီပေး'], // Sao Tome and Principe
    [149, 'ဆော်ဒီအာရေးဗျား'], // Saudi Arabia
    [150, 'ဆီနီဂါး'], // Senegal
    [151, 'ဆားဘီးယား'], // Serbia
    [152, 'ဆေးရှဲ'], // Seychelles
    [153, 'ဆီရာလီယွန်း'], // Sierra Leone
    [154, 'စင်ကာပူ'], // Singapore
    [155, 'ဆလိုဗက်ကီးယား'], // Slovakia
    [156, 'ဆလိုဗေးနီးယား'], // Slovenia
    [157, 'ဆောလိုမွန်ကျွန်းစု'], // Solomon Islands
    [158, 'ဆိုမာလီယာ'], // Somalia
    [159, 'တောင်အာဖရိက'], // South Africa
    [160, 'တောင်ကိုရီးယား'], // South Korea
    [161, 'တောင်ဆူဒန်'], // South Sudan
    [162, 'စပိန်'], // Spain
    [163, 'သီရိလင်္ကာ'], // Sri Lanka
    [164, 'စိန့်လူးစီယာ'], // St. Lucia
    [165, 'စိန့်ဗင်စင့်နှင့်ဂရီနေဒီန်းစ်'], // St. Vincent and the Grenadines
    [166, 'ဆူဒန်'], // Sudan
    [167, 'ဆူရီနိမ်း'], // Surinam
    [168, 'ဆွာဇီလန်'], // Swaziland
    [169, 'ဆွီဒင်'], // Sweden
    [170, 'ဆွစ်ဇာလန်'], // Switzerland
    [171, 'ဆီးရီးယား'], // Syria
    [172, 'ထိုင်ဝမ်'], 
    [173, 'တာဂျစ်ကစ္စတန်'],
[174, 'တန်ဇန်းနီးယား'],
[175, 'ထိုင်း'],
[176, 'တိုဂို'],
[177, 'တောင်ဂါ'],
[178, 'ထရီနီဒက်နှင့်တိုဘာဂို'],
[179, 'တူနီးရှား'],
[180, 'တူရကီ'],
[181, 'တူရက်မင်နစ္စတန်'],
[182, 'တူဗာလူ'],
[183, 'ယူဂန်ဒါ'],
[184, 'ယူကရိန်း'],
[185, 'ယူနိုက်တက်အာရပ်အီမီရိတ်'],
[186, 'ယူနိုက်တက်ကင်းဒမ်း'],
[187, 'အမေရိကန်ပြည်ထောင်စု'],
[188, 'ဥရုဂွေး'],
[189, 'ဥဇဘက်ကစ္စတန်'],
[190, 'ဗနွာတူ'],
[191, 'ဗာတီကန်မြို့တော်'],
[192, 'ဗင်နီဇွဲလား'],
[193, 'ဗီယက်နမ်'],
[194, 'ယီမင်'],
[195, 'ဇင်ဘာဘွေ'],
[196, 'ဇမ်ဘီယာ']
        ];

        foreach ($items as $item) {
            Country::create(array_combine($columns, $item));
        }
    }
}
