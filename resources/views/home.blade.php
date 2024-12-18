<x-guest-layout>
        <div class="flex space-x-4 mb-4">
            <!-- Totes les categories -->
            <a href="{{ route('home') }}" class="text-gray-900 hover:underline">
                {{ __('Totes les categories') }}
            </a>
            <!-- Categories dinàmiques -->
            @php
                $categories
            @endphp
            @if (isset($categories))
            
            @foreach ($categories as $categoria)
                <a href="{{ route('homecat', ['categoria' => $categoria]) }}" 
                   class="text-gray-900 hover:underline">
                    {{ $categoria->nom }}
                </a>
            @endforeach
            @endif
        </div>

        <!-- Productes -->
        <div>
            @if (isset($productes))
                @if ($productes->isEmpty())
                    <p>{{ __('No hi ha productes disponibles.') }}</p>
                @else
                    <!-- Contenidor principal -->
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($productes as $producte)
                            <!-- Div per cada producte -->
                            <div class="border border-gray-300 p-4 text-center">
                                <!-- Nom del producte -->
                                <div class="mb-2 font-semibold text-gray-800">
                                    {{ $producte->nom }}
                                </div>
                                <!-- Imatge -->
                                <div class="flex items-center justify-center h-32 border-2 border-gray-400 rounded">
                                    <span class="text-gray-500">IMATGE</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
        
</x-guest-layout>

<x-footer></x-footer>