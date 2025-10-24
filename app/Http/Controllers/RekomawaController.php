<?php

namespace App\Http\Controllers;

use App\Models\rekomawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RekomawaController extends Controller
{
    private $mappings = [
        'question1' => ['Ya', 'Tidak'],
        'JK' => ['Laki-Laki', 'Perempuan', 'Laki-Laki dan Perempuan'],
        'question2' => ['Organisasi pengembangan jiwa kepemimpinan', 'Organisasi pengembangan minat bakat ( seni, olahraga, literasi, teknologi)'],
        'question3' => ['Lingkungan yang mendukung dan positif', 'Peluang belajar dan berkembang', 'Kesempatan untuk menunjukkan hasil atau prestasi', 'Ruang untuk mengekspresikan ide'],
        'question4' => ['Kompetisi', 'Kolaborasi Tim', 'Kegiatan Fisik', 'Kreativitas', 'Sosial', 'Pengabdian Masyarakat'],
        'question5' => ['Komitmen Besar', 'Cukup Besar', 'Sedang', 'Kecil'],
        'question6' => ['Sering', 'Cukup', 'Kadang-kadang'],
        'question7' => ['Besar', 'Cukup', 'Biasa saja', 'Tidak tertarik'],
        'question8' => ['Membangun jaringan/relasi', 'Menambah pengalaman', 'Melatih soft skill', 'Meningkatkan CV/portofolio'],
        'question9' => ['Pengembangan diri', 'Belajar hal baru', 'Eksplorasi minat', 'Keseruan dan kebersamaan'],
    ];

    protected $weights = [
        'question1' => 1,
        'JK' => 1,
        'question2' => 1,
        'question3' => 1,
        'question4' => 1,
        'question5' => 1,
        'question6' => 1,
        'question7' => 2,
        'question8' => 1,
        'question9' => 2,
    ];

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'question1' => 'required|string',
            'JK' => 'required|string',
            'question2' => 'required|string',
            'question3' => 'required|string',
            'question4' => 'required|string',
            'question5' => 'required|string',
            'question6' => 'required|string',
            'question7' => 'required|string',
            'question8' => 'required|string',
            'question9' => 'required|string',
        ]);

        $validatedData['AdminOrmawa_id'] = auth()->id();

        $show = rekomawa::create($validatedData);

        return view('ormawa.show_recomendation', compact('show'));
    }

    public function match(Request $request)
    {
        $rules = [
            'question1' => 'required|string',
            'JK' => 'required|string',
            'question2' => 'required|string',
            'question3' => 'required|string',
            'question4' => 'required|string',
            'question5' => 'required|string',
            'question6' => 'required|string',
            'question7' => 'required|string',
            'question8' => 'required|string',
            'question9' => 'required|string',
            'essay' => 'required|string|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $validatedData = $validator->validated();

        // filter jawaban negatif
        $negatif = [
            'question1' => 'Tidak',
            'question5' => 'Kecil',
            'question6' => 'Kadang-kadang',
            'question7' => 'Tidak tertarik',
        ];
        foreach ($negatif as $field => $badAnswer) {
            if ($validatedData[$field] === $badAnswer) {
                return response()->json([
                    'message' => 'Berdasarkan jawaban Anda, tidak ada organisasi yang cocok.',
                    'recommendations' => []
                ]);
            }
        }

        try {
            // ---------- CBF ----------
            $userVector = $this->createOneHotVector($validatedData);

            // ---------- TF-IDF ----------
            $userEssay = $this->preprocessText($validatedData['essay']);

            $documents = ['user' => $userEssay];
            $ormawa = DB::table('about')->get(); // ganti sesuai nama tabel deskripsi ORMAWA

            foreach ($ormawa as $item) {
                $rawText = str_repeat(($item->nama_organisasi ?? '') . ' ', 3) . // nama lebih kuat
                    ($item->slogan ?? '') . ' ' .
                    str_repeat(strip_tags($item->tentang_kami ?? '') . ' ', 2); // deskripsi lebih kuat
                $documents[$item->id] = $this->preprocessText($rawText);
            }

            list($tfidfVectors, $allTerms) = $this->getTFIDFVectors($documents);
            $userTfidf = $tfidfVectors['user'] ?? [];
            unset($tfidfVectors['user']);

            $recommendations = [];

            foreach ($ormawa as $org) {
                $admin = rekomawa::where('AdminOrmawa_id', $org->user_id)->first();
                if (!$admin) {
                    continue;
                }

                // JK check (fleksibel)
                if ($validatedData['JK'] !== 'Laki-Laki dan Perempuan' && ($admin->JK ?? '') !== $validatedData['JK']) {
                    continue;
                }

                $adminVector = $this->createOneHotVector([
                    'question1' => $admin->question1,
                    'question2' => $admin->question2,
                    'JK' => $admin->JK,
                    'question3' => $admin->question3,
                    'question4' => $admin->question4,
                    'question5' => $admin->question5,
                    'question6' => $admin->question6,
                    'question7' => $admin->question7,
                    'question8' => $admin->question8,
                    'question9' => $admin->question9,
                ]);

                $cbfScore = $this->cosineSimilarity($userVector, $adminVector);
                $tfidfScore = $this->computeCosine($userTfidf, $tfidfVectors[$org->id] ?? []);

                // essay lebih dominan
                $totalScore = (0.25 * $cbfScore) + (0.75 * $tfidfScore);

                $recommendations[] = [
                    'AdminOrmawa_id' => $admin->AdminOrmawa_id,
                    'nama' => $org->nama_organisasi,
                    'score' => round($totalScore, 4)
                ];
            }

            usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);
            foreach ($recommendations as $i => &$item) {
                $item['rank'] = $i + 1;
            }

            return response()->json([
                'message' => 'Rekomendasi ORMAWA berdasarkan CBF (25%) + Essay TF-IDF (75%)',
                'recommendations' => $recommendations
            ]);
        } catch (\Throwable $e) {
            Log::error('Rekomawa match error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            return response()->json([
                'message' => 'Internal server error saat memproses rekomendasi.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function createOneHotVector(array $data)
    {
        $vector = [];
        foreach ($this->mappings as $field => $options) {
            $oneHot = array_fill(0, count($options), 0);
            $answer = $data[$field] ?? null;
            $index = array_search($answer, $options);
            if ($index !== false) {
                $weight = $this->weights[$field] ?? 1;
                $oneHot[$index] = 1 * $weight;
            }
            $vector = array_merge($vector, $oneHot);
        }
        return $vector;
    }

    private function getTFIDFVectors($documents)
    {
        $tfidf = [];
        $allTerms = [];
        foreach ($documents as $docId => $text) {
            $tokens = array_count_values(str_word_count($text, 1));
            $tfidf[$docId] = $tokens;
            $allTerms = array_merge($allTerms, array_keys($tokens));
        }
        $allTerms = array_unique($allTerms);
        $docCount = count($documents);

        foreach ($tfidf as $docId => &$docTokens) {
            foreach ($allTerms as $term) {
                $tf = $docTokens[$term] ?? 0;
                $df = collect($tfidf)->filter(fn($doc) => isset($doc[$term]))->count();
                $idf = log(($docCount + 1) / (($df ?: 1) + 1)) + 1;
                $idf *= 2;
                $docTokens[$term] = $tf * $idf;
            }
        }
        return [$tfidf, $allTerms];
    }

    private function preprocessText($text)
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-zA-Z\s]/u', ' ', $text);
        $tokens = explode(" ", $text);

        $stopwords = [
            'dan',
            'atau',
            'adalah',
            'yang',
            'dengan',
            'untuk',
            'dari',
            'ke',
            'di',
            'pada',
            'itu',
            'ini',
            'kami',
            'kita',
            'para',
            'akan',
            'sebagai',
            'dalam',
            'oleh',
            'agar',
            'supaya',
            'juga',
            'saya',
            'aku',
            'gua',
            'ane',
            'ingin',
            'mau',
            'pengen',
            'suka',
            'hobi',
            'minat'
        ];

        $processed = [];
        foreach ($tokens as $word) {
            $word = trim($word);
            if ($word === '' || in_array($word, $stopwords))
                continue;
            $word = preg_replace('/^(me|pe|ber|ter|se|ke)/u', '', $word);
            $word = preg_replace('/(kan|an|i|lah|kah|ku|mu|nya|pun)$/u', '', $word);
            if (strlen($word) > 2) {
                $processed[] = $word;
            }
        }
        return implode(" ", $processed);
    }

    private function computeCosine(array $vec1, array $vec2)
    {
        $dot = $norm1 = $norm2 = 0;
        foreach ($vec1 as $term => $val1) {
            $val2 = $vec2[$term] ?? 0;
            $dot += $val1 * $val2;
            $norm1 += $val1 * $val1;
            $norm2 += $val2 * $val2;
        }
        return ($norm1 && $norm2) ? $dot / (sqrt($norm1) * sqrt($norm2)) : 0;
    }

    private function cosineSimilarity(array $vec1, array $vec2)
    {
        $dotProduct = 0;
        $normVec1 = 0;
        $normVec2 = 0;
        foreach ($vec1 as $i => $value) {
            $dotProduct += $value * $vec2[$i];
            $normVec1 += $value * $value;
            $normVec2 += $vec2[$i] * $vec2[$i];
        }
        if ($normVec1 == 0 || $normVec2 == 0)
            return 0;
        return $dotProduct / (sqrt($normVec1) * sqrt($normVec2));
    }
}
