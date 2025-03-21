<?php

namespace Database\Seeders;

use App\Models\Ethnic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::disableForeignKeyConstraints();
        Ethnic::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'ကချင်'], 
            [2, 'ထရုမ်း'], 
            [3, 'ဒလောင်'], 
            [4, 'ဂျိမ်းဖော'], 
            [5, 'ဂေါ်ရီ'], 
            [6, 'ခါ့ခူး'],
            [7, 'ဒူးလင်း'], 
            [8, 'လော်ဝေါ်'], 
            [9, 'ရဝမ်'], 
            [10, 'လရှီ'], 
            [11, 'အဇီး'], 
            [12, 'လီဆူ'], 
            [13, 'ကယား'], 
            [14, 'ဇယိန်'], 
            [15, 'ကယန်း'], 
            [16, 'ဂေခို'], 
            [17, 'ဂေဘား'], 
            [18, 'ပရဲ'], 
            [19, 'မနူမနော'], 
            [20, 'ယင်းတလဲ'], 
            [21, 'ယင်းဘော်'], 
            [22, 'ကရင်'], 
            [23, 'ကရင်ဖြူ'], 
            [24, 'ပလေကီး'], 
            [25, 'မွန်ကရင်'], 
            [26, 'စကောကရင်'], 
            [27, 'တလှေပွာ'], 
            [28, 'ပကူး'], 
            [29, 'ဘွဲ'], 
            [30, 'မောနေပွား'], 
            [31, 'မိုးပွ'], 
            [32, 'ပိုးကရင်'], 
            [33, 'ချင်း'], 
            [34, 'ကသည်း'], 
            [35, 'ဆလိုင်း'], 
            [36, 'ကလင်ကော့'], 
            [37, 'ခမီ'], 
            [38, 'အဝခမီ'], 
            [39, 'ခေါနိုး'], 
            [40, 'ခေါင်စို'], 
            [41, 'ခေါင်ဆိုင်ချင်း'], 
            [42, 'ခွာဆင်းမ်'], 
            [43, 'ခွန်လီ'], 
            [44, 'ဂန်တဲ့'], 
            [45, 'ဂွေးတဲ'], 
            [46, 'ငွန်း'], 
            [47, 'ဆီစာန်'], 
            [48, 'ဆင်တန်'], 
            [49, 'ဆိုင်းဇန်'], 
            [50, 'ဇာဟောင်'], 
            [51, 'ဇိုတုံး'], 
            [52, 'ဇိုဖေ'], 
            [53, 'ဇို'], 
            [54, 'ဇန်ညှပ်'], 
            [55, 'တပေါင်'], 
            [56, 'တီးတိန်'], 
            [57, 'တေဇန်'], 
            [58, 'တိုင်ချွန်း'], 
            [59, 'တာ့ဒိုး'], 
            [60, 'တောရ်'], 
            [61, 'ဒင်မ်'], 
            [62, 'ဒိုင်'], 
            [63, 'နာဂ'], 
            [64, 'တန်ဒူး'], 
            [65, 'မာရင်'], 
            [66, 'ပနမ်း'], 
            [67, 'မကန်း'], 
            [68, 'မတူ'], 
            [69, 'မီရမ်'], 
            [70, 'မီအဲ'], 
            [71, 'မွင်း'], 
            [72, 'လူရှည်'], 
            [73, 'လေးမြို့'], 
            [74, 'လင်တဲ'], 
            [75, 'လောက်ထူ'], 
            [76, 'လိုင်'], 
            [77, 'လိုင်ဇို'], 
            [78, 'မြို'], 
            [79, 'ထမန်း'], 
            [80, 'အနူး'], 
            [81, 'အနန်း'], 
            [82, 'အူပူ'], 
            [83, 'လျင်းတု'], 
            [84, 'အရှိုချင်း'], 
            [85, 'ရောင်ထု'], 
            [86, 'ဗမာ'], 
            [87, 'ထားဝယ်'], 
            [88, 'မြိတ်'], 
            [89, 'ယော'], 
            [90, 'တောင်သား'], 
            [91, 'ကဒူး'], 
            [92, 'ကနန်း'], 
            [93, 'ဆလုံ'], 
            [94, 'ဖွန်း'], 
            [95, 'မွန်'], 
            [96, 'ရခိုင်'], 
            [97, 'ကမန်'], 
            [98, 'ခမီး'], 
            [99, 'ဒိုင်းနက်'], 
            [100, 'မရမာကြီး'], 
            [101, 'မြို'], 
            [102, 'သက်'], 
            [103, 'ရှမ်း'], 
            [104, 'ယွန်း'], 
            [105, 'ကွီ'], 
            [106, 'ဖျင်'], 
            [107, 'ယောင်'], 
            [108, 'ထနော့'], 
            [109, 'ပလေး'],
            [110, 'အင်'], 
            [111, 'မုံ'], 
            [112, 'ခမူ'], 
            [113, 'အာခါ'], 
            [114, 'ကိုးကန့်'], 
            [115, 'ခန္တီးရှမ်း'], 
            [116, 'ဂုံရှမ်း'], 
            [117, 'တောင်ရိုး'], 
            [118, 'ဓနု'], 
            [119, 'ပလောင်'], 
            [120, 'မြောင်ဇီး'], 
            [121, 'ယင်းကျား'], 
            [122, 'ယင်းနက်'], 
            [123, 'ရှမ်းကလေး'], 
            [124, 'ရှမ်းကြီး'], 
            [125, 'လားဟူ'], 
            [126, 'အင်းသား'], 
            [127, 'အိုက်ဆွယ်'], 
            [128, 'ပအိုဝ်း'], 
            [129, 'တိုင်းလွယ်'],
            [130, 'တိုင်းလျမ်'], 
            [131, 'တိုင်းလုံ'], 
            [132, 'တိုင်းလေ့'], 
            [133, 'မိုင်းသာ'], 
            [134, 'မောရှမ်း'], 
            [135, 'ဝ'] ,
            [136, 'ရှမ်း/အင်း'] ,
            [137, 'ရှမ်း/အင်း/ဗမာ'] ,

        ];

        foreach ($items as $item) {
            Ethnic::create(array_combine($columns, $item));
        }
    }
}
