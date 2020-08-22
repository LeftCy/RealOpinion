<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            'プログラミング言語',
            '転職・就職',
            'その他'
        ];

        $languages = [
            'Python',
            'Java',
            'Ruby',
            'C言語、C++',
            'C#',
            'JavaScript',
            'PHP',
            'Swift',
            'Scala',
            'R',
            'Go言語',
            'VisualBasic.NET',
            'Kotlin'
        ];

        $jobs = [
            '転職',
            '就職',
            'スカウト'
        ];
        
        
        $others = [
            'その他'
            /*
            'ZOOMの使い方',
            'Amazonでの販売について',
            '飲食店等へのキャッシュレス決済導入',
            'ネット戦略',
            'Excelの操作',
            'テレワークの導入',
            '高性能PCを低価格で'
            */
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == 'プログラミング言語') {
                foreach ($languages as $language) {
                    Category::create([
                        'name' => $language,
                        'description' => $language,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }

            if ($major_category_name == '転職・就職') {
                foreach ($jobs as $job) {
                    Category::create([
                        'name' => $job,
                        'description' => $job,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
            
            if ($major_category_name == 'その他') {
                foreach ($others as $other) {
                    Category::create([
                        'name' => $other,
                        'description' => $other,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
        }
    }
}
