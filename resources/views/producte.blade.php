<x-guest-layout>
    <!-- Producte Individual -->
    @if (isset($producte))
        <div class="max-w-4xl mx-auto mt-10">
            <!-- Contenidor del producte -->
            <div class="flex bg-white border border-gray-300 rounded-lg p-6">
                <!-- Imatge -->
                <div class="flex-grow flex items-center justify-center">
                    <div class="h-64 w-full flex items-center justify-center border-2 border-gray-400 rounded">
                        <span class="text-gray-500">IMATGE</span>
                    </div>
                </div>

                <!-- Detalls del producte -->
                <div class="ml-6 flex flex-col justify-between items-end w-1/4">
                    <!-- Preu -->
                    <div class="text-3xl font-bold text-gray-900">
                        {{ number_format($producte->preu, 2) }}€
                    </div>
                    
                    <!-- Descripció -->
                    <div class="mt-4 text-gray-700 text-right">
                        {{ $producte->descripcio }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Si no hi ha cap producte -->
        <p class="text-center text-gray-500 mt-10 py-10">{{ __('Aquest producte no existeix.') }}</p>
    @endif
</x-guest-layout>
