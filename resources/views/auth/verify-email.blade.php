<x-guest-layout>
    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden">
            <div  class="md:flex w-full ">
                <div class="  hidden md:block w-1/2 bg-indigo-400 py-10 px-10">

                    <img class="mt-8 rounded-lg" src="{{asset('/img/email/email1.png')}}" alt="" width="100%" height="auto" >
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10 bg-white">
                    <div class="my-4 py-4 text-3xl text-indigo-600 font-semibold">
                        Gracias por registrarte!
                    </div>

                    <div class="my-4 text-2xl text-gray-600">
                        {{ __(' Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.') }}
                    </div>


                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-lg text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                        </div>
                    @endif

                    <div class="my-6 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit" class=" text-xl btn btn-blue ">
                                    {{ __('Reenviar correo electrónico de verificación') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="text-xl text-white hover:text-gray-900 btn btn-danger">
                                {{ __('Cerrar Sesión') }}
                            </button>
                        </form>
                    </div>




                </div>




            </div>
        </div>

    </div>
</x-guest-layout>
