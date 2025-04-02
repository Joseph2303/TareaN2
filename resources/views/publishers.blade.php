<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editoriales y sus publicaciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in {
            animation: fadeIn 0.8s ease-in-out forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
            from { opacity: 0; transform: translateY(20px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-100 to-blue-100 min-h-screen p-6 font-sans">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10 fade-in">Editoriales y Libros Publicados</h1>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($publishers as $publisher)
                <div class="fade-in bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition duration-300">
                    <h2 class="text-xl font-semibold text-green-700 mb-2">{{ $publisher['publisher'] }}</h2>
                    <p><span class="text-gray-600 font-medium">País:</span> {{ $publisher['country'] }}</p>
                    <p><span class="text-gray-600 font-medium">Fundada en:</span> {{ $publisher['founded'] }}</p>
                    <p><span class="text-gray-600 font-medium">Género principal:</span> {{ $publisher['genre'] }}</p>

                    <div class="mt-3">
                        <p class="font-medium text-gray-700 mb-1">Libros publicados:</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($publisher['books'] as $book)
                                <li>
                                    <a href="{{ url('/books') }}" class="text-blue-600 hover:underline transition duration-200">
                                        {{ $book['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center fade-in">
            <a href="{{ url('/books') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 mr-2">
                Ver libros
            </a>
            <a href="{{ url('/authors') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                Ver autores
            </a>
        </div>
    </div>
</body>
</html>
