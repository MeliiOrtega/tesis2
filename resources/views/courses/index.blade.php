<x-app-layout>
    <!-- Portada -->
    <section class ="bg-cover bg-no-repeat bg-center w-auto y-auto h-screen " style="background-image: url({{asset('img/Home/Curso.jpg')}})">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-white font-bold text-4xl">
                        Bienvenid@ a Moment!
                    </h1>
                    <p class ="text-white font-bold text-lg mt-2 mb-4">Encontraras actividades dirigidas especialmente para ti, porque tú eres importante para nosotros</p>

                    @livewire('search')
                </div>
            </div>
    </section>
<!--CATEGORIas-->
@livewire('navigation-category')
   {{--  <div class=" py-4 mb-16 bg-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-around  ">
            <!--CATEGORIAS-->
            @foreach ($categories as $category)
            <a class="font-bold text-3xl text-indigo-600 hover:text-red-700" href="{{route('course.category',$category)}}">{{$category->name}}</a>
            @endforeach
            </div>
    </div> --}}

    <section class="my-24">
        <!--LISTA DE ACTIVIDADES-->
        <h1 class="uppercase text-center text-3xl  text-indigo-800 font-bold mb-6">
            Todas las actividades
        </h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course"></x-course-card>
            @endforeach

        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
            {{$courses->links()}}
        </div>
    </section>
</x-app-layout>


