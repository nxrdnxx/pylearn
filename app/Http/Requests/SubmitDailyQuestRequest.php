<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitDailyQuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // User must be authenticated (via middleware)
    }

    public function rules(): array
    {
        return [
            'quest_id' => 'required|integer|exists:daily_quests,id',
            'answer' => 'required|string|max:1000',
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'answer.required' => 'Jawaban tidak boleh kosong',
            'answer.max' => 'Jawaban terlalu panjang (max 1000 karakter)',
        ];
    }
}
