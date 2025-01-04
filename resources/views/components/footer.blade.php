<footer class="bg-gray-800 text-white py-8">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="section pl-8">
          <h4 class="text-lg font-semibold mb-4">{{__('Atenció al client')}}</h4>
          <ul class="space-y-2">
              <li><a class="hover:underline">{{__('Atenció al client')}}</a></li>
              <li><a class="hover:underline">{{__('Termes y condicions')}}</a></li>
          </ul>
      </div>

      <div class="section">
          <h4 class="text-lg font-semibold mb-4">{{__('Guía de compra')}}</h4>
          <ul class="space-y-2">
              <li><a href="{{ route('dashboard') }}" class="hover:underline">{{__('Crear una conta')}}</a></li>
              <li><a class="hover:underline">{{__('Pagaments')}}</a></li>
          </ul>
      </div>

      <div class="section">
          <h4 class="text-lg font-semibold mb-4">{{__('Pagar amb')}}</h4>
          <div class="flex space-x-2">
                <x-icons.visa class="h-2" />
                <x-icons.mastercard class="h-2" />
                <x-icons.paypal class="h-2" />
                <x-icons.bizum class="h-2" />
          </div>
      </div>

      <div class="section">
          <h4 class="text-lg font-semibold mb-4">{{__('Segueix-nos')}}</h4>
          <div class="flex space-x-4">
              <a href="https://www.instagram.com/smsalvi17/" class="hover:underline">Instagram</a>
          </div>
      </div>
  </div>
</footer>
