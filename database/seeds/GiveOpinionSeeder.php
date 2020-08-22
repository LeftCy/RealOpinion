<?php

use App\GiveOpinion;
use Illuminate\Database\Seeder;

class GiveOpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $give_opinion_descriptions = [
            'SampleGiveOpinion'
        ];

        $major_category_names = [
            'プログラミング言語',
            '転職・就職',
            'その他'
        ];

        $programings = [
            'プログラミング言語について教えてくれませんか？',
            'プログラミングについて学びたいのでご教授願います。',
            '○○○言語に挑戦してみたいです。教えてくれる人いらっしゃいませんか？'
        ];

        $jobs = [
            'IT業界の転職に困っています。',
            '現在のIT転職市場について知りたいです？',
            '実務経験○○年です。雇ってくれませんか？（ポートフォリオ有り）'
        ];

        $others = [
            'これからプログラミング始めるのに必要なスペック教えてください。',
            'テレワークでWEBカメラの映像が乱れるのはなぜ？',
            '自分の市場価値を査定してください。'
        ];

        $assessments = [
            1,2,3,4,5
        ];

        $coins = [
            '1',
            '2',
            '3',
            '4',
            '5'
        ];

        $category_id = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17'
        ];

        $programing_category_id = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
        ];

        $job_category_id = [
            '14',
            '15',
            '16'
        ];

        $other_category_id = [
            '17'
        ];

        $images = [
            /* ローカル環境でのみ有効
            'public/give_opinions_images/test.png'
            */
            'images/test.png'
        ];
        
        $user_id = [
            '1','2','3'
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == 'プログラミング言語') {
                foreach ($programings as $programing) {
                    GiveOpinion::create([
                        'name' => $programing,
                        'description' => $give_opinion_descriptions[0],
                        'assessment' => $assessments[array_rand($assessments)],
                        'coin' => $coins[array_rand($coins)],
                        'category_id' => $programing_category_id[array_rand($programing_category_id)],
                        'image' => $images[0],
                        'user_id' => $user_id[array_rand($user_id)]
                    ]);
                }
            }

            if ($major_category_name == '転職・就職') {
                foreach ($jobs as $job) {
                    GiveOpinion::create([
                        'name' => $job,
                        'description' => $give_opinion_descriptions[0],
                        'assessment' => $assessments[array_rand($assessments)],
                        'coin' => $coins[array_rand($coins)],
                        'category_id' => $job_category_id[array_rand($job_category_id)],
                        'image' => $images[0],
                        'user_id' => $user_id[array_rand($user_id)]
                    ]);
                }
            }

            if ($major_category_name == 'その他') {
                foreach ($others as $other) {
                    GiveOpinion::create([
                        'name' => $other,
                        'description' => $give_opinion_descriptions[0],
                        'assessment' => $assessments[array_rand($assessments)],
                        'coin' => $coins[array_rand($coins)],
                        'category_id' => $other_category_id[array_rand($other_category_id)],
                        'image' => $images[0],
                        'user_id' => $user_id[array_rand($user_id)]
                    ]);
                }
            }
        }
    }
}
