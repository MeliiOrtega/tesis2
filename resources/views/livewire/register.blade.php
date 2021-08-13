<div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden">
        <div  class="md:flex w-full ">
            <div class="  hidden md:block w-1/2 bg-indigo-500 py-10 px-10">
                <a href="{{route('home')}}" class="font-bold cursor-pointer text-xl text-white">
                    <i class="fas fa-arrow-left text-white"></i> Inicio</a>
                <img class="mt-8 rounded-lg" src="{{asset('/img/Home/registervoluntario.jpeg')}}" alt="" width="100%" height="auto" >
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10 bg-white">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Registro de Voluntario</h1>
                    <p>Ingresa tu información</p>
                </div>

                    <form wire:submit.prevent="submit">

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label  class="text-sm font-bold px-1">Email
                                </label>
                                <input wire:model="email" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="email" autofocus required >
                                @error('email')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label  class="text-sm font-bold px-1">Nombre
                                </label>
                                <input wire:model="name" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"type="text" >
                                @error('name')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <h1 class="text-sm mt-2">Contraseña</h1>
                        <hr>
                        <div class="flex -mx-3">{{-- CONTRASEÑA --}}

                            <div  class="w-1/2 px-3 mb-5">
                                <label class="text-sm font-bold px-1">Contraseña
                                </label>
                                <input wire:model="password" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="password" >
                                @error('password')
                                <span>{{$message}}</span>
                                @enderror

                            </div>

                            <div class="w-1/2 px-3 mb-5">
                                <label class="text-sm font-bold px-1">Confirmar
                                </label>
                                <input wire:model="password_confirmation" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"  type="password" >
                                @error('password_confirmation')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>{{-- CONTRASEÑA --}}
                            <hr class="mb-2">

                        <div class="flex -mx-3">{{-- CONTRASEÑA --}}

                            <div  class="w-1/2 px-3 mb-5">
                                <label class="text-sm font-bold px-1">Cedula
                                </label>
                                <input wire:model="cedula" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="number" >
                                @error('cedula')
                                <span>{{$message}}</span>
                                @enderror

                            </div>

                            <div class="w-1/2 px-3 mb-5">
                                <label class="text-sm font-bold px-1">Fecha de nacimiento
                                </label>
                                <input wire:model="fecha" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"  type="date" >
                                @error('fecha')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>{{-- CONTRASEÑA --}}

                        <div class="flex -mx-3">{{-- CONTRASEÑA --}}

                            <div  class="w-1/2 px-3 mb-5">
                                <label class="text-sm font-bold px-1">Celular
                                </label>
                                <input wire:model="phone" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="tel" >
                                @error('phone')
                                <span>{{$message}}</span>
                                @enderror


                            </div>

                            <div class="w-1/2 px-3 mb-5">
                                <label class="text-sm font-bold px-1">Ocupacion
                                </label>
                                <input wire:model="ocupacion" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"  type="text">
                                @error('ocupacion')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>{{-- CONTRASEÑA --}}

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label  class="text-sm font-bold px-1">Dirección
                                </label>
                                <input wire:model="direccion" class="w-full pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" type="text" >
                                @error('direccion')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-around mt-4">
                            <a class="underline text-lg text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                ¿Ya tienes cuenta?
                            </a>
            
                            <input class="btn btn-primary" type="submit" value="Registrase">
                        </div>
                            
                </form>
                </div>

            </div>




        </div>
    </div>

</div>
