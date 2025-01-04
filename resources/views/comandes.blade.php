<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">{{ __('Les Meves Comandes') }}</h1>

    @if($comandes->isEmpty())
        <p class="text-gray-500">{{ __('No tens cap comanda.') }}</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">{{ __('ID') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ __('Data de la Comanda') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ __('Preu Total') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ __('Tipus de Pagament') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comandes as $comanda)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $comanda->id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $comanda->data }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            {{ $comanda->preutot }}€
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            {{ $comanda->pagament->tipus}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-app-layout>
