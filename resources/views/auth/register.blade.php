<x-guest-layout>
    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden">
            <div  class="md:flex w-full ">
                <div class="  hidden md:block w-1/2 bg-indigo-500 py-10 px-10">
                    <a href="{{route('home')}}" class="font-bold cursor-pointer text-xl text-white">
                        <i class="fas fa-arrow-left text-white"></i> Inicio</a>
                    <img class="mt-8 rounded-lg" src="{{asset('/img/Home/home3.jpg')}}" alt="" width="100%" height="auto" >
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10 bg-white">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">Registro de usuario</h1>
                        <p>Ingresa tu información</p>
                    </div>
                   {{--  <x-jet-validation-errors class="mb-4" /> --}}

                        <form method="POST" action="{{ route('register') }}" >
                            @csrf

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label  class="text-sm font-bold px-1">Email
                                    </label>
                                    <input class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus/>

                                </div>
                            </div>

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label  class="text-sm font-bold px-1">Nombre
                                    </label>
                                    <input class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"type="text" id="name"  name="name" value="{{ old('name') }}" required  autocomplete="name"/>
                                </div>
                            </div>

                            <h1 class="text-sm mt-2">Contraseña</h1>
                            <hr>
                            <p>La contraseña debe contener:</p>
                            <ul>
                                <li>- Almenos un número</li>
                                <li>- Almenos Una letra mayúscula</li>
                                <li>- Almenos Una letra minuscula</li>
                                <li>- Almenos un simbolo !,$,#,%</li>
                            </ul>
                            <div class="flex -mx-3">{{-- CONTRASEÑA --}}


                                <div  class="w-1/2 px-3 mb-5">
                                    <label class="text-sm font-bold px-1">Contraseña
                                    </label>
                                    <input  class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="password" id="password" name="password" required autocomplete="new-password" />
                                </div>

                                <div class="w-1/2 px-3 mb-5">
                                    <label class="text-sm font-bold px-1">Confirmar
                                    </label>
                                    <input class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"  type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"/>

                                </div>
                            </div>{{-- CONTRASEÑA --}}
                                <hr class="mb-2">

                                <div class="flex -mx-3">{{-- FECHA CELULAR --}}


                                    <div  class="w-1/2 px-3 mb-5">
                                        <label class="text-sm font-bold px-1">Fecha de nacimiento
                                        </label>
                                        <input  class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="date" id="fecha" name="fecha"  value="{{ old('fecha') }}"required autocomplete="new-fecha" />
                                        @error('fecha')
                                        <span class="text-red-500"> * {{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 px-3 mb-5">
                                        <label class="text-sm font-bold px-1">Cedula
                                        </label>
                                        <input class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"  type="number" id="cedula" name="cedula"  value="{{ old('cedula') }}" required autocomplete="cedula"/>
                                        @error('cedula')
                                <span class="text-red-500"> * {{$message}}</span>
                                @enderror
                                    </div>
                                </div>{{-- FECHA CELULAR--}}

                                <div class="flex -mx-3">{{-- CONTRASEÑA --}}


                                    <div  class="hidden">
                                        <label class="text-sm font-bold px-1">Ocupación
                                        </label>
                                        <input  class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="text" id="ocupacion" name="ocupacion"  value="no hay" required autocomplete="new-ocupacion" />
                                        @error('ocupacion')
                                        <span class="text-red-500"> * {{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 px-3 mb-5">
                                        <label class="text-sm font-bold px-1">Celular
                                        </label>
                                        <input class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"  type="tel" id="phone" name="phone"   value="{{ old('phone') }}" required autocomplete="phone"/>
                                        @error('phone')
                                        <span class="text-red-500"> * {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>{{-- CONTRASEÑA --}}

                                <div class="flex -mx-3">
                                    <div class="w-full px-3 mb-5">
                                        <label  class="text-sm font-bold px-1">Direccion
                                        </label>
                                        <input class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" required autofocus/>
                                        @error('direccion')
                                        <span class="text-red-500"> * {{$message}}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class=" hidden">
                                    <div class="w-full px-3 mb-5">
                                        <label  class="text-sm font-bold px-1">Role
                                        </label>
                                        <input class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="tel" name="role" value="usuario" >

                                    </div>
                                </div>


                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('¿Ya tienes cuenta?') }}
                                    </a>

                                    <x-jet-button class="ml-4">
                                        {{ __('Registrarse') }}
                                    </x-jet-button>
                                </div>
                    </form>
                    </div>

                </div>




            </div>
        </div>

    </div>

</x-guest-layout>
