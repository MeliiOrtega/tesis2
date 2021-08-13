<x-guest-layout>

    <div class="flex items-center min-h-screen p-4 bg-gray-100 lg:justify-center">
        <div class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md">
            <div class="p-5 bg-white md:flex-1">
            <h3 class="my-4 text-2xl font-semibold text-gray-700">Iniciar Sesión</h3>
            <form class="flex flex-col space-y-5" method="POST" action="{{ route('login') }}">
            @csrf

                <div class="flex flex-col space-y-1">
                    <label class="text-sm font-semibold text-gray-500"> Correo electronico</label>
                    <input id="email" class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex flex-col space-y-1">
                <label class="text-sm font-semibold text-gray-500"> Contraseña</label>
                    <input id="password" class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200" type="password" name="password" required autocomplete="current-password" />
                </div>
            </form>
            </div>
            <div class="p-4 py-6 text-white bg-blue-500 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly">
                OTRO REGISTER
            </div>
        </div>
    </div>

    <div class=" bg-gray-100 pl-6">
        <a href="{{route('home')}}" class="font-bold cursor-pointer text-xl">
            <i class="fas fa-arrow-left text-red-500"></i> Inicio</a>
    </div>

<div class="grid lg:grid-cols-3 grid-cols-1">
    <div class="lg:col-span-2 col-span-1">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Correo Electronico') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                    </label>
                </div>

                <div class="block items-center mt-4">
                    @if (Route::has('password.request'))
                        <a class=" block underline mb-2 text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    <div class="flex justify-around">
                        <a  class="font-bold text-gray-700 hover:text-red-600" href="{{ route('register') }}">¿Eres nuevo?</a>

                    <x-jet-button class="ml-4">
                        {{ __('Iniciar Sesion') }}
                    </x-jet-button>

                    </div>

                </div>
            </form>
        </x-jet-authentication-card>
    </div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100">

        <div class="w-full sm:max-w-md mt-6 px-6 py-6 mr-6 bg-indigo-200 shadow-md overflow-hidden sm:rounded-lg">
            <figure>
                <img class ="rounded-md h-36 w-full object-cover object-center"src="{{asset('img/Home/voluntario.jpg')}}" alt="">
            </figure>
            <div class="mt-4">

                <p>Tienes la oportunidad de formar parte de la vida de un adulto mayor, creando actividades, agregando contenido y comunicandote con el. Forma parte de nuestro equipo de voluntarios.
                </p>
            </div>
            <div class="mt-4">
                <a  class="font-bold btn btn-primary" href="{{ route('register.voluntary') }}" > ¡Registraste aqui!</a>

            </div>
        </div>

    </div>
</div>


</x-guest-layout>
