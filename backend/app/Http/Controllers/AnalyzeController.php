<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;

class AnalyzeController extends Controller
{
    public function analyze(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:10',
        ]);

        $text = strtolower($request->text);
        $risk = 0;
        $reasons = [];

        $patterns = [
            'sebarkan'     => 20,
            'viral'        => 10,
            'darurat'      => 20,
            'wajib'        => 15,
            'awas'         => 10,
            'jangan sampai'=> 10,
            '!!!'          => 10,
            'pemerintah'   => 5,
        ];

        foreach ($patterns as $keyword => $score) {
            if (str_contains($text, $keyword)) {
                $risk += $score;
                $reasons[] = "Terdeteksi kata pemicu: '{$keyword}'";
            }
        }

        if ($risk < 30) {
            $status = 'Relatif Aman';
        } elseif ($risk < 60) {
            $status = 'Perlu Verifikasi';
        } else {
            $status = 'Potensi Menyesatkan';
        }

        if (empty($reasons)) {
            $reasons[] = 'Tidak ditemukan pola manipulatif.';
        }

        $analysis = Analysis::create([
            'input_text' => $request->text,
            'status'     => $status,
            'risk_score' => min($risk, 100),
            'reasons'    => $reasons,
            'summary'    => 'Analisis awal berdasarkan pola bahasa yang sering muncul pada informasi menyesatkan.',
        ]);

        return view('result', [
            'text'    => $analysis->input_text,
            'status'  => $analysis->status,
            'risk'    => $analysis->risk_score,
            'reasons' => $analysis->reasons,
            'summary' => $analysis->summary,
        ]);
    }
}