@guest
<x-guest-layout>
    <div class="flex space-x-4 mb-4">
        <!-- Totes les categories -->
        <a href="{{ route('home') }}" class="text-gray-900 hover:underline">
            {{ __('Totes les categories') }}
        </a>
        <!-- Categories dinàmiques -->
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
                        <div class="border border-gray-300 p-4 text-center flex flex-col items-center">
                            <!-- Nom del producte -->
                            <div class="mb-2 font-semibold text-gray-800">
                                <a href="{{ route('producte', ['producte' => $producte]) }}" 
                                   class="text-gray-900 hover:underline">
                                    {{ $producte->nom }}
                                </a>
                            </div>
                            <!-- Imatge -->
                            <div class="flex items-center justify-center h-32 w-full">
                                <img src="{{ $producte->imatge }}" alt="{{ $producte->nom }}" class="max-h-full max-w-full object-contain border-2 border-gray-400 rounded">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        @endif
    </div>

</x-guest-layout>
@endguest

@auth
<x-app-layout>
    <div class="flex space-x-4 mb-4">
        <!-- Totes les categories -->
        <a href="{{ route('home') }}" class="text-gray-900 hover:underline">
            {{ __('Totes les categories') }}
        </a>
        <!-- Categories dinàmiques -->
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
                        <div class="border border-gray-300 p-4 text-center flex flex-col items-center">
                            <!-- Nom del producte -->
                            <div class="mb-2 font-semibold text-gray-800">
                                <a href="{{ route('producte', ['producte' => $producte]) }}" 
                                   class="text-gray-900 hover:underline">
                                    {{ $producte->nom }}
                                </a>
                            </div>
                            <!-- Imatge -->
                            <div class="flex items-center justify-center h-32 w-full">
                                <img src="{{ $producte->imatge }}" alt="{{ $producte->nom }}" class="max-h-full max-w-full object-contain border-2 border-gray-400 rounded">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Missatge d'èxit -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Carro -->
            <h2 class="text-2xl font-bold my-4">Carro</h2>
            
            <ul>
                @php
                    $preutot=0;
                @endphp
                
                @forelse ($carro as $item)
                    @php
                        // Divideix la cadena en nom i preu
                        [$nom, $preu, $quan] = explode(':', $item);
                        $preutot+=$preu * $quan;
                    @endphp
                    <li class="mb-2 flex">
                        <p class="flex-1">{{ $nom }} x{{ $quan }} {{ number_format($preu, 2) }}€</p>
                    </li>
                @empty
                    <p>{{ __('No hi ha productes al carro.') }}</p>
                @endforelse
            </ul>

            <!-- Botó per buidar el carro -->
            @if (!empty($carro))
                <p>{{ __('Total') }} {{ number_format($preutot, 2) }}€</p>
                <form method="POST" action="{{ route('buidar.carro') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mt-4">
                        {{ __('Buidar el carro') }}
                    </button>
                </form>
                <div class="mt-4 flex space-x-4">
                    <form method="POST" action="{{ route('comprar.carro', ['metode' => 'bizum']) }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Comprar amb Bizum') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('comprar.carro', ['metode' => 'targeta']) }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Comprar amb Targeta') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('comprar.carro', ['metode' => 'paypal']) }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('Comprar amb PayPal') }}
                        </button>
                    </form>
                </div>
            @endif
        @endif
    </div>

</x-app-layout>

@endauth