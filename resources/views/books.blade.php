<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
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
<body class="bg-gradient-to-br from-blue-100 to-green-100 min-h-screen p-6 font-sans">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10 fade-in">Lista de Libros</h1>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($books as $book)
                <div class="fade-in bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition duration-300">
                    <h2 class="text-xl font-semibold text-blue-700 mb-2">{{ $book->title }}</h2>
                    <p><span class="text-gray-600 font-medium">Edición:</span> {{ $book->edition }}</p>
                    <p><span class="text-gray-600 font-medium">Derechos de autor:</span> {{ $book->copyright }}</p>
                    <p><span class="text-gray-600 font-medium">Idioma:</span> {{ $book->language }}</p>
                    <p><span class="text-gray-600 font-medium">Páginas:</span> {{ $book->pages }}</p>
                    <p><span class="text-gray-600 font-medium">Autor:</span> 
                        <a href="{{ url('/authors') }}" class="text-green-600 hover:underline">
                            {{ $book->author->author }} ({{ $book->author->nationality }})
                        </a>
                    </p>
                    <p><span class="text-gray-600 font-medium">Editorial:</span> 
                        <a href="{{ url('/publishers') }}" class="text-green-600 hover:underline">
                            {{ $book->publisher->publisher }} ({{ $book->publisher->country }})
                        </a>
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center fade-in">
            <a href="{{ url('/authors') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 mr-2">
                Ver autores
            </a>
            <a href="{{ url('/publishers') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                Ver Editoriales y Libros Publicados
            </a>
        </div>
    </div>
</body>
</html>
