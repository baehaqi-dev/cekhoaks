<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/analyze', function (Request $request) {

    $text = strtolower($request->text);

    $risk = 0;
    $reasons = [];

    $patterns = [
        'sebarkan' => 20,
        'viral' => 10,
        'darurat' => 20,
        'wajib' => 15,
        'awas' => 10,
        'jangan sampai' => 10,
        '!!!' => 10,
        'pemerintah' => 5,
    ];

    foreach ($patterns as $keyword => $score) {

        if (str_contains($text, $keyword)) {

            $risk += $score;
            $reasons[] =
                "Terdeteksi kata pemicu: '{$keyword}'";
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
        $reasons[] =
            'Tidak ditemukan pola manipulatif.';
    }

    return view('result', [
        'text' => $request->text,
        'status' => $status,
        'risk' => min($risk, 100),
        'reasons' => $reasons,
        'summary' =>
            'Analisis awal berdasarkan pola bahasa yang sering muncul pada informasi menyesatkan.'
    ]);
});