<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 mb-20">
        <h1 class="text-3xl font-bold mb-6">{{ __('Afegir Categoria Nova') }}</h1>

        <!-- Missatges d'error -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulari -->
        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf

            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold">{{ __('Nom:') }}</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Descripció -->
            <div class="mb-4">
                <label for="descripcio" class="block text-gray-700 font-bold">{{ __('Descripció:') }}</label>
                <textarea id="descripcio" name="descripcio" rows="4" 
                          class="w-full border rounded px-3 py-2">{{ old('descripcio') }}</textarea>
            </div>

            <!-- Botó Crear -->
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    {{ __('Crear Categoria') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
