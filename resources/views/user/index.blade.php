<x-app-layout>
   {{--  @livewire('user.user-courses') --}}

   <h1 class="font-bold text-indigo-800 text-4xl text-center my-4">Mis actividades</h1>
   @if ($courses->count())
   <div class="my-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
        <article class="card">
            @isset($course->image)
                <img class = "h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            @else
                 <img class="h-36 w-full object-cover" src="https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            @endisset

            <div class="card-body">
                    <h1 class="card-title">{{Str::limit($course->title, 30)}}</h1>
                    <p class="text-gray-500 text-sm mb-2">Voluntario: {{$course->teacher->name}}</p>

                    <!--Estrellas-->
                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1"><i class="fas fa-star text-{{$course->avg_rating >=1 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star  text-{{$course->avg_rating >=2 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$course->avg_rating >=3 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$course->avg_rating >=4 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$course->avg_rating ==5 ? 'yellow' : 'gray'}}-400"></i></li>
                            </ul>

                            <p class="text-sm text-gray-500 ml-auto">
                                <i class="fas fa-users"></i>
                                {{$course->students_count}}
                            </p>
                        </div>

                    <a href = "{{route('courses.show',$course)}}"class=" mt-4 btn btn-primary btn-block">
                        Ver contenido
                    </a>
            </div>
        </article>
        @endforeach
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
        </div>
   </div>
   @else
       
       <section class="mt-2 text-gray-700 py-12">
        <h1 class="text-center  text-3xl">No tienes actividades registradas <span class="text-indigo-600"> ¿Quieres ver todas las actividades?</span></h1>
        <div class="flex justify-center mt-4">
            <a href = "{{route('courses.index')}}"class="bg-indigo-600 text-2xl hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                Actividades
              </a>
        </div>
    </section>
   @endif
</x-app-layout>
