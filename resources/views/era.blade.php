<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $era }} Dinosaurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-6">
    <a href="/" class="text-blue-600 underline mb-4 inline-block">← Kembali</a>
    <h1 class="text-3xl font-bold mb-6">{{ $era }} Dinosaurs</h1>

    @if(count($dinos) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($dinos as $dino)
                <div class="bg-gray-100 p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $dino['name'] }}</h2>
                    @if(isset($dino['image']))
                        <img src="{{ $dino['image'] }}" alt="{{ $dino['name'] }}" class="mt-2 rounded w-full object-cover">
                    @endif
                    <p class="mt-2 text-sm">{{ $dino['description'] ?? 'Tidak ada deskripsi' }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada data dinosaurus untuk era ini.</p>
    @endif
</body>
</html>
