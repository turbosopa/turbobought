<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">{{ __('LLista de Productes') }}</h1>

    @if($productes->isEmpty())
        <p class="text-gray-500">{{ __('No hi ha productes disponibles.') }}</p>
    @else
        <div class="space-y-4">
            @foreach ($productes as $producte)
                <div class="flex items-center justify-between border-b py-2">
                    <!-- Nom del producte -->
                    <span>{{ $producte->nom }}</span>
                    <div class="flex space-x-4">
                        <!-- Llapis (Editar) -->
                        <a href="{{ route('producte.edit', $producte) }}" class="text-blue-500 hover:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6.768-6.768a1.5 1.5 0 112.121 2.121L11.121 13l-6.768 6.768a1.5 1.5 0 01-2.121-2.121L9 11z" />
                            </svg>
                        </a>
                        <form action="{{ route('producte.destroy', $producte) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Botó per afegir producte -->
    <div class="mt-6">
        <a href="{{ route('producte.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            {{ __('Afegir Producte Nou') }}
        </a>
    </div>
</x-app-layout>
