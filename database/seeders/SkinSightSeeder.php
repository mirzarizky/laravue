<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionOption;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkinSightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = collect([
            [
                'group' => 'Sand/Greasy',
                'min_value' => 'Sand',
                'max_value' => 'Greasy',
                'questions' => [
                    [
                        'question_text' => 'Kulitku cenderung...',
                        'options' => [
                            ['option_text' => 'Kering sepanjang hari', 'score' => -2],
                            ['option_text' => 'Kadang berminyak, tapi lebih sering kering', 'score' => -1],
                            ['option_text' => 'Kadang kering, tapi lebih sering berminyak', 'score' => 1],
                            ['option_text' => 'Berminyak dan mengkilap sepanjang hari', 'score' => 2],
                        ],
                    ],
                    [
                        'question_text' => 'Soal komedo di wajahku...',
                        'options' => [
                            ['option_text' => 'Hampir selalu ada', 'score' => -2],
                            ['option_text' => 'Ada ketika memakai sabun atau produk tertentu, atau dalam kondisi tertentu (menstruasi, sakit, aktivitas tinggi, stress)', 'score' => -1],
                            ['option_text' => 'Ada tapi sesekali', 'score' => 1],
                            ['option_text' => 'Tidak pernah ada', 'score' => 2],
                        ],
                    ],
                    [
                        'question_text' => 'Bila tidak menggunakan pelembab...',
                        'options' => [
                            ['option_text' => 'Kulitku terasa kencang', 'score' => -2],
                            ['option_text' => 'Sesekali kencang, khususnya bila salah memakai sabun', 'score' => -1],
                            ['option_text' => 'Biasa saja, bahkan cenderung lembab', 'score' => 1],
                            ['option_text' => 'Cenderung lembab hingga terasa berminyak', 'score' => 2],
                        ],
                    ],
                ],
            ],
            [
                'group' => 'Immune/Fire',
                'min_value' => 'Immune',
                'max_value' => 'Fire',
                'questions' => [
                    [
                       'question_text' => 'Ketika aku pakai skincare',
                        'options' => [
                            ['option_text' => 'Tidak pernah ada reaksi', 'score' => -2],
                            ['option_text' => 'Beberapa bahan membuat kulitku bereaksi (kemerahan, nyeri, kering)', 'score' => -1],
                            ['option_text' => 'Hampir semuanya membuat kulitku bereaksi', 'score' => 1],
                            ['option_text' => 'Hanya ada 1-2 produk saja yang membuat kulitku tidak beraksi', 'score' => 2],
                        ],
                    ],
                    [
                       'question_text' => 'Apakah kamu pernah didiagnosis eksim?',
                        'options' => [
                            ['option_text' => 'Tidak pernah', 'score' => -2],
                            ['option_text' => 'Sepertinya pernah, tapi aku tidak yakin', 'score' => -1],
                            ['option_text' => 'Ya! Bahkan aku sudah pernah ke dokter', 'score' => 1],
                            ['option_text' => 'Saat ini sedang menjalani pengobatan eksim', 'score' => 2],
                        ],
                    ],
                    [
                       'question_text' => 'Bagaimana soal deterjen atau sabun mandi?',
                        'options' => [
                            ['option_text' => 'Aku bisa menggunakan semua merk', 'score' => -2],
                            ['option_text' => 'Beberapa merk membuat kulitku iritasi', 'score' => -1],
                            ['option_text' => 'Aku harus menggunakan merk spesifik agar tidak iritasi', 'score' => 1],
                            ['option_text' => 'Aku hanya bisa menggunakan sabun khusus rekomendasi dokter', 'score' => 2],
                        ],
                    ],
                ],
            ],
            [
                'group' => 'Delicate/Mark',
                'min_value' => 'Delicate',
                'max_value' => 'Mark',
                'questions' => [
                    [
                       'question_text' => 'Soal dark spot (flek hitam/bintik hitam) di wajahku...',
                        'options' => [
                            ['option_text' => 'Sama sekali tidak ada dark spot di wajahku', 'score' => -2],
                            ['option_text' => 'Lebih sering tidak ada, namun sesekali muncul', 'score' => -1],
                            ['option_text' => 'Ada namun kadang hilang', 'score' => 1],
                            ['option_text' => 'Selalu ada dan bertambah', 'score' => 2],
                        ],
                    ],
                    [
                       'question_text' => 'Bila wajahku terpapar sinar matahari...',
                        'options' => [
                            ['option_text' => 'Kulitku akan terbakar dan kemerahan', 'score' => -2],
                            ['option_text' => 'Biasanya akan terasa terbakar di awal, lalu akan menjadi lebih gelap', 'score' => -1],
                            ['option_text' => 'Tidak ada rasa terbakar, kadang menjadi gelap tapi mudah membaik', 'score' => 1],
                            ['option_text' => 'Pasti kulitku akan langsung menjadi lebih gelap', 'score' => 2],
                        ],
                    ],
                    [
                       'question_text' => 'Apa kamu ada freckles? (berwarna kecokelatan dan biasanya berkelompok, bukan cuma 1 atau 2 saja)',
                        'options' => [
                            ['option_text' => 'Wajahku sama sekali tidak memilikinya', 'score' => -2],
                            ['option_text' => 'Yah, sesekali muncul tapi mudah hilang juga', 'score' => -1],
                            ['option_text' => 'Banyak sih, tapi tidak bertambah', 'score' => 1],
                            ['option_text' => 'Wajahku memiliki banyak freckles dan sepertinya semakin banyak', 'score' => 2],
                        ],
                    ],
                ],
            ],
            [
                'group' => 'Line/Chewy',
                'min_value' => 'Line',
                'max_value' => 'Chewy',
                'questions' => [
                    [
                       'question_text' => 'Ceritakan soal kerutan di wajahmu',
                        'options' => [
                            ['option_text' => 'Wajahku mudah berkerut, bahkan di usiaku', 'score' => -2],
                            ['option_text' => 'Ada kerutan tapi masih wajar', 'score' => -1],
                            ['option_text' => 'Sedikit sekali, hanya bisa terlihat bila diamati dengan teliti', 'score' => 1],
                            ['option_text' => 'Wajahku sama sekali tidak berkerut', 'score' => 2],
                        ],
                    ],
                    [
                       'question_text' => 'Berapa jam sehari kamu terpapar sinar matahari?',
                        'options' => [
                            ['option_text' => 'Lebih dari 8 jam sehari', 'score' => -2],
                            ['option_text' => '6 sampai 8 jam sehari', 'score' => -1],
                            ['option_text' => '3 sampai 6 jam sehari', 'score' => 1],
                            ['option_text' => 'Kurang dari 3 jam sehari', 'score' => 2],
                        ],
                    ],
                    [
                       'question_text' => 'Aku makan sayur dan buah',
                        'options' => [
                            ['option_text' => 'Sama sekali tidak pernah', 'score' => -2],
                            ['option_text' => '1 sampai 3 kali seminggu', 'score' => -1],
                            ['option_text' => '3 sampai 5 kali seminggu', 'score' => 1],
                            ['option_text' => 'Lebih dari 5 kali seminggu', 'score' => 2],
                        ],
                    ],
                ],
            ],

        ]);

        $questions->each(function ($item) {
            DB::transaction(function () use ($item) {
                $group = QuestionGroup::firstOrCreate(['name' => $item['group']], [
                    'min_value' => $item['min_value'],
                    'max_value' => $item['max_value'],
                ]);

                foreach ($item['questions'] as $question) {
                    $newQuestion = Question::firstOrCreate(
                        ['question_text' => $question['question_text']],
                        ['group_id' => $group->id]
                    );

                    foreach ($question['options'] as $option) {
                        QuestionOption::firstOrCreate(
                            ['option_text' => $option['option_text']],
                            [
                                'question_id' => $newQuestion->id,
                                'score' => $option['score'],
                            ]
                        );
                    }
                }
            });
        });
    }
}
