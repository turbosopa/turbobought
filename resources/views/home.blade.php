<x-guest-layout>
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TURBOBOUGHT</title>
      <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="font-sans bg-gray-100">
      <header class="bg-white shadow">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
              <div class="logo text-xl font-bold text-gray-800">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
              </div>
              <div class="logo text-xl font-bold text-gray-800">
                <h1>{{ __('TURBOBOUGHT') }}</h1>
              </div>
              <div class="search-bar flex items-center space-x-2">
                  <input type="text" placeholder="Buscar productos" class="border border-gray-300 rounded-lg px-4 py-2 w-full max-w-md">
                  <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">🔍</button>
              </div>
              <div class="options flex space-x-4 text-gray-600">
                  <a href="{{ route('login') }}" class="hover:text-gray-800">{{__('Identificat')}}</a>
                  <a href="{{ route('register') }}" class="hover:text-gray-800">{{__('Registrat')}}</a>
                  <span>|</span>
                  <a href="#" class="hover:text-gray-800">{{__('EUR')}}</a>
              </div>
          </div>
      </header>
  
      <nav class="bg-gray-200 py-2">
          <div class="max-w-7xl mx-auto px-4 flex space-x-4">
              <a href="#" class="text-gray-600 hover:text-gray-800">{{__('Totes les categories')}}</a>
              <a href="#" class="text-gray-600 hover:text-gray-800">{{__('Aliments')}}</a>
              <a href="#" class="text-gray-600 hover:text-gray-800">{{__('Tecnologia')}}</a>
              <a href="#" class="text-gray-600 hover:text-gray-800">{{__('Casa')}}</a>
          </div>
      </nav>
  
      <main class="max-w-7xl mx-auto px-4 py-8">
          <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              
          </section>
  
          <button class="view-more bg-blue-500 text-white px-4 py-2 rounded-lg mt-6">{{__('Veure més')}}</button>
      </main>
  
      <x-footer></x-footer>
  </body>
  </html>
  
  
</x-guest-layout>