<?php

use App\Meeting;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meeting_descriptions = [
            'SampleMeeting'
        ];

        $major_category_names = [
            'プログラミング言語',
            '転職・就職',
            'その他'
        ];

        $programings = [
            'プログラミング言語について知りたい方はいますか？',
            'プログラミングについて学びたい方！',
            '新しい言語に挑戦してみませんか？'
        ];

        $jobs = [
            'IT業界の転職にお困りの方。解決します！',
            '未経験のIT業界の求人について知りたい人いませんか？',
            '○○な技術持っている方。ウチで活躍しませんか？'
        ];

        $others = [
            'お悩みの方。是非ご相談ください。',
            'ZOOMの使い方を教えます。',
            '飲食店等へのキャッシュレス決済導入方法について'
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

        $images = [
            /* ローカル環境でのみ有効
            'public/meetings_images/test.png'
            */
            '/images/test.png'
        ];

        $user_id = [
            '1','2','3'
        ];

        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == 'プログラミング言語') {
                foreach ($programings as $programing) {
                    Meeting::create([
                        'name' => $programing,
                        'description' => $meeting_descriptions[0],
                        'assessment' => $assessments[array_rand($assessments)],
                        'coin' => $coins[array_rand($coins)],
                        'category_id' => $category_id[array_rand($category_id)],
                        'image' => $images[0],
                        'user_id' => $user_id[array_rand($user_id)]
                    ]);
                }
            }

            if ($major_category_name == '転職・就職') {
                foreach ($jobs as $job) {
                    Meeting::create([
                        'name' => $job,
                        'description' => $meeting_descriptions[0],
                        'assessment' => $assessments[array_rand($assessments)],
                        'coin' => $coins[array_rand($coins)],
                        'category_id' => $category_id[array_rand($category_id)],
                        'image' => $images[0],
                        'user_id' => $user_id[array_rand($user_id)]
                    ]);
                }
            }

            if ($major_category_name == 'その他') {
                foreach ($others as $other) {
                    Meeting::create([
                        'name' => $other,
                        'description' => $meeting_descriptions[0],
                        'assessment' => $assessments[array_rand($assessments)],
                        'coin' => $coins[array_rand($coins)],
                        'category_id' => $category_id[array_rand($category_id)],
                        'image' => $images[0],
                        'user_id' => $user_id[array_rand($user_id)]
                    ]);
                }
            }
        }
    }
}
