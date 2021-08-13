<div>

    <div  class="min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100">
        <img src="{{asset('/img/logo1.png')}}" alt="" style="width: 60px; heigth=50px">
        <section class="w-full sm:max-w-md mt-6 px-6 py-6 mr-6 bg-indigo-200 shadow-md overflow-hidden sm:rounded-lg">

            <form class="my-4" wire:submit.prevent="submit">

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Email
                        </label>
                        <input wire:model="email" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="email" >
                        @error('email')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Nombre
                        </label>
                        <input wire:model="name" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" >
                        @error('name')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Contraseña
                        </label>
                        <input wire:model="password" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="password" >
                        @error('password')
                        <span>{{$message}}</span>
                        @enderror

                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Contraseña
                        </label>
                        <input wire:model="password_confirmation" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="password" >
                        @error('password_confirmation')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Cedula
                        </label>
                        <input wire:model="phone" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="number" >
                        @error('cedula')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Fecha de nacimiento
                        </label>
                        <input wire:model="fecha" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="date" >
                        @error('fecha')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Celular
                        </label>
                        <input wire:model="phone" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="number" >
                        @error('phone')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Ocupación
                        </label>
                        <input wire:model="ocupacion" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" >
                        @error('ocupacion')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-700 font-bold">Dirección
                        </label>
                        <input wire:model="direccion" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" type="text" >
                        @error('direccion')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                        <input type="submit" value="Register">
            </form>
        </section>
    </div>
</div>
