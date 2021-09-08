<x-guest-layout>
    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden">
            <div  class="md:flex w-full ">
                <div class="  hidden md:block w-1/2 bg-indigo-400 py-10 px-10">
                    <a href="{{route('home')}}" class="font-bold cursor-pointer text-xl text-white">
                        <i class="fas fa-arrow-left text-white"></i> Atrás</a>
                    <img class="mt-8 rounded-lg" src="{{asset('/img/email/email1.png')}}" alt="" width="100%" height="auto" >
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10 bg-white">
                    <div class="my-4 py-4 text-3xl text-indigo-600 font-semibold">
                        ¿Olvidaste tu contraseña?
                    </div>

                    <div class="my-4 text-2xl text-gray-600">
                        {{ __('No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
                    </div>


                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                        </div>
                    @endif

                    <x-jet-validation-errors class="mb-4" />

                    <div class="my-6 flex items-center justify-between">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="block">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button class=" text-xl btn btn-blue">
                                    {{ __('Enviar email para cambiar contraseña') }}
                                </button>
                            </div>
                        </form>


                    </div>




                </div>




            </div>
        </div>

    </div>
</x-guest-layout>
