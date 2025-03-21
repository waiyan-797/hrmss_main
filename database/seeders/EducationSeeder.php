<?php

namespace Database\Seeders;
use App\Models\Education;
use App\Models\EducationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;


class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     // Schema::disableForeignKeyConstraints();
    //     // Education::truncate();
    //     // Schema::enableForeignKeyConstraints();

    //     $columns = [ 'education_type_id', 'name'];
    //     $items = [
    //         [1, 'M.A(Eng)' ],
    //         [1, 'M.A(T.E.F.L)' ],
    //         [9, 'B.A(Hist)' ],
    //         [9, 'B.A(Eng)' ],
    //         [9, 'B.A(Eco)' ],
    //         [9, 'B.A(BM)' ],
    //         [9, 'B.A(Myanmar)' ],
    //         [9, 'B.A(Geog)' ],
    //         [9, 'B.A(Philo)' ],
    //         [9, 'B.A(IR)' ],
    //         [9, 'B.A(Home Eco)' ],
    //         [9, 'B.A(Art)' ],
    //         [9, 'B.A(Psycho)' ],
    //         [9, 'B.A(Myanmar)Q' ],
    //         [9, 'B.A(Eco)Q' ],
    //         [9, 'B.A(Eng)Hons' ],
    //         [9, 'B.A(Myanmar Studies)' ],
    //         [9, 'B.A(DSA)' ],
    //         [9, 'B.A(Archaeology)' ],
    //         [9, 'B.A(Geog)Hons' ],
    //         [9, 'B.A (Geog)Q' ],
    //         [9, 'B.A(Archae)' ],
    //         [9, 'BA(Oriental Studies)' ],
    //         [9, 'B.A(Hons)' ],
    //         [2, 'M.Sc(Zool)' ],
    //         [2, 'M.Sc(Chem)' ],
    //         [2, 'M.Sc(Phys)' ],
    //         [2, 'M.Sc(Maths)' ],
    //         [2, 'M.Sc(Engg & Tech)' ],
    //         [2, 'M.Sc(Geology)' ],
    //         [2, 'M.Sc(Bot)' ],
    //         [2, 'M.Sc(Engineering Geology)' ],
    //         [2, 'M.Res (Biochemistry)' ],
    //         [2, 'M.Research(Maths)' ],
    //         [2, 'B.Agr.Sc(Q)' ],
    //         [10, 'B.Sc(Bot)' ],
    //         [10, 'B.Sc(Phys)' ],
    //         [10, 'B.Sc(Zoology)' ],
    //         [10, 'B.Sc(Chem)' ],
    //         [10, 'B.Sc(Maths)' ],
    //         [10, 'B.Sc(Maths)Q' ],
    //         [10, 'B.Sc(Geology)' ],
    //         [10, 'B.Sc(IC)' ],
    //         [10, 'B.Sc(Electronic)(DSA)' ],
    //         [10, 'B.Sc(Maths) Hons:' ],
    //         [10, 'B.Sc(Chem) Hons:' ],
    //         [10, 'B.Sc(Zool) Hons:' ],
    //         [10, 'B.Sc(Bot)Q' ],
    //         [10, 'B.Sc(Phys)Q' ],
    //         [10, 'B.Sc(DSA)' ],
    //         [10, 'B.Sc(Chem)Q' ],
    //         [10, 'B.Sc(Marine Bio)' ],
    //         [10, 'B.Sc(Industrial Chemistry)' ],
    //         [10, 'B.Sc(Hons)(Biochemistry)' ],
    //         [10, 'B.Sc(Noutical Science)' ],
    //         [3, 'M.Econ(Eco)' ],
    //         [3, 'M.Econ(stats)' ],
    //         [3, 'M.B.A' ],
    //         [3, 'M.Com' ],
    //         [3, 'M.DevS (Master of Development Studies)' ],
    //         [3, 'M.P.A' ],
    //         [11, 'B.Com' ],
    //         [11, 'B.Econ(Stats:)' ],
    //         [11, 'B.B.A' ],
    //         [11, 'B.Econ(P.D)' ],
    //         [11, 'B.Econ(Economics)' ],
    //         [11, 'B.B.M' ],
    //         [11, 'B.DevS(Eco)' ],
    //         [11, 'B.Econ(MS)' ],
    //         [11, 'B.Com (Q)' ],
    //         [11, 'B.Econ(Eco)Q' ],
    //         [11, 'B.Eco(Economics)' ],
    //         [11, 'B.Bsc' ],
    //         [11, 'B.Act' ],
    //         [11, 'B.P.S (Population Study)' ],
    //         [11, 'B.BSC (Bachelor of Business Science) Q' ],
    //         [11, '(BTHM) Bachelor of Tourism and Hospitality Management' ],
    //         [18, 'Ph.D (Economics)' ],
    //         [4, 'LL.M' ],
    //         [4, 'LL.M (Commercial)' ],
    //         [12, 'LL.B' ],
    //         [12, 'LL.B(Q)' ],
    //         [5, 'M.E(Civil)' ],
    //         [5, 'M.E(Aerospace)' ],
    //         [5, 'M.E(Mechanical)' ],
    //         [5, 'M.E(Electronic)' ],
    //         [5, 'M.E(Mechatronics)' ],
    //         [5, 'M.E(Chemical)' ],
    //         [5, 'M.E(Metallurgy)' ],
    //         [13, 'B.E(Electrical Power)' ],
    //         [13, 'B.E(Civil)' ],
    //         [13, 'B.E(Textile)' ],
    //         [13, 'B.E(Chemical)' ],
    //         [13, 'B.E(EC)' ],
    //         [13, 'B.Tech (Mechanical Engineering)' ],
    //         [13, 'B.E(Mechanical)' ],
    //         [13, 'B.E(IT)' ],
    //         [13, 'B.E(Metallurgy)' ],
    //         [13, 'B.E(IT)Q' ],
    //         [13, 'B.E(Manufacturing Engineering)Q' ],
    //         [13, 'B.E(Mechanical) Q' ],
    //         [13, 'B.E(Mechatronics)' ],
    //         [13, 'B.E(CE)' ],
    //         [13, 'B.E (Materials Science & Metallurgy)' ],
    //         [13, 'B.Tech (Civil)' ],
    //         [13, 'B.E(IST)' ],
    //         [13, 'B.E (Materials & Metallurgy)' ],
    //         [13, 'AGTI(EP)' ],
    //         [13, 'AGTI(Second Years) EP' ],
    //         [13, 'EGTI(MP)' ],
    //         [6, 'M.C.Sc' ],
    //         [6, 'M.C.Tech' ],
    //         [14, 'B.C.Sc' ],
    //         [14, 'B.C.Sc(Hons:)' ],
    //         [20, 'မူလတန်းအောင်' ],
    //         [20, 'ရေးတတ်၊ ဖတ်တတ်ခြင်း။' ],
    //         [21, '၁၀ တန်း' ],
    //         [21, '၉ တန်း' ],
    //         [21, '၁၀ တန်းအောင်' ],
    //         [21, '၉ တန်းအောင်' ],
    //         [21, '၁၀ တန်း(ခ)' ],
    //         [15, 'ပထမနှစ်(မြန်မာစာ)' ],
    //         [15, 'ဒုတိယနှစ် (ပထဝီဝင်)' ],
    //         [15, 'ပထမနှစ် (ပထဝီ)' ],
    //         [15, 'ဒုတိယနှစ်(စီးပွားစီမံ)' ],
    //         [15, 'ဒုတိယနှစ်(မြန်မာ)' ],
    //         [15, 'တတိယနှစ်' ],
    //         [15, 'စတုတ္ထနှစ်(သမိုင်း)' ],
    //         [15, 'စတုတ္ထနှစ်(ပထဝီဝင်)' ],
    //         [15, 'တတိယနှစ်(မြန်မာစာ)' ],
    //         [15, 'တတိယနှစ်(အင်္ဂလိပ်စာ)' ],
    //         [15, 'တတိယနှစ်(ပထဝီဝင်)' ],
    //         [15, 'ပထမနှစ် (Psycho)' ],
    //         [15, 'စတုတ္ထနှစ်(ရူပဗေဒ)' ],
    //         [15, 'ဒုတိယနှစ်(ဓါတုဗေဒ)' ],
    //         [15, 'တတိယနှစ်(ရူပဗေဒ)' ],
    //         [15, 'ပထမနှစ်(စီးပွားစီမံ)' ],
    //         [15, 'ဒုတိယနှစ်(သမိုင်း)' ],
    //         [15, 'စတုတ္ထနှစ်(ဥပ​ဒေ)' ],
    //         [15, 'နောက်ဆုံးနှစ်(Chem)' ],
    //         [15, 'ဒုတိယနှစ်(Botany)' ],
    //         [15, 'First Year (Myanmar )' ],
    //         [15, 'ဒုတိယနှစ်(ရူပဗေဒ)' ],
    //         [15, 'စတုတ္ထနှစ်(Electrical Power)' ],
    //         [15, 'တတိယနှစ်(Chemistry)' ],
    //         [15, 'နောက်ဆုံးနှစ် (English)' ],
    //         [15, 'First Year (Maths)' ],
    //         [15, 'ပထမနှစ် (စိတ်ပညာ)' ],
    //         [15, 'တတိယနှစ်(သမိုင်း)' ],
    //         [15, 'First Year (Chem)' ],
    //         [15, 'ဒုတိယနှစ်(Eng)' ],
    //         [15, 'ဒုတိယနှစ်(အရှေ့တိုင်းပညာ)' ],
    //         [15, 'ဒုတိယနှစ်(သင်္ချာ)' ],
    //         [15, 'တတိယနှစ်(IC)' ],
    //         [15, 'Final Year (Geo)' ],
    //         [15, 'Fourth Year (Chem)' ],
    //         [16, 'B.A(Eng)YUFL' ],
    //         [16, 'B.A(Japanese)' ],
    //         [16, 'B.A(French)' ],
    //         [16, 'B.A(Chinese)' ],
    //         [16, 'B.A(Russia)' ],
    //         [16, 'B.A(Korea)' ],
    //         [16, 'B.A(Eng)MUFL' ],
    //         [16, 'B.A(German)MUFL' ],
    //         [22, 'ပဉ္စမတန်း' ],
    //         [22, '၈တန်းအောင်' ],
    //         [22, 'အလယ်တန်း' ],
    //         [22, '၈ တန်း' ],
    //         [22, '၇ တန်းအောင်' ],
    //         [22, '၆ တန်း' ],
    //         [19, 'Ph.D(IT)' ],
    //         [19, 'Ph.D(Metallurgy)' ],
    //         [19, 'Ph.D(Economics)' ],
    //         [19, 'Ph.D(Mechatronics)' ],
    //         [19, 'Ph.D(Nuclear Engineering)' ],
    //         [19, 'Ph.D(Petroleum Engineering)' ],
    //         [19, 'Ph.D(Electronics)' ],
    //         [24, 'A.G.T.I(EP)' ],
    //         [24, 'Diploma in Business Law ( DBL)' ],
    //         [24, 'Diploma in Computer Science (D.C.Sc)' ],
    //         [24, 'Diploma in International Law (DIL)' ],
    //         [24, 'Diploma in Intellectual Property Law (DIPL)' ],
    //         [24, 'Diploma in Maritime Law ( DML)' ],
    //         [24, 'Diploma in Development Studies( Dip.Ds)' ],
    //         [23, 'Global English(IR)' ],
    //         [23, 'IFL(English)' ],
    //         [7, 'M.P.M' ],
    //         [7, 'M.Sc(Development Economic)' ],
    //         [7, 'M.E(Technology)' ],
    //         [7, 'M.A(International Development Program)' ],
    //         [7, 'M.A(Public Economics)' ],
    //         [7, 'M.P.A(Singapore)' ],
    //         [7, 'Master of Business Administration()' ],
    //         [7, 'M.E(Metallurgy)(Russia)' ],
    //         [7, 'M.A ( International Development Program)' ],
    //         [7, 'GLobal MBA(Thailand)' ],
    //         [7, 'M.Sc(Engg: & Tech)(Russia)' ],
    //         [7, 'MBA(International Business)' ],
    //         [7, 'M.E(Mechatronics)(Korea)' ],
    //         [7, 'M.E (Mechanical)(Thailand)' ],
    //         [7, 'M.A(Urban Regional Development)' ],
    //         [7, 'M.A(PMPP)' ],
    //         [7, 'M.A(International Trade/Applied Economics)' ],
    //         [7, 'M.A(Policy Economics )' ],
    //         [7, 'Master of Public Policy(Korea)' ],
    //         [7, 'M.E (Mechanical)(Russia)' ],
    //         [7, 'Master of Economics' ],
    //         [7, 'Master of Law' ],
    //         [25, 'Ph.D(Nanoscience and Nanotechnology)' ],
    //         [17, 'B.Med.Tech(Mlt)' ],
    //         [17, 'B.Pharm' ],
    //         [8, 'M.A(Hist)' ],
    //         [8, 'MPA(Master of Public Administration)' ],
    //         [8, 'MBA(Master of Business Administration)' ],
    //     ];
    //     foreach($items as $item){
    //         Education::create(array_combine($columns,$item));
    //     }

    //         $all =  Education::all()  ;
    //         foreach($all as $each){
    //             $each->education_group_id = $each->education_group->id;
    //             $each->update();
    //         }

    // }

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $departmentPath = database_path('sql/education.sql');

        if (!File::exists($departmentPath)) {
            $this->command->error("file not found: $departmentPath");
            return;
        }

        $content = File::get($departmentPath);

        DB::unprepared($content);
        Schema::enableForeignKeyConstraints();
        $this->command->info('Educations seeded successfully!');
    }



}
