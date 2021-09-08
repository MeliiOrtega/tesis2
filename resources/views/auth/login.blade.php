<x-guest-layout>
    <div class="flex items-center min-h-screen p-4 bg-gray-100 lg:justify-center">
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

        <div class="flex flex-col overflow-hidden bg-white rounded-md shadow-lg max md:flex-row md:flex-1 mx-auto max-w-sm sm:max-w-4xl">
            <div class="lg:w-1/2 p-5 bg-white md:flex-1">
                <x-jet-validation-errors class="mb-4" />

                <a href="{{route('home')}}" class="font-bold cursor-pointer text-xl text-indigo-600">
                    <i class="fas fa-arrow-left text-indigo-600"></i> Inicio</a>
                <h3 class="my-4 text-2xl font-bold text-gray-700">Iniciar Sesión</h3>
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

                    <div class="flex items-center justify-between mb-4 space-x-2">
                        <label for="remember_me"  class="text-sm font-semibold text-gray-500">
                            <input type="checkbox" id="remember_me" name="remember" class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"/>
                            Recordar
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm font-semibold text-gray-500" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <div class="block items-center mt-6">

                        <div class="flex justify-around mt-6">
                            <a  class="font-bold text-gray-700 hover:text-red-600" href="{{ route('register') }}">¿Eres nuevo?</a>

                        <x-jet-button class="ml-4">
                            {{ __('Iniciar Sesion') }}
                        </x-jet-button>

                        </div>

                    </div>
                </form>
            </div>
            <div class=" lg:w-1/2 text-white bg-blue-500 md:w-96 md:flex-shrink-0 md:flex md:flex-col md:items-center ">
                <img src="{{asset('img/Home/voluntario.jpg')}}"  alt="">
                <div class="">
                    <div>
                        <h1 class="font-bold text-3xl text-white text-center">¿Quieres ser Voluntario?</h1>
                        <p class="mt-6 mb-4 font-normal text-center text-white md:mt-0">
                            Forma parte de la vida de un adulto mayor creando actividades, agregando contenido y realizando videollamada con ellos. Únete a nuestro equipo de voluntarios. ¡Que esperas!
                        </p>
                    </div>

                    <div class="mb-4 text-center">
                        <a  class="btn btn-primary" href="{{ route('register.voluntary') }}" > ¡Registraste aqui!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-guest-layout>
