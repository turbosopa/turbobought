<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 mb-20">
        <h1 class="text-3xl font-bold mb-6">{{ __('Editar producte') }}</h1>

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
        <form action="{{ route('producte.update', $producte) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-bold">{{ __('Nom:') }}</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $producte->nom) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Preu -->
            <div class="mb-4">
                <label for="preu" class="block text-gray-700 font-bold">{{ __('Preu') }} (€):</label>
                <input type="number" id="preu" name="preu" step="0.01" min="0"
                       value="{{ old('preu', $producte->preu) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Descripció -->
            <div class="mb-4">
                <label for="descripcio" class="block text-gray-700 font-bold">{{ __('Descripció:') }}</label>
                <textarea id="descripcio" name="descripcio" rows="4" 
                          class="w-full border rounded px-3 py-2">{{ old('descripcio', $producte->descripcio) }}</textarea>
            </div>

            <!-- Imatge -->
            <div class="mb-4">
                <label for="imatge" class="block text-gray-700 font-bold">{{ __('Enllaç Imatge:') }}</label>
                <input type="text" id="imatge" name="imatge" value="{{ old('imatge', $producte->imatge) }}" 
                       class="w-full border rounded px-3 py-2">
            </div>

            <!-- Categoria -->
            <div class="mb-4">
                <label for="categoria_id" class="block text-gray-700 font-bold">{{ __('Categoria:') }}</label>
                <select id="categoria_id" name="categoria_id" class="w-full border rounded px-3 py-2">
                    @foreach(App\Models\Categoria::all() as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $producte->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botó Guardar -->
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    {{ __('Guardar canvis') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
