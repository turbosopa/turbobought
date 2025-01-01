<x-guest-layout>
    <!-- Producte Individual -->
    @if (isset($producte))
        <div class="max-w-4xl mx-auto mt-20 mb-20">
            <!-- Contenidor del producte -->
            <div class="flex bg-white border border-gray-300 rounded-lg p-6">
                <!-- Imatge -->
                <div class="flex w-1/2 items-center justify-center">
                    <img src="{{ $producte->imatge }}" alt="{{ $producte->nom }}" class="h-64 w-full object-contain border-2 border-gray-400 rounded">
                </div>

                <!-- Detalls del producte -->
                <div class="w-1/2 pl-6 flex flex-col">
                    <!-- Preu -->
                    <div class="text-3xl font-bold text-gray-800 mb-4">
                        {{ number_format($producte->preu, 2) }}€
                    </div>

                    <!-- Nom -->
                    <div class="text-4xl font-bold text-gray-900 mb-4">
                        {{ $producte->nom }}
                    </div>

                    <!-- Descripció -->
                    <div class="text-gray-700 mb-6">
                        {{ $producte->descripcio }}
                    </div>

                    <!-- Botó "Afegir al carrito" -->
                    <div class="flex justify-start">
                        <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Afegir al carrito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Si no hi ha cap producte -->
        <p class="text-center text-gray-500 mt-10 py-10">{{ __('Aquest producte no existeix.') }}</p>
    @endif
</x-guest-layout>
