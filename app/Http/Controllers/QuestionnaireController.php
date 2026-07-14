<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    /**
     * Parse quisioner.md and return list of questions as JSON.
     */
    public function getQuestions()
    {
        try {
            $filePath = base_path('quisioner.md');
            if (!file_exists($filePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File quisioner.md tidak ditemukan di root project.'
                ], 404);
            }

            $content = file_get_contents($filePath);
            $lines = explode("\n", $content);
            $questions = [];
            $inQuestionSection = false;
            $qIndex = 1;

            foreach ($lines as $line) {
                $line = trim($line);
                if (empty($line)) {
                    continue;
                }

                // Check if we reached the question section
                if (stripos($line, 'Pertanyaan Quisioner') !== false) {
                    $inQuestionSection = true;
                    continue;
                }

                // If we are in the question section, each non-empty line is a question
                if ($inQuestionSection) {
                    // Strip any leading numbers/indexes if the user added them
                    $questionText = preg_replace('/^\d+[\.\)]\s*/', '', $line);
                    // Strip leading tabs/dashes/bullets if any
                    $questionText = preg_replace('/^[\-\*\•\t\s]*/', '', $questionText);
                    $questionText = trim($questionText);

                    if (!empty($questionText)) {
                        $questions[] = [
                            'id' => 'q_' . $qIndex++,
                            'text' => $questionText,
                            'type' => 'likert', // Default to Likert 1-5
                            'options' => [
                                ['value' => 1, 'label' => 'Sangat Tidak Setuju (STS)'],
                                ['value' => 2, 'label' => 'Tidak Setuju (TS)'],
                                ['value' => 3, 'label' => 'Netral (N)'],
                                ['value' => 4, 'label' => 'Setuju (S)'],
                                ['value' => 5, 'label' => 'Sangat Setuju (SS)']
                            ]
                        ];
                    }
                }
            }

            // Fallback: if "Pertanyaan Quisioner" section is not found or is empty,
            // try to parse lines that end with a dot or look like questions.
            if (empty($questions)) {
                $qIndex = 1;
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (empty($line) || str_starts_with($line, '#') || str_starts_with($line, '•') || stripos($line, 'Skor') !== false || stripos($line, 'Subjek') !== false) {
                        continue;
                    }
                    $questionText = preg_replace('/^\d+[\.\)]\s*/', '', $line);
                    $questionText = trim($questionText);
                    if (!empty($questionText) && strlen($questionText) > 20) {
                        $questions[] = [
                            'id' => 'q_' . $qIndex++,
                            'text' => $questionText,
                            'type' => 'likert',
                            'options' => [
                                ['value' => 1, 'label' => 'Sangat Tidak Setuju (STS)'],
                                ['value' => 2, 'label' => 'Tidak Setuju (TS)'],
                                ['value' => 3, 'label' => 'Netral (N)'],
                                ['value' => 4, 'label' => 'Setuju (S)'],
                                ['value' => 5, 'label' => 'Sangat Setuju (SS)']
                            ]
                        ];
                    }
                }
            }

            $hasSubmitted = Auth::check() && QuestionnaireResponse::where('name', Auth::user()->name)->exists();

            return response()->json([
                'success' => true,
                'questions' => $questions,
                'has_submitted' => $hasSubmitted
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses kuesioner: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save the questionnaire responses.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'answers' => 'required|array'
        ]);

        try {
            if (Auth::check() && QuestionnaireResponse::where('name', Auth::user()->name)->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda sudah mengisi kuesioner ini sebelumnya. Terima kasih!'
                ], 400);
            }

            $answers = $request->input('answers');

            $response = QuestionnaireResponse::create([
                'name' => Auth::user()->name,
                'q_1'     => $answers['q_1'] ?? null,
                'q_2'     => $answers['q_2'] ?? null,
                'q_3'     => $answers['q_3'] ?? null,
                'q_4'     => $answers['q_4'] ?? null,
                'q_5'     => $answers['q_5'] ?? null,
                'q_6'     => $answers['q_6'] ?? null,
                'q_7'     => $answers['q_7'] ?? null,
                'q_8'     => $answers['q_8'] ?? null,
                'q_9'     => $answers['q_9'] ?? null,
                'q_10'    => $answers['q_10'] ?? null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Terima kasih atas tanggapan Anda! Data kuesioner berhasil disimpan.',
                'data' => $response
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan tanggapan kuesioner: ' . $e->getMessage()
            ], 500);
        }
    }
}
