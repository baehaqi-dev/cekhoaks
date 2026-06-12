<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CekHoaks Indonesia</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="max-w-3xl w-full">

            <div class="bg-white rounded-3xl shadow-xl p-10">

                <div class="text-center">

                    <h1 class="text-5xl font-bold text-slate-900">
                        Cek dulu sebelum percaya
                    </h1>

                    <p class="mt-4 text-lg text-slate-500">
                        Paste pesan WhatsApp, berita, atau link viral
                        untuk dianalisis AI
                    </p>

                </div>

                <form
                    action="/analyze"
                    method="POST"
                    class="mt-8"
                >
                    @csrf

                    <textarea
                        name="text"
                        class="w-full h-52 border border-slate-300 rounded-2xl p-5 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh:

'Besok semua rekening dormant akan diblokir pemerintah!!! Sebarkan ke keluarga!'"
                    ></textarea>

                    <button
                        type="submit"
                        class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-2xl text-lg transition"
                    >
                        CEK SEKARANG
                    </button>

                </form>

                <div class="mt-10 border-t pt-6">

                    <h2 class="font-bold text-xl mb-4">
                        🔥 Hoaks Viral Hari Ini
                    </h2>

                    <div class="space-y-3 text-slate-700">

                        <div>
                            1. Rekening dormant diblokir
                        </div>

                        <div>
                            2. Lowongan CPNS palsu
                        </div>

                        <div>
                            3. Video lama diunggah ulang
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>