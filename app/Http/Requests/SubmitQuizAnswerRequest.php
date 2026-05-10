<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitQuizAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // User must be authenticated (via middleware)
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'question_id' => 'required|exists:questions,id',
            'level_id' => 'required|exists:levels,id',
            'current' => 'required|integer|min:1',
            'answer' => 'required|string|max:1000',
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'question_id.required' => 'Question ID diperlukan',
            'question_id.exists' => 'Question tidak ditemukan',
            'level_id.required' => 'Level ID diperlukan',
            'level_id.exists' => 'Level tidak ditemukan',
            'current.required' => 'Nomor soal diperlukan',
            'current.integer' => 'Nomor soal harus berupa angka',
            'answer.required' => 'Jawaban tidak boleh kosong',
            'answer.max' => 'Jawaban terlalu panjang (max 1000 karakter)',
        ];
    }
}
