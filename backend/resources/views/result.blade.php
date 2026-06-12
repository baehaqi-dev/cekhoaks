<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Analisis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen py-10 px-4">

<div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-xl p-10">

    <h1 class="text-4xl font-bold">
        ⚠️ {{ $status }}
    </h1>

    <div class="mt-4">
        <span class="font-semibold">
            Tingkat Risiko:
        </span>

        {{ $risk }}%
    </div>

    <div class="mt-8">

        <h2 class="font-bold text-xl">
            Kenapa sistem menandai ini?
        </h2>

        <ul class="list-disc ml-6 mt-3">
            @foreach($reasons as $reason)
                <li>{{ $reason }}</li>
            @endforeach
        </ul>

    </div>

    <div class="mt-8">

        <h2 class="font-bold text-xl">
            Ringkasan AI
        </h2>

        <p class="mt-2 text-slate-600">
            {{ $summary }}
        </p>

    </div>

    <div class="mt-8 p-4 bg-slate-100 rounded-xl">

        <strong>Teks yang dicek:</strong>

        <p class="mt-2 text-slate-600">
            {{ $text }}
        </p>

    </div>

    <a
        href="/"
        class="inline-block mt-8 bg-blue-600 text-white px-6 py-3 rounded-xl"
    >
        Cek Lagi
    </a>

</div>

</body>
</html>