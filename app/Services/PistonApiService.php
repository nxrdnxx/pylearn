<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PistonApiService
{
    public function execute(string $code, string $stdin = ''): array
    {
        $response = Http::timeout(30)
            ->withOptions([
                'query' => [
                    'base64_encoded' => 'false',
                    'wait' => 'true',
                ],
            ])
            ->post('https://ce.judge0.com/submissions', [
                'source_code' => $code,
                'language_id' => 71,
                'stdin' => $stdin,
            ]);

        if ($response->failed()) {
            return [
                'success' => false,
                'output' => 'Gagal mengeksekusi kode. Silakan coba lagi.',
                'stdout' => '',
                'stderr' => 'Error: ' . ($response->json('error') ?? $response->body()),
            ];
        }

        $body = $response->json();
        $status = $body['status'] ?? [];
        $statusId = $status['id'] ?? 0;

        $stdout = $body['stdout'] ?? '';
        $stderr = $body['stderr'] ?? '';
        $compileOutput = $body['compile_output'] ?? '';
        $message = $body['message'] ?? '';

        $success = $statusId === 3;
        $errorOutput = $stderr ?: ($compileOutput ?: $message);

        return [
            'success' => $success,
            'output' => $success ? $stdout : $errorOutput,
            'stdout' => $stdout,
            'stderr' => $errorOutput,
            'time' => $body['time'] ?? '0.00',
            'memory' => $body['memory'] ?? 0,
        ];
    }
}
