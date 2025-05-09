<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Libros</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-green-100 min-h-screen p-6 font-sans">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Gestión de Libros</h1>

        {{-- Botón para volver a modo crear --}}
        @if(isset($editBook))
            <div class="mb-6 text-right">
                <a href="{{ route('books.index') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                    + Nuevo libro
                </a>
            </div>
        @endif

        {{-- Formulario de Crear/Editar --}}
        <div class="bg-white p-6 rounded-xl shadow-md mb-10">
            <form action="{{ isset($editBook) ? route('books.update', $editBook->id) : route('books.store') }}" method="POST">
                @csrf
                @if(isset($editBook))
                    @method('PUT')
                @endif

                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    {{ isset($editBook) ? 'Editar Libro' : 'Agregar Nuevo Libro' }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input name="title" value="{{ old('title', $editBook->title ?? '') }}" required class="border rounded p-2" placeholder="Título">
                    <input name="edition" value="{{ old('edition', $editBook->edition ?? '') }}" required class="border rounded p-2" placeholder="Edición">
                    <input name="copyright" value="{{ old('copyright', $editBook->copyright ?? '') }}" required type="number" class="border rounded p-2" placeholder="Derechos de autor">
                    <input name="language" value="{{ old('language', $editBook->language ?? '') }}" required class="border rounded p-2" placeholder="Idioma">
                    <input name="pages" value="{{ old('pages', $editBook->pages ?? '') }}" required type="number" class="border rounded p-2" placeholder="Páginas">

                    <select name="author_id" required class="border rounded p-2">
                        <option value="">Seleccione un autor</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ (old('author_id', $editBook->author_id ?? '') == $author->id) ? 'selected' : '' }}>
                                {{ $author->author }}
                            </option>
                        @endforeach
                    </select>

                    <select name="publisher_id" required class="border rounded p-2">
                        <option value="">Seleccione una editorial</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ (old('publisher_id', $editBook->publisher_id ?? '') == $publisher->id) ? 'selected' : '' }}>
                                {{ $publisher->publisher }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        {{ isset($editBook) ? 'Actualizar' : 'Guardar' }}
                    </button>

                    @if(isset($editBook))
                        <a href="{{ route('books.index') }}" class="ml-2 text-sm text-red-500 hover:underline">Cancelar</a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Lista de libros --}}
        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($books as $book)
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h2 class="text-xl font-bold text-blue-700">{{ $book->title }}</h2>
                    <p>Edición: {{ $book->edition }}</p>
                    <p>Derechos de autor: {{ $book->copyright }}</p>
                    <p>Idioma: {{ $book->language }}</p>
                    <p>Páginas: {{ $book->pages }}</p>
                    <p>Autor: {{ $book->author->author }}</p>
                    <p>Editorial: {{ $book->publisher->publisher }}</p>

                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('books.index', ['edit' => $book->id]) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('¿Seguro que desea eliminar este libro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </div>
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