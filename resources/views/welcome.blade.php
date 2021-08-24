<x-app-layout>
    <!-- Portada -->
    <section class ="bg-cover bg-no-repeat bg-center w-auto y-auto h-screen" style="background-image: url({{asset('img/Home/Home2.jpg')}})">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-indigo-800 font-bold text-4xl">
                        Bienvenid@ a Moment!
                    </h1>
                    <p class ="font-bold text-lg mt-4 mb-4">Encontraras actividades dirigidas especialmente para ti, <br> porque tú eres importante para nosotros</p>
                    @livewire('search')

                </div>
            </div>
    </section>
<!-- CONTENIDO DE LAS ACTIVIDADES-->
    <section class="mt-24 justify-center">
        <h1 class="text-gray-600 text-center text-3xl mb-6">Categoria de Actividades</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class ="rounded-md h-36 w-full object-cover"src="{{asset('img/actividades/fisico.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Fisicos</h1>
                </header>
                <p class="text-sm text-gray-500">El ejercicio fisico alivia el dolor y reduce la limitación del movimiento articular; además disminuye la tensión arterial y el consumo de medicamentos</p>
            </article>

            <article>
                <figure>
                    <img class ="rounded-md h-36 w-full object-cover"src="{{asset('img/actividades/mentales.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Mentales</h1>
                </header>
                <p class="text-sm text-gray-500">El ejercicio mental ayuda a fortalecer la memoria, y a prevenir o retrasar el deterioro cognitivo, manteniendo la mente activa a la vez que va envejeciendo.</p>
            </article>

            <article>
                <figure>
                    <img class ="rounded-md h-36 w-full object-cover"src="{{asset('img/actividades/manualidad.jpeg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Arte</h1>
                </header>
                <p class="text-sm text-gray-500">El arte ayuda a la coordinación ojo-mano permite sincronizar los movimientos de ojos y manos mientras se realizan actividades manuales que requieren atención visual.</p>
            </header>
            </article>
        </div>
    </section>
<!--SECCION PARA VER TODAS LAS ACTIVIDADES-->
    <section class="mt-24 bg-yellow-500 py-12">
        <h1 class="text-center text-white text-3xl">¿Quieres ver todas las actividades?</h1>
        <div class="flex justify-center mt-4">
            <a href = "{{route('courses.index')}}"class="bg-indigo-600 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                Categoria de Actividades
              </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">Últimas actividades</h1>
        <!--LISTA DE ACTIVIDADES-->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course"></x-course-card>
            @endforeach

        </div>
    </section>
</x-app-layout>


